<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute; 
use Illuminate\Database\Eloquent\Model;

class RencanaAsesmenCPMKBobotModel extends Model
{
    protected $table = 'rencana_asesmen_cpmk_bobot';
    protected $primaryKey = 'id_asesmen_cpmk_bobot';
    public $timestamps = false;

    protected $fillable = [
        'id_rencana_asesmen',
        // 'id_cpmk',
        'id_mk_cpmk_cpl',
        'bobot',

    ];

    public function rencanaAsesmen() {
        return $this->belongsTo(RencanaAsesmenModel::class, 'id_rencana_asesmen', 'id_rencana_asesmen');
    }
    // public function cpmk()
    // {
    //     return $this->belongsTo(\App\Models\CPMKModel::class, 'id_cpmk', 'id_cpmk');
    // }
    public function mkCpmkMap()
    {
        return $this->belongsTo(\App\Models\MK_CPMK_CPL_MapModel::class, 'id_mk_cpmk_cpl', 'id_mk_cpmk_cpl');
    }
// di RencanaAsesmenModel
    // public function bobotCpmk()
    // {
    //     return $this->hasMany(RencanaAsesmenCPMKBobotModel::class, 'id_rencana_asesmen', 'id_rencana_asesmen');
    // }

}
