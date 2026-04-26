<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\{
    TeknikPenilaianAdminController,
    KriteriaPenilaianAdminController,
    MetodePembelajaranController,
    ModelPembelajaranController
};

use App\Http\Requests\UpdateAll\{
    UpdateAllTeknikPenilaianRequest,
    UpdateAllKriteriaPenilaianRequest,
    UpdateAllMetodePembelajaranRequest,
    UpdateAllModelPembelajaranRequest
};

uses(RefreshDatabase::class);

/*
|--------------------------------------------------------------------------
| HELPER
|--------------------------------------------------------------------------
*/
function makeRequest($class, $data)
{
    $request = $class::create('/', 'POST', $data);
    $request->setContainer(app());
    $request->setRedirector(app('redirect'));
    $request->validateResolved();
    return $request;
}

/*
|--------------------------------------------------------------------------
| SETUP
|--------------------------------------------------------------------------
*/
beforeEach(function () {

    $this->withoutMiddleware();

    Auth::shouldReceive('id')->andReturn(1);

    session([
        'userRoleId' => 1,
        'bypass_prodi_scope' => true,
    ]);

    DB::statement('SET FOREIGN_KEY_CHECKS=0');

    foreach ([
        'teknik_penilaian',
        'kriteria_penilaian',
        'metode_pembelajaran',
        'model_pembelajaran',
        'program_studi',
    ] as $table) {
        DB::table($table)->truncate();
    }

    DB::statement('SET FOREIGN_KEY_CHECKS=1');

    DB::table('program_studi')->insert([
        'id_ps' => 1,
        'nama_prodi' => 'Teknik Sipil',
    ]);
});

/*
|--------------------------------------------------------------------------
| GENERIC TEST FUNCTION
|--------------------------------------------------------------------------
*/
function runWhiteBoxTests($config)
{
    [$table, $pk, $field, $controller, $requestClass, $extra] = $config;

    /*
    | DELETE ONLY
    */
    it("[$table] delete only", function () use ($table, $pk, $field, $controller, $requestClass, $extra) {

        DB::table($table)->insert([
            array_merge([$pk => 1, $field => 'A', 'id_ps'=>1], $extra),
            array_merge([$pk => 2, $field => 'B', 'id_ps'=>1], $extra),
        ]);

        $ctrl = new $controller;

        $req = makeRequest($requestClass, [
            "delete_$table" => [1,2]
        ]);

        $ctrl->updateAll($req);

        expect(DB::table($table)->count())->toBe(0);
    });

    /*
    | UPDATE 1 DATA
    */
    it("[$table] update satu", function () use ($table, $pk, $field, $controller, $requestClass, $extra) {

        DB::table($table)->insert(
            array_merge([$pk => 1, $field => 'lama', 'id_ps'=>1], $extra)
        );

        $ctrl = new $controller;

        $req = makeRequest($requestClass, [
            $table => [
                1 => array_merge([$field => 'baru'], $extra)
            ]
        ]);

        $ctrl->updateAll($req);

        $data = DB::table($table)->where($pk,1)->first();

        expect($data->$field)->toBe('baru');
    });

    /*
    | UPDATE MULTI
    */
    it("[$table] update banyak", function () use ($table, $pk, $field, $controller, $requestClass, $extra) {

        DB::table($table)->insert([
            array_merge([$pk=>1,$field=>'A','id_ps'=>1],$extra),
            array_merge([$pk=>2,$field=>'B','id_ps'=>1],$extra),
        ]);

        $ctrl = new $controller;

        $req = makeRequest($requestClass, [
            $table => [
                1 => array_merge([$field=>'X'],$extra),
                2 => array_merge([$field=>'Y'],$extra),
            ]
        ]);

        $ctrl->updateAll($req);

        expect(DB::table($table)->where($pk,1)->first()->$field)->toBe('X');
        expect(DB::table($table)->where($pk,2)->first()->$field)->toBe('Y');
    });

    /*
    | DELETE + UPDATE
    */
    it("[$table] delete + update", function () use ($table, $pk, $field, $controller, $requestClass, $extra) {

        DB::table($table)->insert([
            array_merge([$pk=>1,$field=>'A','id_ps'=>1],$extra),
            array_merge([$pk=>2,$field=>'B','id_ps'=>1],$extra),
        ]);

        $ctrl = new $controller;

        $req = makeRequest($requestClass, [
            "delete_$table" => [1],
            $table => [
                2 => array_merge([$field=>'updated'],$extra)
            ]
        ]);

        $ctrl->updateAll($req);

        expect(DB::table($table)->count())->toBe(1);
    });

    /*
    | EMPTY INPUT
    */
    it("[$table] empty input", function () use ($controller, $requestClass) {

        $ctrl = new $controller;

        $req = makeRequest($requestClass, []);

        $res = $ctrl->updateAll($req);

        expect($res)->not->toBeNull();
    });

    /*
    | ID NOT FOUND
    */
    it("[$table] id tidak ditemukan", function () use ($table, $field, $controller, $requestClass, $extra) {

        $ctrl = new $controller;

        $req = makeRequest($requestClass, [
            $table => [
                999 => array_merge([$field=>'ghost'],$extra)
            ]
        ]);

        $ctrl->updateAll($req);

        expect(DB::table($table)->count())->toBe(0);
    });
}

/*
|--------------------------------------------------------------------------
| RUN FOR ALL 4 MODULES
|--------------------------------------------------------------------------
*/
runWhiteBoxTests([
    'kriteria_penilaian',
    'id_kriteria_penilaian',
    'nama_kriteria_penilaian',
    KriteriaPenilaianAdminController::class,
    UpdateAllKriteriaPenilaianRequest::class,
    []
]);

runWhiteBoxTests([
    'teknik_penilaian',
    'id_teknik_penilaian',
    'nama_teknik_penilaian',
    TeknikPenilaianAdminController::class,
    UpdateAllTeknikPenilaianRequest::class,
    ['kategori'=>'test']
]);

runWhiteBoxTests([
    'metode_pembelajaran',
    'id_metode_pembelajaran',
    'nama_metode_pembelajaran',
    MetodePembelajaranController::class,
    UpdateAllMetodePembelajaranRequest::class,
    ['tipe_metode_pembelajaran'=>'tm']
]);

runWhiteBoxTests([
    'model_pembelajaran',
    'id_model_pembelajaran',
    'nama_model_pembelajaran',
    ModelPembelajaranController::class,
    UpdateAllModelPembelajaranRequest::class,
    []
]);
