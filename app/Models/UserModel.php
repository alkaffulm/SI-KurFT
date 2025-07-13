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

    // The $hidden property has been removed.

    // relation to table program_studi
    public function programStudiModel()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }
}
