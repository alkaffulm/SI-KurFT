<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RPSModel;
use App\Models\RPSTopicModel;
use App\Models\TopicWeekMapModel;
use Illuminate\Support\Facades\DB;

class RpsDetailManager extends Component
{
    public RPSModel $rps;
    public $topics = [];
    public $allSubCpmks = [];

    protected $rules = [
        'topics.*.id_sub_cpmk' => 'required|exists:sub_cpmk,id_sub_cpmk',
        'topics.*.materi_pembelajaran' => 'required|string',
        'topics.*.metode_pembelajaran' => 'required|string',
        'topics.*.bobot_penilaian' => 'required|integer|min:0|max:100',
        'topics.*.minggu_ke' => 'required|array|min:1', 
    ];

    protected $messages = [
        'topics.*.id_sub_cpmk.required' => 'Setiap topik harus memiliki Sub-CPMK.',
        'topics.*.materi_pembelajaran.required' => 'Setiap topik harus memiliki materi pembelajaran.',
        'topics.*.minggu_ke.required' => 'Setiap topik harus dijadwalkan setidaknya untuk satu minggu.',        
    ];

    public function mount(RPSModel $rps) {
        $this->rps = $rps;
        $this->allSubCpmks = $rps->mataKuliah->cpmks->pluck('subCpmk')->flatten();

        $this->topics = $rps->topics()->with('weeks')->get()->map(function ($topic) {
            return [
                'id_topic' => $topic->id_topic,
                'id_sub_cpmk' => $topic->id_sub_cpmk,
                'indikator' => $topic->indikator,
                'kriteria_teknik_penilaian' => $topic->kriteria_teknik_penilaian,
                'metode_pembelajaran' => $topic->metode_pembelajaran,
                'materi_pembelajaran' => $topic->materi_pembelajaran,
                'bobot_penilaian' => $topic->bobot_penilaian,
                'minggu_ke' => $topic->weeks->pluck('minggu_ke')->toArray(),                
            ];
        })->toArray();
    }

    public function addRow() {
        $this->topics[] = [
            'id_topic' => null, 
            'id_sub_cpmk' => '',
            'indikator' => '',
            'kriteria_teknik_penilaian' => '',
            'metode_pembelajaran' => '',
            'materi_pembelajaran' => '',
            'bobot_penilaian' => 0,
            'minggu_ke' => [], 
        ];
    }

    public function removeRow($index) {
        if (isset($this->topics[$index]['id_topic'])) {
            RPSTopicModel::find($this->topics[$index]['id_topic'])->delete();
        }
        unset($this->topics[$index]);
        $this->topics = array_values($this->topics); // Re-index array
    }  

    public function saveRpsDetail() {
        $this->validate();

        DB::transaction(function () {
            foreach ($this->topics as $topicData) {
                $topic = RPSTopicModel::updateOrCreate(
                    ['id_topic' => $topicData['id_topic'] ?? null],
                    [
                        'id_rps' => $this->rps->id_rps,
                        'id_sub_cpmk' => $topicData['id_sub_cpmk'],
                        'indikator' => $topicData['indikator'],
                        'kriteria_teknik_penilaian' => $topicData['kriteria_teknik_penilaian'],
                        'metode_pembelajaran' => $topicData['metode_pembelajaran'],
                        'materi_pembelajaran' => $topicData['materi_pembelajaran'],
                        'bobot_penilaian' => $topicData['bobot_penilaian'],
                    ]
                );

                TopicWeekMapModel::where('id_topic', $topic->id_topic)->delete();
                $weekMappings = [];
                foreach ($topicData['minggu_ke'] as $week) {
                    $weekMappings[] = ['id_topic' => $topic->id_topic, 'minggu_ke' => $week];
                }
                TopicWeekMapModel::insert($weekMappings);                
            }
        });

        return redirect(route('rps.show', $this->rps))->with('Success', 'Berhasil Memperbarui Rencana pembelajaran mingguan');
    }  

    public function render()
    {
        return view('livewire.rps-detail-manager');
    }

}

// harusnya kd tepakai ni
