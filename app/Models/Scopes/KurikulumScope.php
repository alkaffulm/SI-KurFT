<?php
namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;

class KurikulumScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $idKurikulum = session('id_kurikulum_aktif');
        
        if ($idKurikulum) {
            $builder->where($model->getTable() . '.id_kurikulum', $idKurikulum);
        } else {
            $userRoleId = session('userRoleId');
            
            if ($userRoleId) {
                $latestKurikulum = DB::table('kurikulum')
                    ->where('id_ps', $userRoleId)
                    ->orderBy('tahun', 'desc')
                    ->value('id_kurikulum');
                    
                if ($latestKurikulum) {
                    session(['id_kurikulum_aktif' => $latestKurikulum]);
                    $builder->where($model->getTable() . '.id_kurikulum', $latestKurikulum);
                }
            }
        }
    }
}