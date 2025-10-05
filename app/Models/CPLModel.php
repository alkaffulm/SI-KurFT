<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Casts\Attribute; 


class CPLModel extends Model
{
    protected $table = 'cpl';
    protected $primaryKey = 'id_cpl';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'id_kurikulum',
        'nama_kode_cpl',
        'desc_cpl_id',
        'desc_cpl_en'
        // 'bobot_maksimum',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
        static::addGlobalScope(new KurikulumScope);
    }
    /**
     * Relasi many-to-many ke ProfilLulusanModel melalui tabel pl_cpl_map.
     */
    public function profilLulusan()
    {
        return $this->belongsToMany(ProfilLulusanModel::class, 'pl_cpl_map', 'id_cpl', 'id_pl');
    }

    /**
     * Relasi many-to-many ke CPMKModel melalui tabel cpmk_cpl_map.
     */
    public function cpmk()
    {
        return $this->belongsToMany(CPMKModel::class, 'cpmk_cpl_map', 'id_cpl', 'id_cpmk');
    }

    public function mkcpmkcpl()
    {
        return $this->hasMany(MK_CPMK_CPL_MapModel::class, 'id_cpl', 'id_cpl');
    }

    // has many relation
    public function pl_cpl()
    {
        return $this->hasMany(PLCPLMapModel::class, 'id_cpl', 'id_cpl');
    }

    public function cpl_pl()
    {
        return $this->hasMany(CPLPLMapModel::class, 'id_cpl', 'id_cpl');
    }
    public function bk_cpl()
    {
        return $this->hasMany(BKCPLMapModel::class, 'id_cpl', 'id_cpl');
    }

    public function mhs_cpl()
    {
        return $this->hasMany(MahasiswaCPLMapModel::class, 'id_cpl', 'id_cpl');
    }
    public function cpl_mk()
    {
        return $this->hasMany(MKCPLMapModel::class, 'id_cpl', 'id_cpl');
    }
    public function tpcpmkmap()
    {
        return $this->hasMany(TPCPMKMapModel::class, 'id_cpl', 'id_cpl');
    }

    // belongs to relation
    public function programstudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    public function kurikulum()
    {
        return $this->belongsTo(KurikulumModel::class, 'id_kurikulum', 'id_kurikulum');
    }

    // hitung total bobot CPMK ke CPL terhadap suatu MK di halaman CPMK tabel pembobotan
    public function totalBobot(int $id_mk, Collection  $correlationMap): float {
        $relevantCpmkIds = $correlationMap->get($this->id_cpl, []); // Defaultnya array kosong jika tidak ada korelasi
        return CPLCPMKBobotModel::where('id_mk', $id_mk)->where('id_cpl', $this->id_cpl)->whereIn('id_cpmk', $relevantCpmkIds)->sum('bobot');

    }
}
