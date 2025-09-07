<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodePembelajaranModel extends Model
{
    protected $table = 'metode_pembelajaran';
    protected $primaryKey = 'id_metode_pembelajaran';
    public $timestamps = false;

    protected $fillable = [
        'nama_metode_pembelajaran',
    ];
}
