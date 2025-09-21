<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute; 
use Illuminate\Database\Eloquent\Model;

class RencanaAsesmenModel extends Model
{
    protected $table = 'rencana_asesmen';
    protected $primaryKey = 'id_rencana_asesmen';
    public $timestamps = false;

    protected $fillable = [
        'id_mk',
        'id_ps',
        'id_kurikulum',
        'tipe_komponen',
        'nomor_komponen',
    ];

    public function bobotCpmk() {
        return $this->belongsToMany(CPMKModel::class, 'rencana_asesmen_cpmk_bobot', 'id_rencana_asesmen', 'id_cpmk')->withPivot('bobot');
    }

    public function komponenEvaluasiFormatted():Attribute {
        return Attribute::make(
            get: function () {
                $tipeKomponen = $this->tipe_komponen;
                $nomorKomponen = $this->nomor_komponen;

                // if($tipeKomponen == 'tugas' || $tipeKomponen == 'kuis') {
                //     return ucfirst($tipeKomponen) . " " . $nomorKomponen;
                // }
                // else {
                //     return strtoupper($tipeKomponen);
                // }

                return ($tipeKomponen == 'tugas' || $tipeKomponen == 'kuis') ? ucfirst($tipeKomponen) . " " . $nomorKomponen : strtoupper($tipeKomponen);
            }
        );
    }

    public function totalBobotKomponenEvaluasi(): Attribute {
        return Attribute::make(
            get: fn () => $this->bobotCpmk->sum('pivot.bobot')
        );
    }
}
