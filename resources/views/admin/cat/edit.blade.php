@extends('admin.layouts.app')

@section('title')
Admin Panel Category
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
     <h1>Edit {{$cats->name}} Category</h1>
    <div class="col-md-8">
    <form class="form-horizontal"  
                  action="{{url('cat/'.$cats->id.'/update')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
      <div class="form-group col-md-8">
        <label class="control-label col-sm-2" for="name">Name</label>
        <div class="col-sm-8">
          <input type="text" name="name" value="{{$cats->name}}" class="form-control" id="name" placeholder="Enter Name">
        </div>
        <br /><br /><br />
      <div class="form-group col-md-8"> 
        <div class="col-sm-offset-3 col-sm-8">
          <button type="submit" class="btn btn-success">Edit {{$cats->name}} Category</button>
        </div>
      </div>
      <input type="hidden" value="{{Session::token()}}" name="_token">
    </form>
    </div>
    <a href="{{url('cat')}}" class="btn btn-info">Back</a>
   
</div>
@endsection
