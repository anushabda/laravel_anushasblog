<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Model\user\Post;
use App\Model\user\Category;
use App\Model\user\Tag;
use Session;

//use App\Model\user\category_post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.post.view', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.post.post', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {//dd($request->publish);
        $category=Category::find($request->selectedCategory);
        $post =new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;

        $post->body = $request->postBody;
        $post->status=$request->publish;

        if ($request->hasFile('imageFile')) {
            $image=$request->file('imageFile');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->save($location);
            $post->image=$filename;
        }

        $category->posts()->save($post);
        Session::flash('success', "The blog post is successfully saved");
        $post->tags()->sync($request->selectedTags);
        /*$post1=post::find(1);
        $cat=$post1->category;
        dd($cat->name);//getting the category from post id
        $cat1=category::find(2);
        $po=$cat1->posts;
dd($po->first()->title);
//getting the posts from category
*/

        //return view('admin.post.post')->with('newPost',$post->title);
        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::where('id', $id)->first();
        $categories=Category::all();
        $tags=Tag::all();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        //dd($request->all());
        $category=Category::find($request->selectedCategory);
        $post =Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->postBody;
        if ($request->publish=='on') {
            $post->status=1;
        } else {
            $post->status=0;
        }
        if ($request->hasFile('imageFile')) {
           
           
            $image=$request->file('imageFile');
          
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->save($location);
            //get the old image from the database
            $oldfilename=$post->image;
            //Update the new image
            $post->image=$filename;
            //delete the old image
            File::delete(public_path('images/'.$oldfilename));
        }
        //update the new image

        $category->posts()->save($post);
        //return $request->selectedTags;
        $post->tags()->sync($request->selectedTags);
        //return $request->all();
        Session::flash('update', 'The post is edited and saved');

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        File::delete(public_path('images/'.$post->image));
        $post->tags()->detach();
        $post->delete();

        return redirect()->back();
    }
}
