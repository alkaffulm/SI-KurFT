<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\UserFactory;

class UserModel extends Authenticatable
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'NIP',
        'email',
        'username',
        'password',
    ];

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

    public function kelas(){
        return $this->hasMany(Kelas::class, 'id_mk', 'id_mk');
    }

    public function roles() {
        return $this->belongsToMany(RoleModel::class, 'user_role_map', 'id_user', 'id_role')
            ->withPivot('id_ps') 
            ->using(UserRoleMapModel::class); 
    }

    public function prodi() {
        return $this->belongsToMany(ProgramStudiModel::class, 'user_role_map', 'id_user', 'id_ps')
            ->using(UserRoleMapModel::class); 
    }

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

    public function scopeHasRole($query, $id_role) {
        return $query->whereHas('userRoleMap', function($q) use ($id_role) {
            $q->where('id_role', $id_role);
        });
    }

    protected static function newFactory()
    {
        return \Database\Factories\UserFactory::new();
    }
}
