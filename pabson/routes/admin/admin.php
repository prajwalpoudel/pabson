<?php

//Route::group(['as' => 'auth.'], function () {
//    Auth::routes();
//
//    Route::prefix('password')
//        ->as('password.')
//        ->group(function () {
//
//            // password change routes.
//            Route::get('change', 'Auth\ChangePasswordController@index')
//                ->name('index');
//            Route::post('/update', 'Auth\ChangePasswordController@update')
//                ->name('update');
//        });
//});

// Dashboard Route
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

// Email Template Route
Route::resource('email-template', 'EmailTemplateController');

// Academics Routes


// Location Routes
Route::resource('province', 'Location\ProvinceController');
Route::resource('district', 'Location\DistrictController');
Route::resource('municipality', 'Location\MunicipalityController');


//User Routes
Route::group(['as' => 'user.'], function () {
    //School Routes
    Route::resource('school', 'User\SchoolController');
});

//Admin Profile Routes
Route::resource('profile', 'Profile\ProfileController');

//Admin Setting Routes
Route::resource('setting', 'Setting\SettingController');

