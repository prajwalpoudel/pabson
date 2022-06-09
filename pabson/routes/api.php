<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/province/{id}/districts', function ($id) {
    return app(\App\Http\Services\Location\DistrictService::class)->query()->where(['province_id' => $id])->select('id', 'name as text')->get();
});

Route::get('/district/{id}/municipalities', function ($id) {
    return app(\App\Http\Services\Location\MunicipalityService::class)->query()->where(['district_id' => $id])->select('id', 'name as text')->get();
});

