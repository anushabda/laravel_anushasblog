<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use App\Model\user\Category;
use App\Model\user\Post;
use App\Model\user\Tag;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    public function __construct()
    {
        //    $this->middleware('auth');
    }

    public function homelogin()
    {
        $this->middleware('auth');
        $posts =Post::where('status', 1)->paginate(2);
        $categories=Category::all();
        $tags=Tag::all();
        return view('user.home', compact('posts', 'categories', 'tags'));
    }
    public function search(Request $request)
    {
        if ($request->searchid==null) {
            if (Auth::user()) {
                //return \Redirect::route('home');
                return $this->homelogin();
            } else {
                return \Redirect::route('welcome');
            }
        } else {
            $post=Post::find($request->searchid);
            return view('user/post', compact('post', $post));
        }
    }
    public function searchlive(Request $request)
    {
        try {
            $searchtext=$request->input('text');
            $posts=Post::query()->where('title', 'LIKE', "%{$searchtext}%")
            ->where('status', 1)->get();
            if (count($posts)==0) {
                throw new ModelNotFoundException;
            }
            $x=0;
            foreach ($posts as $post) {
                $titles[$x]=$post->title;
                $ids[$x]=$post->id;
                $x++;
            }
            $result=['titles'=>$titles,'ids'=>$ids];
            return response()->json($result);
        } catch (ModelNotFoundException $e) {
            return response()->json('No Suggestions', 404);

            //abort(response()->json('No suggestions', 404));
        }
    }
    public function categoryPosts(Category $category)
    {
        //Session::unset();
        $posts = Post::where([['category_id','=',$category->id],['status','=',1]])->orderby('created_at', 'DESC')->paginate(2);
        Session::put('cat', $category->name);
        Session::flash('categoryPosts', 'List of Posts in the category');
        $tags=Tag::all();
        $categories=Category::all();

        return view('user/home', compact('posts', 'tags', 'categories'));
    }

    public function tagPosts(Tag $tag)
    {
        Session::forget(['categoryPosts','cat']);
        $posts= $tag->posts()->where(function (Builder $query) {
            return $query->where('status', 1);
        })->orderby('created_at', 'DESC')->paginate(2);

        Session::put('tagg', $tag->name);
        Session::flash('tagPosts', 'List of Posts in the tag');

        $tags=Tag::all();
        $categories= Category::all();

        return view('user/home', compact('posts', 'tags', 'categories'));
    }
}
