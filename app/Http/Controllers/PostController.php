<?php

namespace App\Http\Controllers;

use App\Notifications\NewPost;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Post;
use App\Sub;
use Session;
use App\Category;
use Intervention\Image\ImageManagerStatic as Image;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use StreamLab\StreamLabProvider\Facades\StreamLabFacades;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();
        $posts = Post::orderBy('created_at','asc')->paginate(10);
        return view('admin.post.index',['posts'=>$posts]);
    }

    public function create()
    {
        $cats = Category::all();
        return view('admin.post.create',['cats'=>$cats]);
    }

    public function store(Request $request)
    {
        $this->Validate($request,[
            'title' => 'required|min:20|max:200|unique:posts',
            'body' => 'required|min:50',
            'image1' => 'required|mimes:jpeg,bmp,png,jpg',
            'image2' => 'mimes:jpeg,bmp,png,jpg',
            'image3' => 'mimes:jpeg,bmp,png,jpg',
            'video' => 'mimetypes:video/mp4,video/ogg,video/quicktime',
            'slug' => 'required|alpha_dash|min:5|max:255'
            ]);
        $posts = new Post();
        $posts->title = $request['title'];
        $posts->body = $request['body'];
        $posts->slug = $request['slug'];
        if($request->hasFile('image1'))
        {
            $image1 = $request->file('image1');
            $filename = time() . '.' .$image1->getClientOriginalExtension();
            $location = public_path('/images/post/'.$filename);
            Image::make($image1)->resize(400,400)->save($location);
            Image::make($image1)->save($location);
            $posts->image1 = $filename;
        }
        if($request->hasFile('image2'))
        {
            $image2 = $request->file('image2');
            $filename = time() . '.' .$image2->getClientOriginalExtension();
            $location = public_path('/images/post/'.$filename);
            Image::make($image2)->resize(400,400)->save($location);
            Image::make($image2)->save($location);
            $posts->image2 = $filename;
        }
        if($request->hasFile('image1'))
        {
            $image3 = $request->file('image');
            $filename = time() . '.' .$image3->getClientOriginalExtension();
            $location = public_path('/images/post/'.$filename);
            Image::make($image3)->resize(400,400)->save($location);
            Image::make($image3)->save($location);
            $posts->image3 = $filename;
        }

        if($request->hasFile('video'))
        {
            $file = $request->file('video');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $location = $file->storeAs('public/video/',$filename);
            $posts->video = $filename;
            $posts->save();
        }
        $posts->category_id = $request->category_id;
        $posts->user_id = Auth::id();
        if($posts->save()){
            $user = User::all();
            Notification::send($user, new NewPost($posts));
        }
        $posts->save();
        Session::flash('success','Post Add');
        return redirect()->back();
    }

    public function edit($id)
    {
        $cats = Category::all();
        $posts = Post::find($id);
        return view('admin.post.edit',compact('cats'))->withPosts($posts);
    }

    public function update(Request $request, $id)
    {
        $this->Validate($request,[
            'title' => 'required|min:20|max:200|unique:posts',
            'body' => 'required|min:50',
            'image1' => 'required|mimes:jpeg,bmp,png,jpg',
            'image2' => 'mimes:jpeg,bmp,png,jpg',
            'image2' => 'mimes:jpeg,bmp,png,jpg',
            'video' => 'mimetypes:video',
            'slug' => 'required|alpha_dash|min:5|max:255'
            ]);

        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->slug = $request->slug;
        if($request->hasFile('image1'))
        {
            $image1 = $request->file('image1');
            $filename = time() . '.' .$image1->getClientOriginalExtension();
            $location = public_path('/images/post/'.$filename);
            Image::make($image1)->resize(400,400)->save($location);
            Image::make($image1)->save($location);
            $posts->image1 = $filename;
        }
        if($request->hasFile('image2'))
        {
            $image2 = $request->file('image2');
            $filename = time() . '.' .$image2->getClientOriginalExtension();
            $location = public_path('/images/post/'.$filename);
            Image::make($image2)->resize(400,400)->save($location);
            Image::make($image2)->save($location);
            $posts->image2 = $filename;

        }
        if($request->hasFile('image3'))
        {
            $image3 = $request->file('image3');
            $filename = time() . '.' .$image3->getClientOriginalExtension();
            $location = public_path('/images/post/'.$filename);
            Image::make($image3)->resize(400,400)->save($location);
            Image::make($image3)->save($location);
            $posts->image3 = $filename;

        }

        if($request->hasFile('video'))
        {
            $file = $request->file('video');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $location = $file->storeAs('public/video/',$filename);
            $posts->video = $filename;
            $posts->save();
        }
        $posts->category_id = $request->category_id;
        $posts->user_id = Auth::id();
        $posts->save();
        Session::flash('success','Posts Update');
        return redirect()->back();

    }

    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        Session::flash('success','Posts Deleted');
        return redirect()->back();
        //dd($id);
    }

    public function active($id)
    {
        $posts = Post::find($id);   
        $posts->active = 1;
        $posts->save();
        Session::flash('success','Post Active');
        return redirect()->back();
    }

    public function noActive($id)
    {
        $posts = Post::find($id);
        $posts->active = 0;
        $posts->save();
        Session::flash('success','Post No Active');
        return redirect()->back();
    }

     public function getSlider($id)
    {
        $posts = Post::find($id);   
        $posts->slider = 1;
        $posts->save();
        Session::flash('success','Slider Active');
        return redirect()->back();
    }

    public function noSlider($id)
    {
        $posts = Post::find($id);   
        $posts->slider = 0;
        $posts->save();
        Session::flash('success','Slider Not Active');
        return redirect()->back();
    }

   public function notSend($id)
   {
        $posts = Post::find($id);
        $user = Sub::all();
        if(count($user)){
            foreach ($user as $user) {
                Notification::send($user, new NewPost($posts));
            }
        }
   }

}
