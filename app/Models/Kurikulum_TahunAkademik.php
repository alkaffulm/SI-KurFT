<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurikulum_TahunAkademik extends Model
{
    protected $table = 'kurikulum_tahun_akademik_map';
    protected $primaryKey = 'id_kurikulum_tahun_akademik'; // kalau tabelmu ada kolom id
    public $timestamps = false;

    protected $fillable = [
        'id_kurikulum',
        'id_tahun_akademik'
    ];

    public function kurikulum()
    {
        return $this->belongsTo(KurikulumModel::class, 'id_kurikulum', 'id_kurikulum');
    }

    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'id_tahun_akademik', 'id_tahun_akademik');
    }
}
