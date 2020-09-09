<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get(
    '/testfile',
    function () {
        return view('user.testfile');
    }
);
    
//User Routes
Route::group(['namespace'=>'User'], function () {
    Route::get('/', 'WelcomeController@index')->name('welcome');
    Route::get('/home', 'HomeController@homelogin')->name('home');
    Route::get('/home/search', 'HomeController@searchlive')->name('search');
    Route::post('/home/search', 'HomeController@search')->name('search');

    Route::get('/about', 'WelcomeController@about')->name('about');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::post('/contact', 'ContactController@store')->name('contact.store');
    Route::get('category/{category}', 'HomeController@categoryPosts')->name('category');
    Route::get('tag/{tag}', 'HomeController@tagPosts')->name('tag');
    //Route::get('post', 'PostController@index')->name('post');
    Route::get('post/{post}', 'PostController@post')->name('post');
    Route::post('post/like', 'LikeController@store')->name('like.store');
    Route::post('post/{post}/testlike', 'ButtonController@testlike')->name('button.testlike');
    Route::get(
        'post/1/testlike',
        function () {
            return view('user.testajax');
        }
    );

    Route::post('post/1/testlike', 'ButtonController@testlike')->name('button.testlike');
    Route::post('post/{post}/like', 'ButtonController@like')->name('button.like');
    Route::post('post/{post}/dislike', 'ButtonController@dislike')->name('button.dislike');
    //
    Route::resource('post/{post}/comment', 'CommentController');
   
   

    Route::post('post/reply', 'ReplyController@reply')->name('comment.reply');
    //Route::post('post/1/reply', 'CommentController@reply')->name('comment.reply');
});


//Admin Routes
Route::group(['namespace'=>'Admin'], function () {


    //Post Routes
    Route::resource('admins/post', 'PostController');

    //Tag Routes
    Route::resource('admins/tag', 'TagController');

    //Category Routes
    Route::resource('admins/category', 'CategoryController');

    //Admin User Routes
    Route::get('admins/user', 'UserController@index')->name('users.index');

    //Admin Auth Routes
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
    Route::get('admins', 'AdminHomeController@index')->name('admin.adminhome');
    Route::get('admins/logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::post('admins/logout', 'Auth\LoginController@logout')->name('admin.logout');
});
