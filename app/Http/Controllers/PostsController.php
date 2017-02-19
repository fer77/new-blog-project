<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

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
    	
    	//* This simplifies the above and automatically saves it:
    	POST::create([
    		'title' => request('title'),
    		'body' => request('body')
    		]); //* This will throw an error if we do not specify these fields.  Set them in our Post.php

    	//* And redirect somehere in the app (i.e. homepage)
    	return redirect('/');
    	//* 'php artisan tinker' and 'App\Post::all();' To test what will be post to the database.
    }
}
