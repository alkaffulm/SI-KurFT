<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EvaluasiUpmModel extends Model
{
    use HasFactory;

    protected $table = 'evaluasi_upm';
    protected $primaryKey = 'id_evaluasi_upm';
    public $timestamps = true;

    protected $fillable = [
        'id_ps',
        'id_tahun_akademik',
        'catatan',
    ];
    protected static function newFactory()
    {
        return \Database\Factories\EvaluasiUpmModelFactory::new();
    }

    public function programstudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    public function tahunakademik()
    {
        return $this->belongsTo(TahunAkademikModel::class, 'id_tahun_akademik', 'id_tahun_akademik');
    }
}