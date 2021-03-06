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

Route::get('/', 'PostsController@index')->name('home');
//* What will need for this:           These can be created using:                     or        When we create our model, we also create the other two:
//* controller =>PostsController       php artisan make:controller PostsController                php artisan make:model Post -mc
//* Eloquent model => Post             php artisan make:model Post
//* migration => create_posts_table    php artisan make:migration create_posts_table --create=posts

                    //* Wildcard *//
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');

//* When we respond to a POST request:
Route::post('/posts', 'PostsController@store'); // Don't forget to run the 'php artisan make:controller TasksController -r' The -r makes it a "resoursful" controller.

Route::get('/posts/tags/{tag}', 'TagsController@index');

//* To post a post to our database this needs to happen:

//* If we can represent a resource like
//* GET /posts
//
//* To view all of the posts we would visit:
//* /posts  This is similar to "selsect *" from
//
//* To create a post:
//* GET /posts/create  This will display a form to create a post.
//
//* When the form is submited we want to store the post to our database, that would submit a POST request to:
//* POST /posts
//
//* If we want to edit a post:
//* GET /posts/{id}/edit
//* This will submit a PATCH request
//* PATCH /posts/{id}
//* To delete a post
//* DELETE /posts/{id}

Route::post('/posts/{post}/comments', 'CommentsController@store');
										// When creating a new controller you can return to your "common action names"
//* When a controller starts getting bloated and/or start adding a lot of methods that are not one of the seven actions (create, show, store, delete, update...).  Start extracting controllers with more specific responsabilities.

Route::get('/register', 'RegistrationController@create'); //* php artisan make:controller RegistrationController
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionController@create'); //* php artisan make:controller SessionController
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');
