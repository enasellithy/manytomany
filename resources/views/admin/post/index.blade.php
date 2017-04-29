@extends('admin.layouts.app')

@section('title')
Post
@endsection
@section('content')
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
<div class="row">
    <div class="col-xs-3">
        <a href="{{route('post.create')}}" class="btn btn-default">Create New Post</a>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">Posts</div>
                        <div class="count">{{$posts->count()}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <table class="table table-hover table-bordered">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>By</th>
                            <th>Control</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                          <tr>
                            <td>{{$post->id}}</td>
                            <td>{{substr($post->title, 0, 25)}}</td>
                            <td>{{App\User::find($post->user_id)->name}}</td>
                            <td>
                                <a href="post/{{$post->id}}/edit" class="btn btn-info">Edit</a>
                                @if($post->active == 0)
                                <a href="post/{{$post->id}}/active" class="btn btn-success">Active</a>
                                @else
                                <a href="post/{{$post->id}}/noactive" class="btn btn-success">No Active</a>
                                @endif
                                @if($post->slider == 0)
                                <a href="post/{{$post->id}}/slider" class="btn btn-success">Slider</a>
                                @else
                                <a href="post/{{$post->id}}/noslider" class="btn btn-success">No Slider</a>
                                @endif
                                <a href="post/{{$post->id}}/notsend" class="btn btn-info">Send</a>
                                <a href="post/{{$post->id}}/delete" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
</div>
<div class="col-lg-6 col-md-6 text-center">
            {!! $posts->links() !!}
        </div>
@endsection
