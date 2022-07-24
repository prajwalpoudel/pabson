<?php
//Moderator Profile routes
Route::resource('profile', 'ProfileController');

Route::get('discussion/pending', 'DiscussionController@pending')->name('discussion.pending');
Route::get('discussion/approved', 'DiscussionController@approved')->name('discussion.approved');
Route::get('discussion/{id}', 'DiscussionController@show')->name('discussion.show');
Route::put('discussion/{id}', 'DiscussionController@update')->name('discussion.update');
