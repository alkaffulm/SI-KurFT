<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CPLCPMKBobotModel extends Model
{
    protected $table = 'cpl_cpmk_bobot';
    protected $primaryKey = 'id_cpl_cpmk_bobot';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'id_kurikulum',    
        'id_mk',    
        'id_cpl', 
        'id_cpmk', 
        'bobot'
    ];

    public function cpl()
    {
        return $this->belongsTo(CPLModel::class, 'id_cpl', 'id_cpl');
    }
    public function cpmk()
    {
        return $this->belongsTo(CPMKModel::class, 'id_cpmk', 'id_cpmk');
    }
}
