<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
      //* Everything here is equivelent to what is stored inside our Routes.
      //* Query builder:
      //$tasks = DB::table('tasks')->latest()->get();

      //* Eloquent:
      $tasks = Task::all();
              //* Don't forget to import Task (use App\...)

        return view('tasks.index', compact('tasks'));
    }
    public function show(Task $task)
    {
      //* Query builder:
      //$task = DB::table('tasks')->find($id);

      //* Eloquent:
      //$task = Task::find($id);

      //return $task;

      return view('tasks.show', compact('task'));
    }
}
