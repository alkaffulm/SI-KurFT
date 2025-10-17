<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AktivitasPembelajaranModel extends Model
{
    protected $table = 'aktivitas_pembelajaran';
    protected $primaryKey = 'id_aktivitas_pembelajaran';
    public $timestamps = false;

    protected $fillable = [
        'id_topic',
        'tipe',
        'id_bentuk_pembelajaran',
        'penugasan_mahasiswa',
        'jumlah_pertemuan',
        'jumlah_sks',
    ];

    public function metodePembelajaran() {
        return $this->belongsToMany(MetodePembelajaranModel::class, 'aktivitas_metode_pembelajaran', 'id_aktivitas_pembelajaran', 'id_metode_pembelajaran');
    }

    public function bentukPenugasan() {
        return $this->belongsToMany(BentukPenugasanModel::class, 'aktivitas_bentuk_penugasan', 'id_aktivitas_pembelajaran', 'id_bentuk_penugasan');
    }

    public function topic() {
        return $this->belongsTo(RPSTopicModel::class, 'id_topic', 'id_topic');
    }

    public function bentukPembelajaran() {
        return $this->belongsTo(BentukPembelajaranModel::class, 'id_bentuk_pembelajaran', 'id_bentuk_pembelajaran');
    }
}
