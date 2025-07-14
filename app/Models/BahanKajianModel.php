<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanKajianModel extends Model
{
    protected $table = 'bahan_kajian';
    protected $primaryKey = 'id_bk';
    public $timestamps = false;
    protected $fillable = [
        'nama_bk',
        'kategori',
        'desc',
    ];

    // has many relation
    public function bk_mk(){
        return $this->hasMany(BKMKMapModel::class, 'id_bk', 'id_bk');
    }
    public function bk_cpl(){
        return $this->hasMany(BKCPLMapModel::class, 'id_bk', 'id_bk');
    }

}
