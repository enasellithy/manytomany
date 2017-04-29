@extends('layouts.app')
@section('content')
@include('titlenews')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$cats->name}}</div>
                <div class="panel-body">
                    @foreach($cats->posts as $post)
                    <div>
                        <a href="{{url('post/'.$post->id.'/show')}}"><h1>{{$post->title}}</h1></a>
                        <p>
                        {{substr($post->body, 0, 25)}}
                        {{strlen($post->body) > 200 ? "...":""}}
                        <img class="img-responsive" 
                                        src="{{url('public/images/post'.$post->image1)}}" 
                                        class="img-responsive"
                                        alt="blog"
                                        title="blog" />
                        </p>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>
@endsection
