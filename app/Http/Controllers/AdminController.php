<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use Auth;
use App\Menu;
use Session;
use DB;

class AdminController extends Controller
{
    public function index()
    {
    	$posts = Post::get();
    	$comments = Comment::get();
    	$cats = Category::all();
    	return view('admin.index',
    		['posts'=>$posts,'comments'=>$comments,'cats'=>$cats]);
    }



    public function getMenu()
    {
        $menus = Menu::orderBy('created_at','desc')->paginate(10);
        return view('admin.menu.index',compact('menus'));
    }

    public function createMenu(Request $request)
    {
        $this->Validate($request,[
            'name' => 'required|min:5|unique:menus',
            ]);
        $menus = new Menu();
        $menus->name = $request['name'];
        $menus->save();
        Session::flash('success','Menu Created');
        return redirect()->back();
    }

    public function editMenu($id)
    {
        $cats = Category::all();
        $menus = Menu::find($id);
        return view('admin.menu.edit',compact('cats'))->withMenus($menus);
    }

    public function deleteMenu($id)
    {
        $menus = Menu::find($id);
        $menus->delete();
        Session::flash('success','Menu Delete');
        return redirect()->back();
    }
}
