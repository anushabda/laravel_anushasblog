<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
    public function post()
    {
        return $this->belongsTo('App\Model\user\Post');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
