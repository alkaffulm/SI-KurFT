<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KetercapaianCpl extends Model
{
    protected $table = 'ketercapaian_cpl';

    protected $primaryKey = 'id_ketercapaian_cpl';

    protected $fillable = [
        'nim',
        'id_cpl',
        'id_tahun_akademik',
        'id_kurikulum',
        'nilai_cpl',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'nim', 'nim');
    }

    public function cpl()
    {
        return $this->belongsTo(CPLModel::class, 'id_cpl');
    }

    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademikModel::class, 'id_tahun_akademik');
    }

    public function kurikulum()
    {
        return $this->belongsTo(KurikulumModel::class, 'id_kurikulum');
    }
}