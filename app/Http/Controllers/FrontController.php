<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use Auth;
use App\Post;
use App\Category;
use App\Sub;
use App\Poll;
use App\Menu;
use Session;
use DB;

class FrontController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('created_at','desc')->paginate(10);
        $value = DB::table('posts')
                     ->select('title')
                     ->where('active', '=', 1)
                     ->groupBy('title')
                     ->limit(10)
                     ->get();
        $slider = DB::table('posts')
                     ->select('image1')
                     ->where('slider', '=', 1)
                     ->groupBy('image1')
                     ->limit(10)
                     ->get();
        $polls = Poll::all();
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        $posts = Post::all();
        return view('welcome',compact('posts','value','slider','polls','menus'));
    }

    public function show($id)
    {
        $value = DB::table('posts')
                     ->select('title')
                     ->where('active', '=', 1)
                     ->groupBy('title')
                     ->limit(10)
                     ->get();
        $comments = Comment::all();
        $posts = Post::find($id);
        return view('show',['comments'=>$comments,'value'=>$value])->withPosts($posts);
    }

    public function showCat($id)
    {
        $value = DB::table('posts')
                     ->select('title')
                     ->where('active', '=', 1)
                     ->groupBy('title')
                     ->limit(10)
                     ->get();
        $cats = Category::find($id);
        //dd($cats->posts);
        return view('catshow',['value'=>$value])->withCats($cats);
    }

    public function showUser($id)
    {    
        $value = DB::table('posts')
                     ->select('title')
                     ->where('active', '=', 1)
                     ->groupBy('title')
                     ->limit(10)
                     ->get();
        $users = User::find($id);
        return view('usershow',['value'=>$value])->withUsers($users);
    }

    public function getPost($id)
    {
        $value = DB::table('posts')
                     ->select('title')
                     ->where('active', '=', 1)
                     ->groupBy('title')
                     ->limit(10)
                     ->get();
        $posts = Post::find($id);
        return view('showpost',['value'=>$value])->withPosts($posts);
    }

    public function getImage($id)
    {
        $value = DB::table('posts')
                     ->select('title')
                     ->where('active', '=', 1)
                     ->groupBy('title')
                     ->limit(10)
                     ->get();
        $posts = Post::find($id);
        return view('photo',['value'=>$value])->withPosts($posts);
    }

    public function getVideo($id)
    {
        $value = DB::table('posts')
                     ->select('title')
                     ->where('active', '=', 1)
                     ->groupBy('title')
                     ->limit(10)
                     ->get();
        $posts = Post::find($id);
        return view('video',['value'=>$value])->withPosts($posts);
    }

    public function newsFast()
    {
       //$posts = DB::table('posts')->where('active',1)->select('title')->get();
       //$posts = Post::paginate(1);
        /*foreach ($posts as $post) {
            echo $post->title();
        }*/
        /*$value = DB::table('posts')->session()->get('active', 1);
        $value = $request->session()->get('active', function () {
            return $value;
        });*/
        $value = DB::table('posts')
                ->where('active', 1)
                ->avg('title');
        return view('titlenews',['value'=>$value]);
    }

    public function subMail(Request $request)
    {
        $this->Validate($request,[
            'email' => 'required|email|max:255|unique:users'
            ]);
        $sub = new Sub();
        $sub->email = $request['email'];
        $sub->save();
        Session::flash('success','Mail Sent');
        return redirect()->back();
    }

    public function getSingle($slug)
    {
        $value = DB::table('posts')
                ->where('active', 1)
                ->avg('title');
        $post = Post::where('slug','=', $slug)->first();
        return view('slug',['value'=>$value])->withPost($post);
    }

    public function saveVote(Request $request)
    {
        $votes = new Vote();
        if($request->input('vote1'))
        {
            $votes->count = 1;
            $votes->save();
        }
        $votes->save();
        return redirect()->back();
    }
    
}
