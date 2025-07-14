<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BKCPLMapModel extends Model
{
    protected $table = 'bk_cpl_map';
    protected $primaryKey = 'id_bk_cpl';
    public $timestamps = false;
    protected $fillable = [
        'id_bk',
        'id_cpl',
    ];

    // belongs to relation
    public function bahankajian(){
        return $this->belongsTo(BahanKajianModel::class, 'id_bk', 'id_bk');
    }
    public function cpl(){
        return $this->belongsTo(CPLModel::class, 'id_cpl', 'id_cpl');
    }
}
