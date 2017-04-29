@extends('admin.layouts.app')

@section('title')
Create New Post
@endsection
@section('css')
<style type="text/css">
.btn-default,
.btn-default:hover {
    color: #FFF;
    background-color: #d80857;
    border-color: #E91E63;
    margin-bottom: 10px;
    font-weight: bold;
}
</style>
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
    <div class="col-lg-10 col-md-10">
        <form class="form-horizontal"  
                  action="{{route('post.store')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
      <div class="form-group">
        <label class="control-label col-sm-2" for="title">Title</label>
        <div class="col-sm-10">
          <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
        </div>
        <br /><br /><br />
        <div class="form-group">
        <label class="control-label col-sm-2" for="body">Text</label>
        <div class="col-sm-10">
          <textarea  name="body" class="form-control" id="body" col="5" rows="3"></textarea>
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
          <input type="file" name="image3" class="form-control" id="image3" max="5" placeholder="Insert Photo">
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
        <label class="control-label col-sm-2" for="slug">Slug</label>
        <div class="col-sm-10">
          <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter Slug">
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
