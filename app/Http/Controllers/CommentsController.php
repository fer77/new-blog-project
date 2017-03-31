<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;


class CommentsController extends Controller
{
    public function store(Post $post)
    {
      //* Add validation here:
      $this->validate(request(), ['body' => 'required|min:2']);
      $post->addComment(request('body'));
      return back();
      //* Long form:
      // public function store(Post $post) {
      		//* Add a comment to a post.
      // 	Comment::create([
      // 			'body' => request('body'),
      // 			'post_id' => $post->id
      // 		]);
      // 		return back();
      // }
    }
}
