<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliahModel extends Model
{
    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id_mk';
    public $timestamps = false;

    protected $fillable = [
        'id_ps',
        'nama_matkul_id',
        'nama_matkul_en',
        'matkul_desc_id',
        'matkul_desc_en',
        'jumlah_sks',
        'semester',
    ];

    /**
     * Relasi many-to-many ke CPMKModel melalui tabel mata_kuliah_cpmk_map.
     */
    public function cpmk()
    {
        return $this->belongsToMany(CPMKModel::class, 'mata_kuliah_cpmk_map', 'id_mk', 'id_cpmk');
    }

    // has many relation
    public function sub_cpmk()
    {
        return $this->hasMany(SubCPMKModel::class, 'id_mk', 'id_mk');
    }

    public function rps()
    {
        return $this->hasMany(RPSModel::class, 'id_mk', 'id_mk');
    }
    public function mk_cpmk()
    {
        return $this->hasMany(MataKuliahCPMKMapModel::class, 'id_mk', 'id_mk');
    }
    public function user_mk()
    {
        return $this->hasMany(UserMataKuliahMapModel::class, 'id_mk', 'id_mk');
    }
    public function mhs_mk()
    {
        return $this->hasMany(MahasiswaMataKuliahMapModel::class, 'id_mk', 'id_mk');
    }
    public function bk_mk()
    {
        return $this->hasMany(BKMKMapModel::class, 'id_mk', 'id_mk');
    }
    public function cpl_mk()
    {
        return $this->hasMany(MKCPLMapModel::class, 'id_mk', 'id_mk');
    }
    public function tpcpmkmap()
    {
        return $this->hasMany(TPCPMKMapModel::class, 'id_mk', 'id_mk');
    }

    // belongs to relation
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }
}
