<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KurikulumModel extends Model
{
    protected $table = 'kurikulum';
    protected $primaryKey = 'id_kurikulum';
    public $timestamps = false;
    protected $fillable = [
        'id_ps',
        'tahun',
    ];

    // has many relation
    public function cpl(){
        return $this->belongsTo(CPLModel::class, 'id_kurikulum', 'id_kurikulum');
    }

    // belong to relation
    public function programstudi(){
        return $this->belongsTo(ProgramStudiModel::class, 'id_ps', 'id_ps');
    }
}
