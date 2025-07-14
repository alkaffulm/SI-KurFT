<?php

namespace App\Models;

use Database\Seeders\TpCpmkMapSeeder;
use Illuminate\Database\Eloquent\Model;

class RubrikAnalitikModel extends Model
{
    protected $table = 'rubrik_analitik';
    protected $primaryKey = 'id_ra';
    public $timestamps = false;
    protected $fillable = [
        'grade',
        'skor',
        'kriteria',
    ];

    // has many relation
    public function tpcpmkmap(){
        return $this->hasMany(TPCPMKMapModel::class, 'id_ra', 'id_ra');
    }
}
