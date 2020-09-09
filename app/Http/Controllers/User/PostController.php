<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Post;
use App\Model\user\Reply;

class PostController extends Controller
{/*
  public function index(){
      return view('user/post');
  }*/
    public function post(Post $post)
    {
        //$post=Post::find('slug',$slug)->first();
        if ($post->status==1) {
            $replies=Reply::where('comment_id', $post->comment_id)->get();
            return view('user/post', compact('post', 'replies'));
        } else {
            return "post not found";
        }
    }
}
