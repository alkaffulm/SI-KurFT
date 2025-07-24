<?php

namespace App\Models;

use App\Models\BKMKMapModel;
use App\Models\ProgramStudiModel;
use App\Models\Scopes\ProdiScope;
use Illuminate\Database\Eloquent\Model;
use App\Models\BKCPLMapModel;

class BahanKajianModel extends Model
{
    protected $table = 'bahan_kajian';
    protected $primaryKey = 'id_bk';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'nama_bk',
        'kategori',
        'desc_bk_id',
        'desc_bk_en'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
    }

    public function programstudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }
    // has many relation
    public function bk_mk(){
        return $this->hasMany(BKMKMapModel::class, 'id_bk', 'id_bk');
    }
    public function bk_cpl(){
        return $this->hasMany(BKCPLMapModel::class, 'id_bk', 'id_bk');
    }

}
