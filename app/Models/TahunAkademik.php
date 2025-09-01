<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table = 'tahun_akademik';
    protected $primaryKey = 'id_tahun_akademik';
    public $timestamps = false;
    protected $fillable = [
        'tahun_akademik',
    ];

    public function kurikulums()
    {
        return $this->belongsToMany(
            KurikulumModel::class,
            'kurikulum_tahun_akademik_map',
            'id_tahun_akademik',
            'id_kurikulum'
        );
    }

}
