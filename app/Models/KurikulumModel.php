<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use Illuminate\Database\Eloquent\Model;
use TahunAkademikModel;

class KurikulumModel extends Model
{
    protected $table = 'kurikulum';
    protected $primaryKey = 'id_kurikulum';
    public $timestamps = false;
    protected $fillable = [
        'id_kurikulum',
        'id_ps',
        'tahun',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
    }

    // has many relation
    public function cpl(){
        return $this->belongsTo(CPLModel::class, 'id_kurikulum', 'id_kurikulum');
    }

    // belong to relation
    public function programstudi(){
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }    
public function tahunAkademiks()
{
    return $this->belongsToMany(
        TahunAkademik::class,
        'kurikulum_tahun_akademik_map',
        'id_kurikulum',
        'id_tahun_akademik'
    );
}




}
