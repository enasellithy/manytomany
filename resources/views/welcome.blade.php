@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')
@include('titlenews')
<!-- Main Content -->
<nav>
  @foreach($menus as $menu)
  <div>
    <ul>
      <li>{{$menu->name}}</li>
    </ul>
  </div>
  @endforeach
</nav>
@foreach($polls as $poll)
<a href="poll/{{$poll->id}}/show">Go To Vote</a>
@endforeach
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach($posts as $post)
                <div class="post-preview">
                    <a href="post/{{$post->id}}/show">
                        <h2 class="post-title">
                            {{$post->titel}}
                        </h2>
                    </a>
<h2>
    <a href="post/{{$post->id}}/show">{{$post->title}}</a>
</h2>
                    <p>
                        {{substr($post->body, 0, 25)}}
                        {{strlen($post->body) > 200 ? "...":""}}
                    </p>
                    <h4>
                    <p class="post-meta">Author 
                        <a href="user/{{$post->id}}/show">
                    {{App\User::find($post->user_id)->name}}
                    </a> 
                    </h4>
                        {{date('M j, Y ',strtotime($post->created_at))}}
                    </p>
                    <a href="post/{{$post->id}}/post">Read Post Only</a>
                    <a href="image/{{$post->id}}/post">Photo Only</a>
                    <a href="video/{{$post->id}}/show">Video Only</a>
                </div>
                <hr>
                @endforeach

                <!-- Pager -->
                <div class="pager text-center">
                    
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!--Start Slider-->
    <section id="slider">
        <h4>Slider News</h4>
    @foreach($posts as $ost)
        @if($post->slider == 1)
        <div id="{{$post->id}}" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#{{$post->id}}" data-slide-to="0" class="active"></li>
    <li data-target="#{{$post->id}}" data-slide-to="1"></li>
    <li data-target="#{{$post->id}}" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="{{url('public/images/post/'.$post->image1)}}" alt="{{$post->title}}">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#{{$post->id}}" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#{{$post->id}}" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 @endif
@endforeach
    </section>
    <!--End Slider-->
    <h1>Subscribe</h1>
<form class="form-horizontal"  
                  action="{{url('mail/sent')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
    <div class="col-md-6">
          <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
    </div>
    <div class="col-md-6">
        <button type="submit" class="btn btn-success">Subscribe</button>
    </div>    
    <input type="hidden" value="{{Session::token()}}" name="_token">
    </form>
   @endsection