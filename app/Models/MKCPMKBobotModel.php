<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MKCPMKBobotModel extends Model
{
    protected $table = 'mk_cpmk_bobot';
    protected $primaryKey = 'id_mk_cpmk_bobot';
    public $timestamps = false;
    protected $fillable = [
        'id_mk_cpmk_cpl',
        'bobot',
    ];
    public function mkcpmkbobot(){
        return $this->belongsTo(MK_CPMK_CPL_MapModel::class, 'id_mk_cpmk_cpl', 'id_mk_cpmk_cpl');
    }
}
