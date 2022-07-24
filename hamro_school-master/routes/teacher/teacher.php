<?php

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//Teacher Profile Routes
Route::resource('profile', 'TeacherProfileController');

Route::resource('blog', 'BlogController');
Route::resource('education_material', 'EducationMaterialController');

Route::get('notices', 'NoticeController@index')->name('notice.index');
Route::get('notice/{id}', 'NoticeController@show')->name('notice.show');

Route::resource('discussion/my-post', 'Discussion\MyPostController');
Route::get('discussion', 'Discussion\DiscussionController@index')->name('discussion.index');
Route::get('discussion/{id}', 'Discussion\DiscussionController@show')->name('discussion.show');
Route::post('discussion/like', 'Discussion\DiscussionController@like')->name('discussion.like');
Route::post('discussion/{discussionId}/comment', 'Discussion\CommentController@store')->name('discussion.comment.save');
Route::get('discussion/comment/{commentId}', 'Discussion\CommentController@edit')->name('discussion.comment.edit');
Route::post('discussion/comment/{commentId}/update', 'Discussion\CommentController@update')->name('discussion.comment.update');
Route::post('discussion/comment/{commentId}/destroy', 'Discussion\CommentController@destroy')->name('discussion.comment.destroy');
