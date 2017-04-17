<?php

namespace App;

use Carbon\Carbon;

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
  //* Create a query scope
  public function scopeFilter($query, $filters)
  {
    if ($month = $filters['month']) {
      $query->whereMonth('created_at', Carbon::parse($month)->month); //* convert March => 3, May => 5...we can use Carbon.
    }
    if ($year = $filters['year']) {
      $query->whereYear('created_at', $year);
    }
  }
  public static function archives()
  {
    return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
    ->groupBy('year', 'month')
    ->orderByRaw('min(created_at) desc')
    ->get()
    ->toArray();
  }
  public function tags() {
    // Any post may have many tags.
    // Any tag may be applied to many posts.
    return $this->belongsToMany(Tag::class);
  }
}
