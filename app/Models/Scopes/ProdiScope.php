<?php

namespace App\Models\Scopes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class ProdiScope implements Scope
{    
    const MULTI_PRODI = 16;
    public function apply(Builder $builder, Model $model): void
    {
        if (session('bypass_prodi_scope')) {
            return;
        }
        
        if (Auth::check()) {

            $userRoleId = session()->get('userRoleId');

            // case dosen multi prodi
            if ($userRoleId == self::MULTI_PRODI) {
                return;
            }

            if ($userRoleId) {
                $builder->where('id_ps', $userRoleId);
            }
        }
    }
}
