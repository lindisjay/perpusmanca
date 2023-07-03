<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
