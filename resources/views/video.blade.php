@extends('layouts.app')

@section('content')
@include('titlenews')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$posts->title}} Created At
                {{$posts->created_at}}</div>
                <div class="panel-body">
                   <video width="320" height="240" controls>
                    <source src="{{url('public/video/'.$posts->video)}}" type="video/mp4">
                    </video>
                   <span class="caption text-muted">
                    <a href="{{url('user/'.$posts->id.'/show')}}">
                    {{App\User::find($posts->user_id)->name}}
                   </a>
                </div>
        </div>
    </div>
</div>
@endsection
