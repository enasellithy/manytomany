@extends('admin.layouts.app')

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
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">poll</div>

                <div class="panel-body">
                     <form class="form-horizontal"  
                  action="{{url('poll/store')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                 <div class="form-group">
          <input type="text" name="title" class="form-control" placeholder="Enter Title">
        </div>
          <div class="form-group">
          <input type="text" name="answer[]" value="" class="form-control" placeholder="Enter Poll">
        </div>
      <div class="form-group">
          <input type="text" name="answer[]" value="" class="form-control" placeholder="Enter Poll">
        </div>
        <div class="form-group">
          <input type="text" name="answer[]" value="" class="form-control" placeholder="Enter Poll">
        </div>
        <div class="form-group">
          <input type="text" name="answer[]" value="" class="form-control" placeholder="Enter Poll">
        </div>
        <div class="form-group">
          <input type="text" name="answer[]" value="" class="form-control" placeholder="Enter Poll">
        </div>
      <div class="form-group"> 
        <div class="col-sm-10">
          <button type="submit" class="btn btn-success btn-block">Add Poll</button>
        </div>
      </div>
      <input type="hidden" value="{{Session::token()}}" name="_token">
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($polls as $poll)
{{$poll->id}}
<a href="poll/{{$poll->id}}/show">Show</a>
@endforeach
@endsection
