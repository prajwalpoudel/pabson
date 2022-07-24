<?php

Auth::routes();
//Auth::routes();

Route::get('register/school', 'Auth\RegisterController@school')->name('register.school');
Route::get('register/teacher', 'Auth\RegisterController@teacher')->name('register.teacher');
Route::get('register/student', 'Auth\RegisterController@student')->name('register.student');
Route::get('register/parent', 'Auth\RegisterController@parent')->name('register.parent');

Route::get('/unverified-user', 'Auth\FrontUserVerificationController@unverified')->name('unverified')->middleware('auth:front');

Route::prefix('password')
    ->as('password.')
    ->group(function () {

        // password change routes.
        Route::get('change', 'Auth\ChangePasswordController@index')
            ->name('index');
        Route::post('/update', 'Auth\ChangePasswordController@update')
            ->name('update');
    });
