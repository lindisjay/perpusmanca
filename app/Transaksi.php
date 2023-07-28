<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\TransaksiUpdated;

class Transaksi extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $table = "peminjaman";
    protected $fillable=['id', 'tgl_kembali', 'kd_buku', 'judul_buku', 'qty_pinjam', 'name','kelas', 'status', 'created_at', 'updated_at' ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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

        static::creating(function ($model) {
            $model->id = static::max('id') + 1;
        });
    }

}
