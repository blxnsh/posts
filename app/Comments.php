<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
  protected $fillable = ['posts_id', 'name', 'email', 'body'];

  public function post()
    {
      return $this->belongsTo(Post::class);
    }

}
