<?php

namespace App\Models;

use App\Http\Controllers\Kaprodi\MKCPMKController;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MataKuliahModel extends Model
{


    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id_mk';
    public $timestamps = false;

    protected $fillable = [
        'id_ps',
        'kode_mk',
        'id_kurikulum',
        'nama_matkul_id',
        'nama_matkul_en',
        'matkul_desc_id',
        'matkul_desc_en',
        'sks_teori',
        'sks_praktikum',
        'semester',
        'muncul'
    ];

    protected function jumlahSks(): Attribute {
        return Attribute::make(
            get: fn() => $this->sks_teori + $this->sks_praktikum 
        );
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
        static::addGlobalScope(new KurikulumScope);
    }

    /**
     * Relasi many-to-many ke CPMKModel melalui tabel mata_kuliah_cpmk_map.
     */
    public function cpmks()
    {
        return $this->belongsToMany(CPMKModel::class, 'mata_kuliah_cpmk_map', 'id_mk', 'id_cpmk');
    }

    public function bahanKajian() {
        return $this->belongsToMany(BahanKajianModel::class, 'bk_mk_map', 'id_mk', 'id_bk');
    }

    // has many relation

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_mk', 'id_mk');
    }
    public function sub_cpmk()
    {
        return $this->hasMany(SubCPMKModel::class, 'id_mk', 'id_mk');
    }

    public function mkcpmkcpl()
    {
        return $this->hasMany(MK_CPMK_CPL_MapModel::class, 'id_mk', 'id_mk');
    }
    public function mk_cpmk_sub_cpmk()
    {
        return $this->hasMany(MKCPMKSubCPMKMapModel::class, 'id_mk', 'id_mk');
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
    // public function tahunAkademiks()
    // {
    //     return $this->belongsToMany(TahunAkademik::class, 'kurikulum_tahun_akademik_map', 'id_kurikulum', 'id_tahun_akademik');
    // }

}
