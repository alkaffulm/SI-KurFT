<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PEOModel extends Model
{
    protected $table = 'peo';
    protected $primaryKey = 'id_peo';
    public $timestamps = false;
    protected $fillable = [
        'id_peo',
        'kode_peo',
        'desc_peo',
    ];
}
