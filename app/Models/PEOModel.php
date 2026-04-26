<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PEOModel extends Model
{
    use HasFactory;
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

    

    protected static function booted(): void{
        static::addGlobalScope(new ProdiScope);
        static::addGlobalScope(new KurikulumScope);
    }
    protected static function newFactory()
    {
        return \Database\Factories\PEOFactory::new();
    }
    public function programStudi(){
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }

    public function plpeomap(){
        return $this->hasMany(PLPEOMapModel::class, 'id_peo', 'id_peo');
    }
}
