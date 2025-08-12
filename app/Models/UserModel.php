<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'NIP',
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


    // belongs to relation
    public function programStudiModel()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    // belongs to many
    public function roles() {
        return $this->belongsToMany(RoleModel::class, 'user_role_map', 'id_user', 'id_role');
    }
}
