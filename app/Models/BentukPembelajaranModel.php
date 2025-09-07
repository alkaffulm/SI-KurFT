<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BentukPembelajaranModel extends Model
{
    protected $table = 'bentuk_pembelajaran';
    protected $primaryKey = 'id_bentuk_pembelajaran';
    public $timestamps = false;

    protected $fillable = [
        'nama_bentuk_pembelajaran',
    ];
}
