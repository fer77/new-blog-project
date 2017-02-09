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

use App\Task;

Route::get('/', function () {
  $name = 'Bob';
  $tasks = DB::table('tasks')->get();

    return view('welcome', compact('name', 'tasks'));
});

Route::get('/tasks', function () {
  //* Query builder:
  //$tasks = DB::table('tasks')->latest()->get();

  //* Eloquent:
  $tasks = Task::all();

    return view('tasks.index', compact('tasks'));
});

Route::get('/tasks/{task}', function ($id) {
  //* Query builder:
  //$task = DB::table('tasks')->find($id);

  //* Eloquent:
  $task = Task::find($id);

  return view('tasks.show', compact('task'));
});
