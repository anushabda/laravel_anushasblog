<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_posts');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function replies()
    {
        return $this->hasMany('App\Model\user\Reply');
    }
    public function like()
    {
        return $this->hasMany(Like::class);
    }
}
