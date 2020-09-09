<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\User;
use App\Model\user\Like;
use App\Model\user\Post;
use Session;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        //console.log(Auth::check());
        //  Session::get();

        if (Auth::check()) {
            $user=Auth::user();

            $post=Post::find($request->post_id);

            //  $like=$post->id;
            try {
                $like=Like::where('user_id', '=', $user->id)
                      ->where('post_id', '=', $post->id)
                      ->firstOrFail();

                switch ($like->like) {
                        case 0://disliked
                        if ($request->like=="true") {
                            $post->like+=1;
                            $post->dislike-=1;
                            $post->save();
                            $like->like=1;
                            $like->save();
                        } else {
                            $post->dislike=$post->dislike-1;
                            $post->save();
                            $like->delete();
                        }

                        break;
                        case 1://Already liked
                        if ($request->like=="true") {
                            $post->like-=1;
                            $post->save();
                            $like->delete();
                        } else {
                            $post->dislike+=1;
                            $post->like=$post->like-1;
                            $post->save();
                            $like->like=0;
                            $like->save();
                        }

                        break;
                      }
            } catch (ModelNotFoundException $e) {
                $like = new Like();
                $like->user()->associate($user);
                $like->post()->associate($post);
                $chstr=strcmp($request->like, "true");
                if ($chstr==0) {
                    $like->like=true; //like is true=1
                    $post->like+=1;
                } else {
                    $like->like=false; //dislike is false=0
                    $post->dislike+=1;
                }
                $post->save();
                $like->save();
                //  $result=['likecount'=>$post->like,'dislikecount'=>$post->dislike];
            }
            //return response()->json(['success'=>$like->id]);
            $result=['likecount'=>$post->like,'dislikecount'=>$post->dislike];
            return response()->json(['success'=>$result]);
        } else {
            abort(response()->json('Unauthorized', 401));
        }
        //return response()->json(['success'=>'Success']);
    }
}
