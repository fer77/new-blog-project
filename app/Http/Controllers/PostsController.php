<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() //* This is called a controller action.
    {
      return view('posts.index'); //* The name here will correspond to the controller action.
    }

    public function show()
    {
      return view('posts.show');
    }
}
