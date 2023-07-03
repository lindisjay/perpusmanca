<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $primaryKey = 'kd_buku';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "buku";
    protected $fillable=['kd_buku','judul', 'penulis', 'penerbit', 'kategori', 'rak', 'stok'];
}
