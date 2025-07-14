<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMataKuliahMapModel extends Model
{
    protected $table = 'user_mata_kuliah_map';
    protected $primaryKey = 'id_user_mk';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_mk',
    ];

    // belongs to relation
    public function user(){
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
    public function matakuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }
}
