<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilLulusanModel extends Model
{
    protected $table = 'profil_lulusan';
    protected $primaryKey = 'id_pl';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'profil_lulusan',
        'desc',
    ];

    /**
     * Relasi many-to-many ke CPLModel melalui tabel pl_cpl_map.
     */
    public function cpl()
    {
        // Parameter:
        // 1. Model tujuan (CPLModel::class)
        // 2. Nama tabel pivot ('pl_cpl_map')
        // 3. Foreign key di tabel pivot untuk model ini ('id_pl')
        // 4. Foreign key di tabel pivot untuk model tujuan ('id_cpl')
        return $this->belongsToMany(CPLModel::class, 'pl_cpl_map', 'id_pl', 'id_cpl');
    }

    // belong to relation
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }
}
