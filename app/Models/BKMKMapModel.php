<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class BKMKMapModel extends Model
{
    protected $table = 'bk_mk_map';
    protected $primaryKey = 'id_bk_mk';
    public $timestamps = false;
    protected $fillable = [
        'id_bk',
        'id_mk',
    ];

    // protected static function booted(): void
    // {
    //     static::addGlobalScope(new ProdiScope);
    //     static::addGlobalScope(new KurikulumScope);
    // }

    public function bk()
    {
        return $this->belongsTo(BahanKajianModel::class, 'id_bk');
    }
    // belongs to relation
    public function bahankajian(){
        return $this->belongsTo(BahanKajianModel::class, 'id_bk', 'id_bk');
    }
    public function matakuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }
}
