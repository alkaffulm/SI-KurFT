<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRoleMapModel extends Pivot
{
    protected $table = 'user_role_map';
    protected $primaryKey = 'id_user_role';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_role',
        'id_ps',
    ];

    // Relasi ke User
    public function user(){
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    // Relasi ke Program Studi
    public function programStudi(){
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    // Relasi ke Role
    public function role(){
        return $this->belongsTo(RoleModel::class, 'id_role', 'id_role');
    }
}

