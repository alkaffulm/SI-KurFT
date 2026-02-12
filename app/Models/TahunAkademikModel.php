<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Model;

class TahunAkademikModel extends Model
{
    protected $table = 'tahun_akademik';
    protected $primaryKey = 'id_tahun_akademik';
    public $timestamps = false;

    protected $fillable = [
        'tahun_akademik',
    ];

}
