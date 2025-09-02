<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute; 
use Database\Seeders\KriteriaPenilaianSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RPSTopicModel extends Model
{
    use HasFactory;

    // protected $touches = ['rps'];
    
    protected $table = 'rps_topics';
    public $timestamps = true;
    protected $primaryKey = 'id_topic';
    protected $fillable = [
        'id_rps',
        'id_sub_cpmk',
        'indikator',
        'tipe',
        'teknik_penilaian_kategori',
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

    // public function weeks() {
    //     return $this->hasMany(RpsTopicWeekMapModel::class, 'id_topic', 'id_topic');
    // }

    public function weeks() {
        return $this->belongsToMany(WeekModel::class, 'rps_topic_week','id_topic', 'id_week');
    }

    public function kriteriaPenilaian() {
        return $this->belongsToMany(KriteriaPenilaianModel::class, 'rps_topic_kriteria_penilaian', 'id_topic', 'id_kriteria_penilaian');
    }

    public function teknikPenilaian() {
        return $this->belongsToMany(TeknikPenilaianModel::class, 'rps_topic_teknik_penilaian', 'id_topic', 'id_teknik_penilaian');
    }

    protected function teknikPenilaianFormatted(): Attribute {
        return Attribute::make(
            get: function () {
                // Jika tidak ada kategori yang dipilih, kembalikan string kosong.
                if (empty($this->teknik_penilaian_kategori)) {
                    return '';
                }

                // Ambil semua nama teknik yang terhubung, gabungkan dengan koma.
                $teknikNames = $this->teknikPenilaian->pluck('nama_teknik_penilaian')->implode(', ');

                // Format kategori (misal: 'non-tes' menjadi 'Non tes')
                $categoryName = ucfirst(str_replace('-', ' ', $this->teknik_penilaian_kategori));

                // Jika tidak ada teknik yang dipilih, tampilkan kategorinya saja.
                if ($teknikNames === '') {
                    return $categoryName;
                }

                // Gabungkan menjadi format akhir.
                return "{$categoryName} ({$teknikNames})";
            }
        );
    }
}
