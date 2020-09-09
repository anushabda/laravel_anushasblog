<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function posts()
  {
      return $this->belongsToMany(Post::class,'tag_posts');
  }
  public function getRouteKeyName(){
    return 'slug';
  }
}