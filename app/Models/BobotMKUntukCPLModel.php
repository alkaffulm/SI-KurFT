<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotMKUntukCPLModel extends Model
{
    protected $table = 'bobot_mk_untuk_cpl';
    protected $primaryKey = 'id_bobot_mk_cpl';
    public $timestamps = false;
    protected $fillable = [
        'id_mk',
        'id_cpl',
        'bobot_persen',
    ];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }

    public function cpl()
    {
        return $this->belongsTo(CPLModel::class, 'id_cpl', 'id_cpl');
    }
}

