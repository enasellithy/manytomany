<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;
use Session;
use DB;
use Response;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::all();
        return view('admin.vote.index',compact('polls'));
    }

    public function store(Request $request)
    {
    /*  $this->validate($request, [
            'title' => 'required|min:5',
            'answer' => 'required|array',
            'answer.*' => 'string|num:3'
        ]);*/

        $polls = new Poll();
        $polls->title = $request['title'];
        $answers = [];
        foreach ($request['answer'] as $value) {
            $answers []= json_encode([$value => '0']);
        }
        $polls->answer = json_encode($answers);
        $polls->save();
        Session::flash('success','Post Add');
        return redirect()->back();
    }

    public function show($id)
    {
        $polls = Poll::find($id);
        $answers = json_decode($polls->answer);
        $length = count($polls);
        return view('pollshow')->withPolls($polls);
        //json_decode('answer');
    }

    public function saveVote(Request $request,$id)
    {
        $polls = Poll::find($id);
        $answer = [];
        foreach ($request['answer'] as $value) {
            $answers []= json_encode([$value => '0']);
        }
        //$answer = $polls->increment('ends_pt');
        //$polls->update(['ends_pt' => 1]);
        /*$polls->ends_pt = $answer->ends_pt + 1;
        /*$updatePost->likes = $getPost->likes + 1;
        $polls->answer = json_encode($answers);
        $polls = $request->ends_pt + 1;
        //dd($request->all());*/
        $polls->answer = json_encode($answers);
        $answers = Poll::increment('count');
        //dd($request->all());
        /*if($polls->save()) {
        return Response::json(array('count' => true), 200);
    }*/
        $polls->save();
        return redirect()->back();
    }
}
