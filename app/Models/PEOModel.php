<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Model;

class PEOModel extends Model
{
    protected $table = 'peo';
    protected $primaryKey = 'id_peo';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'id_peo',
        'id_kurikulum',
        'kode_peo',
        'desc_peo_id',
        'desc_peo_en'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
        static::addGlobalScope(new KurikulumScope);
    }

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    public function plpeomap()
    {
        return $this->hasMany(PLPEOMapModel::class, 'id_peo', 'id_peo');
    }
}
