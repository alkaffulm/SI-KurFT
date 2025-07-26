<?php

namespace App\Models;

use Database\Seeders\CpmkSeeder;
use Illuminate\Database\Eloquent\Model;

class MKCPMKSubCPMKMapModel extends Model
{
    protected $table = 'mk_cpmk_sub_cpmk';
    protected $primaryKey = 'id_mk_cpmk_sub_cpmk';
    public $timestamps = false;
    protected $fillable = [
        'id_cpmk',
        'id_mk',
        'id_sub_cpmk',
    ];

    // belongs to relation
    public function cpmk(){
        return $this->belongsTo(CPMKModel::class, 'id_cpmk', 'id_cpmk');
    }
    public function matakuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }

    public function sub_cpmk(){
        return $this->belongsTo(SubCPMKModel::class, 'id_sub_cpmk', 'id_sub_cpmk');
    }
}
