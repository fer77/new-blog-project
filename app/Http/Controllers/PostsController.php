<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show']);
  }
    public function index(Posts $posts) //* This is called a controller action.
    {
      // dd($posts);
      $posts = $posts->all();
      //* When things start to get crowded or gross refactor:
      // $posts = Post::latest()
      // ->filter(request(['month', 'year']))
      // ->get();

        //* You can order "posts by..." here:
        //* Populate our blog with our blogs.
        // $posts = Post::latest();
        //
        // if ($month = request('month')) {
        //   $posts->whereMonth('created_at', Carbon::parse($month)->month); //* convert March => 3, May => 5...we can use Carbon.
        // }
        // if ($year = request('year')) {
        //   $posts->whereYear('created_at', $year);
        // }
        // $posts = $posts->get();

        return view('posts.index', compact('posts')); //* The name here will correspond to the controller action.
    }
                            //* Wildcard from web.php
public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

public function create()
    {
      return view('posts.create');
    }

public function store()
    {
    //dd(request()->all());
    //* or
    //dd(request('title'));
    //* or the ('body')
    //dd(request(['title', 'body']));
    //* Once we know we are getting what we need we can:

    	//* A new post will be created here using the request data
    	//$post = new Post;

		//* We set these fields equal to what the user typed in:
    	//$post->title = request('title');

    	//$post->body = request('body');

    	//* Save it to the database
    	//$post->save();

        //* Before we create a post we want to validate the data:
         $this->validate(request(), [
            //* Validation requirements:
            'title' => 'required',
            'body' => 'required'
            ]);

            auth()->user()->publish(new Post(request(['title', 'body'])));
            session()->flash('message', 'Post successful.');

    	//* This simplifies the above and automatically saves it:
    	// POST::create([
      //     'title' => request('title'),
      //     'body' => request('body'),
      //     'user_id' => auth()->id()
      //   ]); //* This will throw an error if we do not specify these fields.  Set them in our Post.php

    	//* And redirect somehere in the app (i.e. homepage)
    	return redirect('/');
    	//* 'php artisan tinker' and 'App\Post::all();' To test what will be post to the database.
    }
}
