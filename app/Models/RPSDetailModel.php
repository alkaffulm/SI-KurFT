<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RPSDetailModel extends Model
{
    protected $table = 'rps_detail';
    protected $primaryKey = 'id_rps_detail';
    public $timestamps = false;

    protected $fillable = [
        'id_rps',
        'id_sub_cpmk',
        'minggu',
        'penilaian',
        'bobot',
    ];

    // has many relation
    public function penilaian(){
        return $this->hasMany(PenilaianModel::class, 'id_rps_detail', 'id_rps_detail');
    }

    // belongs to relation
    public function rps(){
        return $this->belongsTo(RPSModel::class, 'id_rps', 'id_rps');
    }
    public function sub_cmpk(){
        return $this->belongsTo(SubCPMKModel::class, 'id_sub_cpmk', 'id_sub_cpmk');
    }
}
