<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute; 
use Illuminate\Database\Eloquent\Model;

class RencanaAsesmenCPMKBobotModel extends Model
{
    protected $table = 'rencana_asesmen_cpmk_bobot';
    protected $primaryKey = 'id_asesmen_cpk_bobot';
    public $timestamps = false;

    protected $fillable = [
        'id_rencana_asesmen',
        'id_cpmk',
        'bobot',
    ];

    public function rencanaAsesmen() {
        return $this->belongsTo(RencanaAsesmenModel::class, 'id_rencana_asesmen', 'id_rencana_asesmen');
    }
    public function cpmk()
    {
        return $this->belongsTo(\App\Models\CPMKModel::class, 'id_cpmk', 'id_cpmk');
    }
}
