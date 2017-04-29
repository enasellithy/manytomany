@extends('layouts.app')
@section('title')
<?php
$titleTag = htmlspecialchars($posts->title);
?>
{{$posts->title}}
@endsection
@section('content')
@include('titlenews')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <!-- Post Content -->
                <article>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                                <p>{{$posts->body}}</p>
<!--Start Slider-->
    <section id="slider">
        <h4>Slider News</h4>
        {{$posts->title}}
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
          </div>

         
    </section>
    <!--End Slider-->
                                <h2 class="section-heading">{{$posts->title}}</h2></a>
                                <hr>
                                <span>
                                  URL:: <a href="{{url('blog/'.$posts->slug)}}">{{url($posts->slug)}}</a>
                                </span>
                                <hr>
                                <span class="caption text-muted">
                                    <a href="{{url('user/'.$posts->id.'/show')}}">
                    {{App\User::find($posts->user_id)->name}}
                    </a>
                                    <a href="{{url('cat/'.$posts->id.'/show')}}">
                        {{App\Category::find($posts->category_id)->name}}
                    </a></p>
                            </div>
                        </div>
                    </div>
                </article>

                <hr>
                <!-- Start Comment-->
                <div class="col-lg-7 col-lg-offset-5 col-md-7 col-md-offset-5">
                    <ul class="list-unstyled">
                        @foreach($posts->comments as $comment) 
                        <li>
                          <div>{{$comment->comment}}</div>
                          <span class="pull-right">{{App\User::find($comment->user_id)->name}}</span>
                          <span>{{date('M j, Y H:ia',strtotime($comment->created_at))}}</span>
                          <hr>-                         
                         @if(Auth::user() == $comment->user)
                          <div class="pull-right">
                            <a class="" href="{{url('comment.destroy')}}/{{$comment->id}}">
                              Delete
                            </a>
                          </div>
                          @endif
                        </li>
                        
                        @endforeach
                    </ul>
                    <hr>
                    <form class="form-horizontal"  
                  action="{{url('comment.store')}}/{{$posts->id}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="col-sm-10"> 
                      <input type="text" name="name" class="form-control" placeholder="Type Your Email Or Your Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10"> 
                      <textarea class="form-control" name="comment" id="comment" rows="5" placeholder="Type Your Comment">
                      </textarea>
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Add Comment</button>
                    </div>
                  </div>
                  <input type="hidden" value="{{Session::token()}}" name="_token">
                </form>
                </div>
                <!--End Comment-->
            </div>
        </div>
    </div>


   @endsection