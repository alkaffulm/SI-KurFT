<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use Illuminate\Database\Eloquent\Model;

class PEOModel extends Model
{
    protected $table = 'peo';
    protected $primaryKey = 'id_peo';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'id_peo',
        'kode_peo',
        'desc_peo',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
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
