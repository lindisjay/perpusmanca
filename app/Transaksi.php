<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "peminjaman";
    protected $fillable=['id' ,'tgl_pinjam', 'tgl_kembali', 'kd_buku', 'judul_buku', 'qty_pinjam', 'nama','kelas', 'status'];
}
