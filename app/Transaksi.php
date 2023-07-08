<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\TransaksiUpdated;

class Transaksi extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "peminjaman";
    protected $fillable=['id' ,'tgl_pinjam', 'tgl_kembali', 'kd_buku', 'judul_buku', 'qty_pinjam', 'nama','kelas', 'status'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'kd_buku', 'kd_buku');
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($transaksi) {
            event(new TransaksiUpdated($transaksi));
        });
    }

}
