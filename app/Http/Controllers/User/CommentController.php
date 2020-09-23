<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Comment;
use App\Model\user\Post;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Reply as ReplyResource;
use App\Http\Resources\Comment as CommentResource;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post)
    {
        //return view
       
        $comments=Comment::where('post_id',$post)->orderBy('created_at','desc')->paginate(5);
       CommentResource::collection($comments);
        return response()->json(['comments'=>$comments]);
     //   return response()->json(['comments'=>$commentsraw['next_page_url']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post)
    {

        $post_id = $post;

        $formdata=array();
        parse_str($request->form_data, $formdata);

        if(Auth::check()){
            $input=[
                'comment'=>$formdata['comment'],
              ];
                $rules=[
                'comment'=>'required'
              ];
                $messages=[
                'comment.required'=>'OOPS No comments',
               
              ];
    
            $validator = Validator::make($input,$rules,$messages);
        
        if($validator->fails()){
            return response()->json(array(
                'success'=>false,
                'errormsgs'=> $validator->getMessageBag()->toArray()
              ),400);
        }
        $user =Auth::user();
        $post=Post::find($post_id);
        $comment= new Comment();
        $comment->comment = $formdata['comment'];
        $comment->user()->associate($user);
        $comment->post()->associate($post);
        $comment->save();
       // $comments= $post->comments->sortByDesc('created_at');
        return response()->json(['comment'=>$comment->comment,'username'=>$comment->user->name]);
    }
    else{
        return response()->json(array(
          'success'=>false,
          'errormsgs'=>'Please login to reply'
        ),401);
        }
       // dd($request);
        //The authenticated users can store their comment
       /* if (Auth::check()) {
            $this->validate($request, [
             'comment'=>'required',
            ]);
            $user =Auth::user();
            $post=Post::find($post_id);
            $comment= new Comment();
            $comment->comment = $request->comment;
            $comment->user()->associate($user);
            $comment->post()->associate($post);
            $comment->save();
            return redirect()->back();
            //return response()->json(['success',$post_id]);
        } else {    //others are redirected to login to Post comments
            return view('auth.login');
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
