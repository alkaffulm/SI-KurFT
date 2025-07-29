<?php

namespace App\Models;

use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;
use Illuminate\Database\Eloquent\Model;

class RPSModel extends Model
{
    protected $table = 'rps';
    protected $primaryKey = 'id_rps';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_mk',
        'tahun',
        'file_path',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ProdiScope);
        static::addGlobalScope(new KurikulumScope);
    }
    // has many relation
    public function rps_detail(){
        return $this->hasMany(RPSDetailModel::class, 'id_rps', 'id_rps');
    }

    // belongs to relation
    public function mataKuliah(){
        return $this->belongsTo(MataKuliahModel::class, 'id_mk', 'id_mk');
    }
    public function user(){
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}
