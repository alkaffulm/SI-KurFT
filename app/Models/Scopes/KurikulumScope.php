<?php
namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;

class KurikulumScope implements Scope
{
    const MULTI_PRODI = 16;
    public function apply(Builder $builder, Model $model): void
    {
        $userRoleId = session('userRoleId');

        
        if (session('bypass_kurikulum_scope')) {
            return;
        }


        // case dosen multi prodi
        if ($userRoleId == self::MULTI_PRODI) {
            return;
        }

        $idKurikulum = session('id_kurikulum_aktif');

        if ($idKurikulum) {
            $builder->where($model->getTable() . '.id_kurikulum', $idKurikulum);
        } else {

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