<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPembelajaranModel extends Model
{
    protected $table = 'model_pembelajaran';
    protected $primaryKey = 'id_model_pembelajaran';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_model_pembelajaran',
    ];
}
