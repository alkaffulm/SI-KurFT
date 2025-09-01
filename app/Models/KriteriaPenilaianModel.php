<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KriteriaPenilaianModel extends Model
{
    protected $table = 'kriteria_penilaian';
    protected $primaryKey = 'id_kriteria_penilaian';
    public $timestamps = false;
    protected $fillable = [
        'nama_kriteria_penilaian',
    ];
}
