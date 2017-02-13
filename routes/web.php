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

Route::get('/', 'PostsController@index');
//* What will need for this:           These can be created using:                     or        When we create our model, we also create the other two:
//* controller =>PostsController       php artisan make:controller PostsController                php artisan make:model Post -mc
//* Eloquent model => Post             php artisan make:model Post
//* migration => create_posts_table    php artisan make:migration create_posts_table --create=posts

Route::get('/posts/{post}', 'PostsController@show');
