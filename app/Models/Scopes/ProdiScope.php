<?php

namespace App\Models\Scopes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class ProdiScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::check()) {
            $userRole = session()->get('userRole');
            $userRoleId = session()->get('userRoleId');

            if ($userRoleId) {
                $builder->where('id_ps', $userRoleId);
            }
        }
    }
}
