<?php

namespace App;

class Post extends Model
{
    //* All this moved to our app/Model.php
    //* We can enter the fields we are ok to be "mass" assigned.
    //* $fillable We accept "white list".
    //* $guarded the inverse of $fillabel.  Specify the fields we do not want to allow to be accepted. Setting this to an empty array will guard nothing:
    //protected $guarded = [];
    //protected $fillable = ['title', 'body'];
  public function comments()
      {                       //* Same as saying App\Comment
        return $this->hasMany(Comment::class);
      }

public function user() //* $post->user or $comment->post->user
      {
        return $this->belongsTo(User::class);
      }

  public function addComment($body)
  {
    //* $this->comments() //returns all comments
    //* $this->comments()-create() //fires a method and ads an id to the post, because of the relationship setup here.
    $this->comments()->create(compact('body'));
    //* Long form
    // Comment::create([
    //   'body' => $body,
    //   'post_id' => $this->id;
    // ]);
  }
}
