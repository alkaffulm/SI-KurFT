<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudiModel extends Model
{
    protected $table = 'program_studi';
    protected $primaryKey = 'id_ps';
    public $timestamps = false;
    protected $fillable = ['nama_prodi'];

    // relation to table user
    public function userModel(){
        return $this->hasMany(UserModel::class, 'id_ps', 'id_ps');
    }
}
