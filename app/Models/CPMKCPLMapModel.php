<?php

namespace App\Models;

use Database\Seeders\CplSeeder;
use Illuminate\Database\Eloquent\Model;

class CPMKCPLMapModel extends Model
{
    protected $table = 'cpmk_cpl_map';
    protected $primaryKey = 'id_cpmk_cpl';
    public $timestamps = false;
    protected $fillable = [
        'id_cpmk',
        'id_cpl',
    ];

    // belong to relation
    public function cpmk(){
        return $this->belongsTo(CPMKModel::class, 'id_cpmk', 'id_cpmk');
    }
    public function cpl(){
        return $this->belongsTo(CPLModel::class, 'id_cpmk', 'id_cpmk');
    }
}
