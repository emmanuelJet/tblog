<?php

Auth::routes();

//socail login
Route::get('login/facebook', 'Auth\OAuthController@redirectToFacebook')->name('facebook');
Route::get('login/facebook/callback', 'Auth\OAuthController@handleFacebookCallback');

Route::get('login/google', 'Auth\OAuthController@redirectToGoogle')->name('google');
Route::get('login/google/callback', 'Auth\OAuthController@handleGoogleCallback');


// middleware for admin
Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function (){
    Route::resource('/users','UsersController');
		Route::resource('/post','PostsController');
    Route::resource('/category','CategoriesController');
    Route::resource('/tags','TagController');
		Route::get('/posts/trashed',['as'=>'trashed_posts','uses'=>'PostsController@trashed']);
    Route::get('/user/remove_permsion/{id}', ['as'=>'remove_permision', 'uses'=>'UsersController@remove_permision']);
    Route::get('/user/make_admin/{id}', ['as'=>'make_admin', 'uses'=>'UsersController@make_admin']);
    Route::get('/posts/delete-f-ever/{id}',['as'=>'deleteforever','uses'=>'PostsController@deleteforever']);
    Route::get('/posts/restore/{id}',['as'=>'restore','uses'=>'PostsController@restore']);
});

/// middleware for user registred

Route::group(['middleware'=>'auth'],function (){
    Route::get('/dashboard','HomeController@index')->name('home');
    Route::get('/logout','Auth\LoginController@logout');
    Route::post('/logout','Auth\LoginController@logout')->name('logout');
    Route::get('/profile/settings',['as'=>'show_profile','uses'=>'ProfileController@show_profile']);
    Route::patch('/profile/settings',['as'=>'update_profile','uses'=>'ProfileController@update_profile']);
});

// middleware for guest

Route::prefix('guest')->group(function (){
Route::get('/register','Auth\LoginController@get_register')->name('show_register');
Route::post('/register',['as'=>'register_new_user','uses'=>'Auth\LoginController@post_register']);
Route::get('/login','Auth\LoginController@get_login')->name('login');
Route::post('/login',['as'=>'login','uses'=>'Auth\LoginController@post_login']);
Route::get('forget_pass/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', ['as'=>'new_pass','uses'=>'Auth\ResetPasswordController@reset']);

Route::get('', ['uses' => 'CommentsController@Dashboard', 'as' => 'comment']);
Route::post('/createcomment',['uses' => 'CommentsController@CreateComment','as' => 'comment.create']);
Route::get('/deletecomment/{comment_id}',['uses' => 'CommentsController@DeleteComment', 'as' => 'comment.delete']);
Route::post('/{id}/edit',['uses' => 'CommentsController@UpdateComment', 'as' => 'comment.update']);

});

Route::get('/',['as'=>'index_front','uses'=>'FrontendController@index']);
Route::get('/post/{slug}',['as'=>'show.post','uses'=>'FrontendController@single']);
Route::get('/category/{slug}',['as'=>'category.page','uses'=>'FrontendController@category']);
Route::get('/tags/{slag}',['as'=>'tag.page','uses'=>'FrontendController@tag']);
Route::any('/search',['as'=>'search','uses'=>'FrontendController@search']);