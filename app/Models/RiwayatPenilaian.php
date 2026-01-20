<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPenilaian extends Model
{
    protected $table = 'riwayat_penilaian';
    protected $guarded = [];

    protected $casts = [
        'data_lama' => 'array',
        'data_baru' => 'array',
    ];

    public function dosen()
    {
        return $this->belongsTo(UserModel::class, 'id_dosen_pengubah', 'id_user');
    }
}
