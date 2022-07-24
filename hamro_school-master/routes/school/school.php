<?php

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

/*Route::group(
    [
        'prefix' => 'profile'
    ],
    function () {
        Route::get('', 'UserProfileController@index')
            ->name('profile');
        Route::get('edit', 'UserProfileController@edit')
            ->name('profile.edit');
        Route::post('update', 'UserProfileController@update')
            ->name('profile.update');
    });*/

Route::resource('description', 'DescriptionController');
Route::resource('principal_message', 'PrincipalMessageController');
Route::resource('notice', 'NoticeController');

Route::resource('teacher', 'User\TeacherController');
Route::resource('student', 'User\StudentController');
Route::resource('education_material', 'EducationMaterialController');
Route::resource('blog', 'BlogController');

//School Profile Routes
Route::resource('profile', 'Profile\ProfileController');


