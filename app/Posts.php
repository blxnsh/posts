<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  protected $fillable = ['title', 'body'];

  public function comments()
  {
    return $this->hasMany(Comment::class)->latest();
  }
}
