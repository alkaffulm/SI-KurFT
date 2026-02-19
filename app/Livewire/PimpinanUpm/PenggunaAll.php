<?php

namespace App\Livewire\PimpinanUpm;

use Livewire\Component;
use App\Models\UserModel;
use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\RoleModel;
use App\Models\Scopes\ProdiScope;
use App\Models\Scopes\KurikulumScope;

class PenggunaAll extends Component
{
    // Properti untuk Filter
    public $selectedRole = '';
    public $selectedProdi = '';

    public function render()
    {
        // 1. Mulai Query & Matikan Global Scope
        $query = UserModel::query()
            ->withoutGlobalScopes([ProdiScope::class, KurikulumScope::class]);

        // 2. Terapkan Filter jika ada input
        if ($this->selectedRole) {
            $query->hasRole($this->selectedRole);
        }

        if ($this->selectedProdi) {
            $query->forProdi($this->selectedProdi);
        }

        // 3. Ambil Data
        $pengguna = $query->with(['roles', 'prodi'])->get();

        // Data pendukung untuk dropdown filter
        $programStudi = ProgramStudiModel::all();
        $role = RoleModel::all();

        return view('livewire.pimpinan-upm.pengguna-all', [
            'pengguna' => $pengguna,
            'list_role' => $role,
            'list_prodi' => $programStudi,
        ]);
    }
}
