@extends('admin.layouts.app')

@section('title')
Edit {{$posts->title}}
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
        <form class="form-horizontal"  
                  action="{{url('post/'.$posts->id.'/update')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
      <div class="form-group">
        <label class="control-label col-sm-2" for="title">Title</label>
        <div class="col-sm-10">
          <input type="text" name="title" value="{{$posts->title}}" class="form-control" id="title" placeholder="Enter Title">
        </div>
        <br /><br /><br />
        <div class="form-group">
        <label class="control-label col-sm-2" for="body">Text</label>
        <div class="col-sm-10">
          <textarea  name="body" class="form-control" id="body" col="5" rows="3">
            {{$posts->body}}
          </textarea>
        </div>
        <br /><br /><br />
        <div class="form-group">
        <label class="control-label col-sm-2" for="image1">Image</label>
        <div class="col-sm-10">
          <input type="file" name="image1" class="form-control" id="image1" placeholder="Insert Photo">
        </div>
        <br /><br /><br />
        <div class="form-group">
        <label class="control-label col-sm-2" for="image2">Image</label>
        <div class="col-sm-10">
          <input type="file" name="image2" class="form-control" id="image2" placeholder="Insert Photo">
        </div>
        <br /><br /><br />
        <div class="form-group">
        <label class="control-label col-sm-2" for="image3">Image</label>
        <div class="col-sm-10">
          <input type="file" name="image3" class="form-control" id="image3" placeholder="Insert Photo">
        </div>
        <br /><br /><br />
        <div class="form-group">
        <label class="control-label col-sm-2" for="video">Video</label>
        <div class="col-sm-10">
          <input type="file" name="video" class="form-control" id="video" placeholder="Insert Video">
        </div>
        <br /><br /><br />
        <div class="form-group">
        <label class="control-label col-sm-2" for="category_id">Category</label>
        <div class="col-sm-10">
          <select name="category_id" class="form-control">
                @foreach($cats as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach 
              </select>
        </div>
        <br /><br /><br />
      <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-10">
          <button type="submit" class="btn btn-success">Add New Post</button>
        </div>
      </div>
      <input type="hidden" value="{{Session::token()}}" name="_token">
    </form>
    </div>
</div>
@endsection
