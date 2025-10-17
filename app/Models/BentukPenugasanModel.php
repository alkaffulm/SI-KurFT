<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BentukPenugasanModel extends Model
{
    protected $table = 'bentuk_penugasan';
    protected $primaryKey = 'id_bentuk_penugasan';
    public $timestamps = false;

    protected $fillable = [
        'nama_bentuk_penugasan',
    ];
}
