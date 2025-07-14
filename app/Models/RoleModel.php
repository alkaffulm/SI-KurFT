<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id_role';
    public $timestamps = false;

    protected $fillable = [
        'role',
    ];

    // has many relation
    public function userRoleMap(){
        return $this->hasMany(UserRoleMapModel::class, 'id_role', 'id_role');
    }
}
