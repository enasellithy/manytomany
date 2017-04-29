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
                   <img class="img-responsive" 
                        src="{{url('public/images/post/'.$posts->image1)}}" 
                        class="img-responsive"
                        alt="blog"
                        title="blog" />
                        <img class="img-responsive" 
                        src="{{url('public/images/post/'.$posts->image2)}}" 
                        class="img-responsive"
                        alt="blog"
                        title="blog" />
                        <img class="img-responsive" 
                        src="{{url('public/images/post/'.$posts->image3)}}" 
                        class="img-responsive"
                        alt="blog"
                        title="blog" />
                   <span class="caption text-muted">
                    <a href="{{url('user/'.$posts->id.'/show')}}">
                    {{App\User::find($posts->user_id)->name}}
                    </a>
                </div>
        </div>
    </div>
</div>
@endsection
