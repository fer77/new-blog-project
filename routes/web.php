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

//* Our first controllers:
                      //* Name of the controller and the method (@index) responsible for the URI (/tasks).
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');
                    //* This "wild card" is the $id being passed to our show() method.  It can be passed as $id or further simplified as (Task $task).

Route::get('/', function () {
  $name = 'Bob';
  $tasks = DB::table('tasks')->get();

    return view('welcome', compact('name', 'tasks'));
});
