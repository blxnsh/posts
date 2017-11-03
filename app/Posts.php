<?php

namespace App;

use App\Comments;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  protected $fillable = ['title', 'body'];

  public function comments()
  {
    return $this->hasMany(Comments::class)->latest();
  }
}
