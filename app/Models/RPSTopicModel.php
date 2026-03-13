<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPSTopicModel extends Model
{
    use HasFactory;

    protected $table = 'rps_topics';
    public $timestamps = true;
    protected $primaryKey = 'id_topic';
    protected $fillable = [
        'id_rps',
        'id_sub_cpmk',
        'indikator',
        'tipe',
        'teknik_penilaian_kategori',
        'materi_pembelajaran',
        'refrensi'
    ];

    public function rps() {
        return $this->belongsTo(RPSModel::class, 'id_rps', 'id_rps');
    }

    public function subCpmk() {
        return $this->belongsTo(SubCPMKModel::class, 'id_sub_cpmk', 'id_sub_cpmk');
    }

    public function weeks() {
        return $this->belongsToMany(WeekModel::class, 'rps_topic_week','id_topic', 'id_week');
    }

    public function kriteriaPenilaian() {
        return $this->belongsToMany(KriteriaPenilaianModel::class, 'rps_topic_kriteria_penilaian', 'id_topic', 'id_kriteria_penilaian');
    }

    public function teknikPenilaian() {
        return $this->belongsToMany(TeknikPenilaianModel::class, 'rps_topic_teknik_penilaian', 'id_topic', 'id_teknik_penilaian');
    }

    public function aktivitasPembelajaran() {
        return $this->hasMany(AktivitasPembelajaranModel::class, 'id_topic', 'id_topic');
    }

    protected function teknikPenilaianFormatted(): Attribute {
        return Attribute::make(
            get: function () {
                if (empty($this->teknik_penilaian_kategori)) {
                    return '';
                }

                $teknikNames = $this->teknikPenilaian->pluck('nama_teknik_penilaian')->implode(', ');
                $categoryName = ucfirst(str_replace('-', ' ', $this->teknik_penilaian_kategori));

                if ($teknikNames === '') {
                    return $categoryName;
                }

                return "{$categoryName} ({$teknikNames})";
            }
        );
    }
}
