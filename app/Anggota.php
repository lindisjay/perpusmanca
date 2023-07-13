<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    //jika tidak di definisikan, maka primary akan terdetek id
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = "anggota";
    protected $fillable=['id','nama', 'kelas', 'no_hp', 'jenis_kelamin'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $maxId = static::max('id');
            $model->id = $maxId ? $maxId + 1 : 1;
        });
    }

}


