<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\ProdiScope;

class TeknikPenilaianModel extends Model
{
    protected $table = 'teknik_penilaian';
    protected $primaryKey = 'id_teknik_penilaian';
    public $timestamps = false;
    protected $fillable = [
        'nama_teknik_penilaian',
        'kategori',
        'id_ps'
    ];
    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
    }
    // has many relation
    // public function tpcpmkmap(){
    //     return $this->hasMany(TPCPMKMapModel::class, 'id_tp', 'id_tp');
    // } 
}
