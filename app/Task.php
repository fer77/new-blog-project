<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  //* Query scope.
    public function scopeIncomplete($query) //* Pre-fixed with 'scope' Laravel will know to treat it as such.
    {
      return $query->where('completed', 0);
    }
}
