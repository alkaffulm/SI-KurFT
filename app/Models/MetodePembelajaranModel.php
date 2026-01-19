<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\ProdiScope;

class MetodePembelajaranModel extends Model
{
    protected $table = 'metode_pembelajaran';
    protected $primaryKey = 'id_metode_pembelajaran';
    public $timestamps = false;

    protected $fillable = [
        'nama_metode_pembelajaran',
        'id_ps',
        'tipe_metode_pembelajaran'
    ];
    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
    }
}
