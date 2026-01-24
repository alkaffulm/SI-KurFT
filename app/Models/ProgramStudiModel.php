<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudiModel extends Model
{
    protected $table = 'program_studi';
    protected $primaryKey = 'id_ps';
    public $timestamps = false;
    protected $fillable = ['nama_prodi'];

    // public function Kaprodi() {
    //     return $this->belongsTo(userModel::class, '')
    // }

    public function users(){
        return $this->belongsToMany(UserModel::class, 'user_role_map', 'id_ps', 'id_user')
                    ->withPivot('id_role'); // Biar tau dia jabatannya apa
    }
    // has many relation
    // public function userModel(){
    //     return $this->hasMany(UserModel::class, 'id_ps', 'id_ps');
    // }
    public function mataKuliah(){
        return $this->hasMany(MataKuliahModel::class, 'id_ps', 'id_ps');
    }
    public function kurikulum(){
        return $this->hasMany(KurikulumModel::class, 'id_ps', 'id_ps');
    }
    public function profil_lulusan(){
        return $this->hasMany(ProfilLulusanModel::class, 'id_ps', 'id_ps');
    }

    public function cpl(){
        return $this->hasMany(CPLModel::class, 'id_ps', 'id_ps');
    }
    
    public function mahasiswa(){
        return $this->hasMany(MahasiswaModel::class, 'id_ps', 'id_ps');
    }
}
