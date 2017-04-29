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
     <form class="form-horizontal"  
                  action="{{route('cat.store')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
      <div class="form-group col-md-8">
        <label class="control-label col-sm-2" for="name">Name</label>
        <div class="col-sm-8">
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
        </div>
        <br /><br /><br />
      <div class="form-group col-md-8"> 
        <div class="col-sm-offset-3 col-sm-8">
          <button type="submit" class="btn btn-success">Add New Category</button>
        </div>
      </div>
      <input type="hidden" value="{{Session::token()}}" name="_token">
    </form>
    </div>
    <div class="table">
      Category <span>{{$cats->count()}}</span>
      <table class="table">
    <thead>
      <tr>
        <th>Category</th>
        <th>Control</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cats as $cat)
      <tr>
        <td>{{$cat->name}}</td>
        <td>
          <a href="cat/{{$cat->id}}/edit" class="btn btn-info">Edit</a>
          <a href="cat/{{$cat->id}}/delete" class="btn btn-danger">Delete</a>
        </td>
        @endforeach
      </tr>
    </tbody>
  </table>
  {!! $cats->links() !!}
</div>
@endsection
