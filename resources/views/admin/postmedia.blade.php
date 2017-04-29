@extends('admin.layouts.app')

@section('title')
Media
@endsection
@section('content')

<div class="row">
 @if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
@if(count($errors) > 0)
 <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
 </div>
@endif
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               {{$posts->title}}
            </div>
            <div class="panel-body">
                <div class="col-md-4">
                <a href="{{url('manager/'.$posts->id.'/media/delete')}}" class="btn btn-danger">
                     <img class="img-responsive" 
                          src="{{url('public/images/post/'.$posts->image1)}}" 
                          class="img-responsive"
                          alt="blog"
                          title="blog" />
                          
                    </a>
                    <video width="320" height="240" controls>
                    <source src="{{url('public/video/'.$posts->video)}}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
