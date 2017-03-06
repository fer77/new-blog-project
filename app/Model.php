<?php

namespace App;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Model extends Eloquent
{
    //* We can enter the fields we are ok to be "mass" assigned.
    //* $fillable We accept "white list".
    //* $guarded the inverse of $fillabel.  Specify the fields we do not want to allow to be accepted. Setting this to an empty array will guard nothing:
    //protected $guarded = [];
    protected $guarded = [];
}
