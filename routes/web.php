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

Route::get('/', function () {
  $name = 'Bob';
  $tasks = [
    'Open store',
    'Name for burger of the day',
    'Clean the grill',
    'Close the restaurant'
  ];

    return view('welcome', compact('name', 'tasks'));
});
