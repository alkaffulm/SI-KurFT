<?php

namespace App\Livewire\PimpinanUpm;

use App\Models\KurikulumModel;
use App\Models\ProgramStudiModel;
use App\Models\RoleModel;
use App\Models\Scopes\KurikulumScope;
use App\Models\Scopes\ProdiScope;
use App\Models\UserModel;
use Livewire\Component;
use Livewire\WithPagination;

class PenggunaAll extends Component
{
    use WithPagination;
    // Properti untuk Filter
    public $selectedRole = '';
    public $selectedProdi = '';
    public $search = '';

    public function updatingSelectedRole()
    {
        $this->resetPage();
    }

    public function updatingSelectedProdi()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = UserModel::query()
            ->withoutGlobalScopes([
                ProdiScope::class,
                KurikulumScope::class
            ]);

        // FILTER ROLE
        if ($this->selectedRole) {
            $query->hasRole($this->selectedRole);
        }

        // FILTER PRODI
        if ($this->selectedProdi) {
            $query->forProdi($this->selectedProdi);
        }

        // SEARCH
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('username', 'like', '%' . $this->search . '%')
                ->orWhere('NIP', 'like', '%' . $this->search . '%');
            });
        }

        $pengguna = $query
            ->with(['roles', 'prodi'])
            ->paginate(20, ['*'], 'pengguna');

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
