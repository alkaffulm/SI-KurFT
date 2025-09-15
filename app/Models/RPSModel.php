<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
        // 'id_bk',
        'id_kaprodi',
        // 'id_dosen_penyusun',
        'tanggal_disusun',
        'materi_pembelajaran',
        'pustaka_utama',
        'pustaka_pendukung',
        'tanggal_revisi',
        'jumlah_revisi',
        'isRevisi'
        // 'deskripsi_singkat',
    ];

    protected $casts = ['tanggal_disusun' => 'date'];

    // has many relation
    public function topics()
    {
        return $this->hasMany(RPSTopicModel::class, 'id_rps', 'id_rps');
    }

    // belongs to relation
    public function mataKuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }
    public function dosenPenyusun(){
        return $this->belongsTo(UserModel::class, 'id_dosen_penyusun', 'id_user');
    }
    public function kaprodi() {
        return $this->belongsTo(UserModel::class, 'id_kaprodi', 'id_user');
    }
    public function kurikulum() {
        return $this->belongsTo(KurikulumModel::class, 'id_kurikulum', 'id_kurikulum');
    }
    public function programStudi() {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }
    public function bahanKajian() {
        return $this->belongsTo(BahanKajianModel::class, 'id_bk', 'id_bk');
    }

     // belongs to Many relation
    public function cpls() {
        return $this->belongsToMany(CPLModel::class, 'rps_cpl_map', 'id_rps', 'id_cpl');
    }
    public function mataKuliahSyarat() {
        return $this->belongsToMany(MataKuliahModel::class, 'rps_matakuliah_syarat_map', 'id_rps', 'id_mk_syarat');
    }
    public function mediaPembelajaran() {
        return $this->belongsToMany(MediaPembelajaranModel::class, 'rps_media_pembelajaran', 'id_rps', 'id_media_pembelajaran');
    }

    protected function mediaPerangkatKeras(): Attribute {
        return Attribute::make(
            get: fn () => $this->mediaPembelajaran
                    ->where('tipe', 'perangkat_keras')
                    ->pluck('nama_media_pembelajaran')
                    ->implode(', ')
        );
    }

    protected function mediaPerangkatLunak(): Attribute {
        return Attribute::make(
            get: fn () => $this->mediaPembelajaran
                    ->where('tipe', 'perangkat_lunak')
                    ->pluck('nama_media_pembelajaran')
                    ->implode(', ')
        );
    }
}
