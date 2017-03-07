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
    {                             //* Same as saying App\Comment
      return $this->hasMany(Comment::class);
    }
}
