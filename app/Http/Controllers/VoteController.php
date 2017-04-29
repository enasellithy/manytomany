<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;
use App\PollOption;
use Session;

class VoteController extends Controller
{
  
    public function index()
    {
        $polls = Poll::orderBy('created_at','asc')->paginate(10);
        return view('admin.vote.index',compact('polls'));
    }

    public function store(Request $request)
    {
        $this->Validate($request,[
            'name' => 'required|min:5'
            ]);
        $polls = new Poll();
        $polls->name = $request['name'];
        $polls->save();
        Session::flash('success','Poll Add');
        return redirect()->back();
    }

    public function delete($id)
    {
        $polls = Poll::find($id);
        $polls->delete();
        $polls->save();
        Session::flash('success','Poll Delete');
        return redirect()->back();
    }
    
}
