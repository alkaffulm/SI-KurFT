<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianModel extends Model
{
    protected $table = 'penilaian';
    protected $primaryKey = 'id_penilaian';
    public $timestamps = false;
    protected $fillable = [
        'id_rps_detail',
        'jenis_penilaian',
        'bobot',
    ];

    // has many relation

    // belong to relation
    public function rpsdetail(){
        return $this->belongsTo(RPSDetailModel::class,'id_rps_detail', 'id_rps_detail');
    }
}
