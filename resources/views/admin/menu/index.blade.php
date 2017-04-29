@extends('admin.layouts.app')

@section('title')
Menu
@endsection
@section('css')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-4 text-right">
                        <div class="huge">Menu</div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
<div class="col-lg-12 col-md-12 text-center">
{!! Form::open(['url'=>'menu/create','method'=>'post','class'=>'w3-container']) !!}
<div class="form-group col-md-4">
    <label class="w3-text-teal"><b>Menu</b></label>
    <input name="name" class="w3-input w3-border w3-light-grey" type="text">    
</div>
<div class="form-group">
  <button class="w3-btn w3-blue-grey">Create Menu</button>
</div>
{!! Form::close() !!}      
</div>
    <table class="table table-hover table-bordered">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Control</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $menu)
                          <tr>
                            <td>{{$menu->id}}</td>
                            <td>{{$menu->name}}</td>
                            <td>
                                <a href="menu/{{$menu->id}}/delete" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
</div>

@endsection
