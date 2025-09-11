<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Model;

class VisiKeilmuanModel extends Model
{
    protected $table = 'visi_keilmuan';

    protected $primaryKey = 'id_visi_keilmuan';

    public $timestamps = false;

    protected $fillable = [
        'id_ps',
        'id_kurikulum',
        'desc_vk_id',
        'desc_vk_en'
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
}
