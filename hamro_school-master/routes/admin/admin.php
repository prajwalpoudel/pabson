<?php

// Dashboard Route
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

// Email Template Route
Route::resource('email-template', 'EmailTemplateController');

// Academics Routes

//Grade Routes
Route::group(['as' => 'academics.'], function () {
    Route::resource('grade', 'Academics\GradeController');
});
//Subject Routes
Route::group(['as' => 'academics.'], function () {
    Route::resource('subject', 'Academics\SubjectController');
});

// Location Routes
Route::resource('province', 'Location\ProvinceController');
Route::resource('district', 'Location\DistrictController');
Route::resource('municipality', 'Location\MunicipalityController');


//User Routes
Route::group(['as' => 'user.'], function () {
    //School Routes
    Route::resource('school', 'User\SchoolController');
    // Teacher routes
    Route::resource('teacher', 'User\TeacherController');
    // Student Routes
    Route::resource('student', 'User\StudentController');
    // Moderator Routes
    Route::resource('moderator', 'User\ModeratorController');
    Route::post('moderator/{id}/reset','User\ModeratorController@resetPassword')->name('moderator.reset');
});

//Admin Profile Routes
Route::resource('profile', 'Profile\ProfileController');

//Admin Setting Routes
Route::resource('setting', 'Setting\SettingController');

