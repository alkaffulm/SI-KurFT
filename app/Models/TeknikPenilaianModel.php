<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeknikPenilaianModel extends Model
{
    protected $table = 'teknik_penilaian';
    protected $primaryKey = 'id_tp';
    public $timestamps = false;
    protected $fillable = [
        'tahap_penilaian',
        'teknik_penilaian',
        'instrumen',
        'kriteria',
        'bobot_total',
    ];

    // has many relation
    public function tpcpmkmap(){
        return $this->hasMany(TPCPMKMapModel::class, 'id_tp', 'id_tp');
    } 
}
