<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use Illuminate\Database\Eloquent\Model;

class RPSModel extends Model
{
    protected $table = 'rps';
    protected $primaryKey = 'id_rps';
    public $timestamps = false;

    protected $fillable = [
        'id_kurikulum',
        'id_ps',
        'id_mk',
        'id_dosen_penyusun',
        'tanggal_disusun',
        // 'deskripsi_singkat',
    ];

    protected static function booted(): void {
        static::addGlobalScope(new ProdiScope);
    }

    // has many relation
    public function rpsDetail(){
        return $this->hasMany(RPSDetailModel::class, 'id_rps', 'id_rps');
    }

    // belongs to relation
    public function mataKuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }
    public function dosenPenyusun(){
        return $this->belongsTo(UserModel::class, 'id_dosen_penyusun', 'id_user');
    }
    public function kurikulum() {
        return $this->belongsTo(KurikulumModel::class, 'id_kurikulum', 'id_kurikulum');
    }
    public function programStudi() {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'is_ps');
    }

     // belongs to Many relation
    public function cpls() {
        return $this->belongsToMany(CPLModel::class, 'rps_cpl_map', 'id_cpl', 'id_cpl');
    }
}
