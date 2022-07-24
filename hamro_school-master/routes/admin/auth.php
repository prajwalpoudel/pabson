<?php

Auth::routes();

Route::prefix('password')
    ->as('password.')
    ->group(function () {

        // password change routes.
        Route::get('change', 'Auth\ChangePasswordController@index')
            ->name('index');
        Route::post('/update', 'Auth\ChangePasswordController@update')
            ->name('update');
    });

