<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoleMapModel extends Model
{
    protected $table = 'user_role_map';
    protected $primaryKey = 'id_user_role';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_role',
    ];

    // Relasi ke User
    public function user(){
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    // Relasi ke Role
    public function role(){
        return $this->belongsTo(RoleModel::class, 'id_role', 'id_role');
    }
}

