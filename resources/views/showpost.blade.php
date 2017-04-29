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
                   <p>{{$posts->body}}</p>
                   <span class="caption text-muted">
                    <a href="{{url('user/'.$posts->id.'/show')}}">
                    {{App\User::find($posts->user_id)->name}}
                   </a>
                   <a href="{{url('image/'.$posts->id.'/post')}}">Photo Only</a>
                   <a href="{{url('video/'.$posts->id.'/show')}}">Video Only</a>
                </div>
        </div>
    </div>
</div>
@endsection
