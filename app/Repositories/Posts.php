<?php

namespace App\Repositories;

use App\Post;
use App\Redis;

//* We took our eloquent query(PostsController), extracted it to another class and gave it its own name.
class Posts
{
  protected $redis;
  public function __construct(Redis $redis)
  {
    $this->redis = $redis;
  }
  public function all()
  {
    // return all posts
    return Post::all();
  }
}

 ?>
