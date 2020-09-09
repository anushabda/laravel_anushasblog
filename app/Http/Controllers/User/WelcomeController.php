<?php


namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use App\Model\user\Category;
use App\Model\user\Post;
use App\Model\user\Tag;
use Session;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts =Post::where('status', 1)->withCount('comments')->paginate(2);
        $categories=Category::all();
        $tags=Tag::all();
        return view('user/home', compact('posts', 'categories', 'tags'));
    }
    public function about()
    {
        return view('user/about');
    }
}
