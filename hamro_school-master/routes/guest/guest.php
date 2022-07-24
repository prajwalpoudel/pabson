<?php

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('blog/{id}', 'DashboardController@show')->name('blog.show');

Route::post('/loadmore/load_data', 'DashboardController@browseMore')->name('loadmore.load_data');
