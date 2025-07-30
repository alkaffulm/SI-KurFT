<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class KurikulumSelector extends Component
{
    public $kurikulum;
    public $debug = [];
    
    public function mount()
    {
        $this->kurikulum = session('tahun', '2020');

        $this->debug = [
            'kurikulum_mount' => $this->kurikulum,
            'userRoleId_mount' => session('userRoleId'),
            'id_kurikulum_aktif_mount' => session('id_kurikulum_aktif')
        ];
        
        if (!session('id_kurikulum_aktif') && session('userRoleId')) {
            $this->setKurikulumAktif($this->kurikulum);
        }
    }
    
    public function updatedKurikulum($value)
    {
        session(['tahun' => $value]);
        $this->setKurikulumAktif($value);
    }
    
    private function setKurikulumAktif($tahun)
    {
        $userRoleId = session('userRoleId');
        
        $this->debug['userRoleId_update'] = $userRoleId;
        $this->debug['tahun_update'] = $tahun;
        
        if (!$userRoleId) {
            $this->debug['error'] = 'userRoleId tidak ditemukan';
            return;
        }
        
        $idKurikulum = DB::table('kurikulum')
            ->where('tahun', $tahun)
            ->where('id_ps', $userRoleId)
            ->value('id_kurikulum');
            
        $this->debug['query_result'] = $idKurikulum;
        $this->debug['query_params'] = [
            'tahun' => $tahun,
            'id_ps' => $userRoleId
        ];
        
        if ($idKurikulum) {
            session(['id_kurikulum_aktif' => $idKurikulum]);
            $this->debug['session_set'] = $idKurikulum;
            $this->dispatch('kurikulum-changed', $idKurikulum);
        } else {
            session()->forget('id_kurikulum_aktif');
            $this->debug['error'] = 'Kurikulum tidak ditemukan di database';
        }
    }
    
    public function render()
    {
        $kurikulumList = collect();
        
        if (session('userRoleId')) {
            $kurikulumList = DB::table('kurikulum')
                ->where('id_ps', session('userRoleId'))
                ->orderBy('tahun', 'desc')
                ->get(['tahun', 'id_kurikulum']);
        }
        
        // Update debug info untuk render
        $this->debug['kurikulum_list_count'] = $kurikulumList->count();
        $this->debug['current_session'] = [
            'tahun' => session('tahun'),
            'id_kurikulum_aktif' => session('id_kurikulum_aktif'),
            'userRoleId' => session('userRoleId')
        ];
            
        return view('livewire.kurikulum-selector', [
            'kurikulumList' => $kurikulumList
        ]);
    }
}