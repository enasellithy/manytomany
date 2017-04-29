@extends('admin.layouts.app')

@section('title')
Media
@endsection
@section('content')

<div class="row">
@foreach($posts as $post)
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            
                        </div>
                        <div>{{$post->title}}</div>
                        <div>By: {{App\User::find($post->user_id)->name}}</div>
                    </div>
                </div>
            </div>
                 <a href="manager/{{$post->id}}/media">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
        </div>
    </div>
    @endforeach
{!! $posts->links() !!}
</div>
@endsection
