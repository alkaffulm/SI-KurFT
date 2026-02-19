<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Model;

class EvaluasiUpmModel extends Model
{
    protected $table = 'evaluasi_upm';
    protected $primaryKey = 'id_evaluasi_upm';
    public $timestamps = true;

    protected $fillable = [
        'id_ps',
        'id_tahun_akademik',
        'catatan',
    ];

    public function programstudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }
    public function tahunakademik()
    {
        return $this->belongsTo(TahunAkademikModel::class, 'id_tahun_akademik', 'id_tahun_akademik');
    }
}
