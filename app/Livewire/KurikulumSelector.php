<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\KurikulumModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KurikulumSelector extends Component
{
    public $kurikulum;
    public $debug = [];
    
    public function mount()
    {
        // $this->kurikulum = session('tahun', '2020');

        // $this->debug = [
        //     'kurikulum_mount' => $this->kurikulum,
        //     'userRoleId_mount' => session('userRoleId'),
        //     'id_kurikulum_aktif_mount' => session('id_kurikulum_aktif')
        // ];
        
        // if (!session('id_kurikulum_aktif') && session('userRoleId')) {
        //     $this->setKurikulumAktif($this->kurikulum);
        // }

        if(session('id_kurikulum_aktif')) {
            $kurikulumDB = KurikulumModel::find(session('id_kurikulum_aktif'));
            if($kurikulumDB) {
                $this->kurikulum = $kurikulumDB->tahun;
                session(['tahun' => $kurikulumDB->tahun]);
            }
        }
        elseif (session('userRoleId')) {
            $defaultKurikulum = KurikulumModel::where('id_ps', session('userRoleId'))->orderBy('tahun', 'asc')->first();
            if($defaultKurikulum) {
                $this->kurikulum = $defaultKurikulum->tahun;
                session(['tahun' => $defaultKurikulum->tahun]);
                session(['id_kurikulum_aktif' => $defaultKurikulum->id_kurikulum]);
            }
        }
    }

    
    public function updatedKurikulum($value)
    {
        session(['tahun' => $value]);
        $this->setActiveKurikulum($value);
    }
    
    // setiap kurikulum berubah akan disimpan ke table user
    private function setActiveKurikulum($tahun) {
        $idKurikulum = KurikulumModel::where('id_ps', session('userRoleId'))->where('tahun', $tahun)->value('id_kurikulum');

        if($idKurikulum) {
            session(['id_kurikulum_aktif' => $idKurikulum]);

            if(Auth::check()) {
                /** @var \App\Models\UserModel $user */
                $user = Auth::user();
                $user->last_active_kurikulum_id = $idKurikulum;
                $user->save();
            }
            $this->dispatch('kurikulum-changed', $idKurikulum);
        }
        else {
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