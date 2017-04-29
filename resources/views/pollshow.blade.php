@php
	$answers = json_decode($polls->answer);
@endphp
@extends('layouts.app')

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
	        <div class="panel-heading">{{$polls->title}}</div>
	        <div class="panel-body">
	        	<form class="form-horizontal"  
                  action="{{url('poll/'.$polls->id.'/savevote')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                	@foreach($answers as $answer)
                		@php
                			$pools = json_decode($answer);
                		@endphp
                		@foreach($pools as $key => $value)
					<input type="radio" name="answer[]" value="{{$key}}">{{$key}}<br />
						@endforeach
					@endforeach
					<input type="submit" value="Go">
				</form>
	        </div>
	        </div>        
    </div>
</div>
@endsection
