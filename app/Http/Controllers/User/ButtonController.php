<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Post;

class ButtonController extends Controller
{
    public function like(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        $post->like = $post->like+1;
        $post->save();
        return redirect()->back();
    }
    public function dislike(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        $post->dislike = $post->dislike+1;
        $post->save();
        return redirect()->back();
    }
    public function testlike(Request $request)
    {
        return response()->json(['success'=>$request->post_id]);
    }
}
