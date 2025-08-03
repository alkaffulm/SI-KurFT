<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RPSTopicModel extends Model
{
    use HasFactory;

    protected $table = 'rps_topics';
    protected $primaryKey = 'id_topic';
    protected $fillable = [
        'id_rps',
        'id_sub_cpmk',
        'indikator',
        'kriteria_teknik_penilaian',
        'metode_pembelajaran',
        'materi_pembelajaran',
        'bobot_penilaian'
    ];

    public function rps() {
        return $this->belongsTo(RPSModel::class, 'id_rps', 'id_rps');
    }

    public function subCpmk() {
        return $this->belongsTo(SubCPMKModel::class, 'id_sub_cpmk', 'id_sub_cpmk');
    }

    public function weeks() {
        return $this->hasMany(TopicWeekMapModel::class, 'id_topic', 'id_topic');
    }

}
