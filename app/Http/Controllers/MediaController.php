<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Session;
use DB;
use App\Category;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class MediaController extends Controller
{
    public function getManager()
    {
        //$posts = Post::orderBy('created_at','desc')->limit(10)->get();
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        //return view('admin.media',compact('posts'))->withPosts($posts);
        return view('admin.media',['posts'=>$posts]);
    }

    public function getManagerMedia($id)
    {
        $posts = Post::find($id);
        return view('admin.postmedia')->withPosts($posts);
    }

    public function destroyPhoto(Request $request, $id)
    {
    	$posts = Post::find($id);
        //File::delete('public/images/post','1493297582.PNG');
        
        if($request->hasFile('image1'))
        {
            $image1 = $request->file('image1');
            $name = time() . '-' . $image1->getClientOriginalName();
            $image1 = $image1->delete(public_path() . '/images/post/', $name);
            File::delete('public/images/post/'.$name);
            $posts->image1 = $name;
            $posts->save();
        }
        $posts->save();
        Session::flash('success','Photo Delete');
        return redirect()->back();
    }

    public function updatePhoto(Request $request, $id)
    {
        $cats = Category::all();
        $posts = Post::find($id);
        return view('admin.post.edit',['cats'=>$cats])->withPosts($posts);
    }
}
