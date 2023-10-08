<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Peminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->integer('id');
            $table->unsignedBigInteger('user_id'); // Ubah menjadi unsignedBigInteger
            $table->string('name');
            $table->string('kelas');
            $table->date('tgl_kembali');
            $table->string('kd_buku', 50);
            $table->string('judul_buku', 100);
            $table->integer('qty_pinjam', 11); // Hapus atribut auto_increment dari qty_pinjam
            $table->enum('status', ['dipinjam', 'kembali']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
