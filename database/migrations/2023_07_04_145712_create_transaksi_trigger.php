<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Buku;
use App\Transaksi;

class CreateTransaksiTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER update_stok AFTER INSERT ON peminjaman
            FOR EACH ROW
            BEGIN
                IF NEW.status = 'dipinjam' AND NEW.qty_pinjam = (SELECT stok FROM buku WHERE kd_buku = NEW.kd_buku) THEN
                    UPDATE buku SET stok = stok - NEW.qty_pinjam WHERE kd_buku = NEW.kd_buku;
                ELSEIF NEW.status = 'kembali' THEN
                    UPDATE buku SET stok = stok + NEW.qty_pinjam WHERE kd_buku = NEW.kd_buku;
                END IF;
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER IF EXISTS update_stok");
    }
}
