<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/school/{id}/grades', function ($id) {
    return app(\App\Http\Services\Grade\GradeService::class)->query()->where(['school_id' => $id])->select('id', 'name as text')->get();
});

Route::get('/province/{id}/districts', function ($id) {
    return app(\App\Http\Services\Location\DistrictService::class)->query()->where(['province_id' => $id])->select('id', 'name as text')->get();
});

Route::get('/district/{id}/municipalities', function ($id) {
    return app(\App\Http\Services\Location\MunicipalityService::class)->query()->where(['district_id' => $id])->select('id', 'name as text')->get();
});

Route::get('/school/{id}/grades', function ($id) {
    return app(\App\Http\Services\Grade\GradeService::class)->query()->where(['school_id' => $id])->select('id', 'name as text')->get();
});

Route::get('/school/{id}/students', function ($id) {
    return \Illuminate\Support\Facades\DB::table('students')->join('users', 'students.user_id', '=', 'users.id')->whereIn('students.school_id', explode(",", $id))->select(DB::raw('CONCAT(users.first_name, " ", users.last_name) AS text'), 'students.id as id')->get();
});
