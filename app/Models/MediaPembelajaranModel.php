<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaPembelajaranModel extends Model
{
    protected $table = 'media_pembelajaran';
    protected $primaryKey = 'id_media_pembelajaran';
    public $timestamps = false;

    protected $fillable = [
        'nama_media_pembelajaran',
        'tipe',
    ];
 
}
