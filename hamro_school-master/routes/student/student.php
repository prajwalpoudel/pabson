<?php

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::group(
    [
        'prefix' => 'profile'
    ],
    function () {
        Route::get('', 'StudentProfileController@index')
            ->name('profile');
        Route::get('edit', 'StudentProfileController@edit')
            ->name('profile.edit');
        Route::post('update', 'StudentProfileController@update')
            ->name('profile.update');
    });

Route::get('blogs', 'BlogController@index')->name('blog.index');
Route::get('blog/{id}', 'BlogController@show')->name('blog.show');

Route::get('notices', 'NoticeController@index')->name('notice.index');
Route::get('notice/{id}', 'NoticeController@show')->name('notice.show');

Route::get('education-materials', 'EducationMaterialController@index')->name('education-material.index');
Route::get('education-material/{id}', 'EducationMaterialController@show')->name('education-material.show');

Route::resource('discussion/my-post', 'Discussion\MyPostController');

Route::get('discussion', 'Discussion\DiscussionController@index')->name('discussion.index');
Route::get('discussion/{id}', 'Discussion\DiscussionController@show')->name('discussion.show');
Route::post('discussion/like', 'Discussion\DiscussionController@like')->name('discussion.like');
Route::post('discussion/{discussionId}/comment', 'Discussion\CommentController@store')->name('discussion.comment.save');
Route::get('discussion/comment/{commentId}', 'Discussion\CommentController@edit')->name('discussion.comment.edit');
Route::post('discussion/comment/{commentId}/update', 'Discussion\CommentController@update')->name('discussion.comment.update');
Route::post('discussion/comment/{commentId}/destroy', 'Discussion\CommentController@destroy')->name('discussion.comment.destroy');

Route::get('/password/change', 'PasswordChangeController@index')->name('password.change');
Route::post('/password/update', 'PasswordChangeController@update')->name('password.update');
