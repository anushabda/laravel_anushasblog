<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Comment;
use App\User;
use App\Model\user\Post;
use App\Model\user\Reply;

class ReplyController extends Controller
{
    public function reply(Request $request)
    {
     
     
        $formdata=array();
        parse_str($request->form_data, $formdata);
     

        if (Auth::check()) {

          //Proceed only if reply is not blank
          $input=[
            'replytext'=>$formdata['replytext'],
          ];
            $rules=[
            'replytext'=>'required'
          ];
            $messages=[
            'replytext'=>'No comments given',
          ];

          $validator = Validator::make($input, $rules, $messages);
   
            if ($validator->fails()) {
                return response()->json(['success'=>'No comments typed']);
            }
          
            $user =Auth::user();
            $post=Post::find($formdata['post_id']);
            $reply=new Reply();
            $comment=Comment::find($formdata['comment_id']);
            $reply->replytext = $formdata['replytext'];
            $reply->user()->associate($user);
            $reply->post()->associate($post);
            $reply->comment()->associate($comment);

            $reply->save();
            return response()->json(['success'=>'Your reply is saved']);
            
        }
      
    }
  
}