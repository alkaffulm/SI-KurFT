<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'NIP',
        'email',
        'username',
        'password',
    ];

    // has many relation
    public function UserPersonalisasiModel(){
        return $this->hasMany(UserPersonalisasiModel::class, 'id_user', 'id_user');
    }
    public function userRoleMap(){
        return $this->hasMany(UserRoleMapModel::class, 'id_user', 'id_user');
    }
    public function rps(){
        return $this->hasMany(RPSModel::class, 'id_user', 'id_user');
    }
    public function user_mk(){
        return $this->hasMany(UserMataKuliahMapModel::class, 'id_user', 'id_user');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_mk', 'id_mk');
    }

    // // belongs to many
    // public function roles() {
    //     return $this->belongsToMany(RoleModel::class, 'user_role_map', 'id_user', 'id_role');
    // }

    // Ini adalah relasi inti untuk mengambil Role
    public function roles() {
        return $this->belongsToMany(RoleModel::class, 'user_role_map', 'id_user', 'id_role')
            ->withPivot('id_ps') // PENTING: Agar kolom id_ps di pivot ikut terbaca
            ->using(UserRoleMapModel::class); // PENTING: Agar bisa pakai fitur Pivot Model custom
    }

    // public function scopeForProdi($query, $id_ps) {
    //     return $query->where('id_ps', $id_ps);
    // }

    // [UPDATED] Scope ini berubah total karena id_ps pindah tabel
    // Cara pakai: UserModel::forProdi(1)->get(); -> Mengambil semua user yang punya jabatan di Sipil
    public function scopeForProdi($query, $id_ps) {
        return $query->whereHas('userRoleMap', function($q) use ($id_ps) {
            $q->where('id_ps', $id_ps);
        });
    }

    public function scopeIsDosen($query) {
        return $query->whereHas('userRoleMap', function ($subQuery) {
            $subQuery->where('id_role',2);
        });
    }

    
}
