<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicWeekMapModel extends Model
{
    protected $table = 'topic_week_map';
    protected $primaryKey = 'id_week_topic';
    public $timestamps = false;

    protected $fillable = [
        'id_topic',
        'minggu_ke'
    ];

    public function topic() {
        return $this->belongsTo(RPSTopicModel::class, 'id_topic', 'id_topic');
    }
}
