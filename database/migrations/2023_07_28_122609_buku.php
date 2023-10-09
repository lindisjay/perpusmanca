<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Buku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->string('kd_buku', 50)->primary();
            $table->string('no_induk', 50);
            $table->string('sumber', 50);
            $table->date('tgl_dtg');
            $table->integer('qty_bku_dtg');
            $table->integer('thn_masuk', 5);
            $table->string('judul', 100);
            $table->string('penulis', 100);
            $table->string('penerbit', 50);
            $table->string('kategori', 20);
            $table->string('rak', 20);
            $table->integer('stok', 11);
            $table->integer('harga');
            $table->string('image');
            $table->timestamps();
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
