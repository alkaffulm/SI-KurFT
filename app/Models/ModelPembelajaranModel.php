<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\ProdiScope;

class ModelPembelajaranModel extends Model
{
    protected $table = 'model_pembelajaran';
    protected $primaryKey = 'id_model_pembelajaran';
    public $timestamps = false;
    
    protected $fillable = [
        'id_model_pembelajaran',
        'nama_model_pembelajaran',
        'id_ps'
    ];
    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
    }
}
