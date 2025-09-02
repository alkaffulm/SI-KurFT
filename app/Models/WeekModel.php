<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeekModel extends Model
{
    protected $table = 'weeks';
    protected $primaryKey = 'id_week';
    public $timestamps = false;

    protected $fillable = [
        'week',
    ];

}
