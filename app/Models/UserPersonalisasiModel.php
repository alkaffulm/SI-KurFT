<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class UserPersonalisasiModel extends Model
{
    protected $table = 'user_personalisasi';
    protected $primaryKey = 'id_personalisasi';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_user_role',
        'email',
        'userpicture_path',
    ];

    public function UserModel(){
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}
