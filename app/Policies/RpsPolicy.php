<?php

namespace App\Policies;

use App\Models\RPSModel;
// 1. PASTIKAN INI BENAR:
// Kita import UserModel dan memberinya alias 'User'
// agar Laravel tahu 'User' = 'UserModel'
use App\Models\UserModel as User; 
use App\Models\Scopes\ProdiScope;
use Illuminate\Auth\Access\HandlesAuthorization;

class RpsPolicy
{
    use HandlesAuthorization;

    /**
     * Tentukan apakah user bisa melihat DAFTAR (halaman index) RPS.
     * Ini penting untuk halaman /rps
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Tentukan apakah user bisa melihat SATU RPS.
     * Ini adalah logika utama Anda untuk /rps/{id}
     */
    public function view(User $user, RPSModel $rps)
    {
        // Apakah Kaprodi dari prodi yang sama.
        if ($user->roles->contains('role', 'Kaprodi')) {
            if ($user->id_ps === $rps->id_ps) {
                return $this->allow('Anda merupakan Kaprodi dari prodi ini, akses diizinkan!');
            }
        }

        $mataKuliah = $rps->mataKuliah()->withoutGlobalScope(ProdiScope::class)->first();

        // Jika mata kuliah tidak ditemukan (data RPS tidak lengkap), tolak.
        if (!$mataKuliah) {
            return $this->deny('RPS Tidak DItemukan!');
        }

        // Apakah user ini Dosen Pengembang RPS atau Koordinator MK?
        if ($user->id_user === $mataKuliah->id_pengembang_rps || $user->id_user === $mataKuliah->id_koordinator_mk) {
            return true;
        }
        else {
            return $this->deny('Anda Bukan Dosen Pengembang atau Koordinator MK dari RPS ini!');
        }
        

        return false;
    }

    /**
     * Tentukan apakah user bisa mengedit (update) RPS.
     * Sesuai aturan Anda sebelumnya: hanya Dosen Pengembang (atau Admin)
     */
    public function update(User $user, RPSModel $rps)
    {

        if ($user->roles->contains('role', 'Kaprodi')) {
            if ($user->id_ps === $rps->id_ps) {
                return $this->allow('Anda merupakan Kaprodi dari prodi ini, akses diizinkan!');
            }
        }

        $mataKuliah = $rps->mataKuliah()->withoutGlobalScope(ProdiScope::class)->first();

        if (!$mataKuliah) {
            return $this->deny('RPS Tidak DItemukan!');
        }

        if ($user->id_user === $mataKuliah->id_pengembang_rps ) {
            return true;
        }
        else {
            return $this->deny('Anda Bukan Dosen Pengembang dari RPS ini!');
        }
        
        // Kaprodi & Dosen lain tidak boleh mengedit.
        return false;
    }
}