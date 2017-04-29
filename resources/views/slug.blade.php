@extends('layouts.app')

@section('content')
@include('titlenews')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{url('post/'.$post->id.'/post')}}"><h1>{{$post->title}}</h1></a>
                </div>

                <div class="panel-body">
                    <h1
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
