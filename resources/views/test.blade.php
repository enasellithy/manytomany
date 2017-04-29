<form class="form-horizontal"  
                  action="{{url('/f')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
      
        <div class="col-sm-10">
          <input type="file" name="video" class="form-control" id="video" placeholder="Insert Video">
        </div>
        <br /><br /><br />
        
      <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-10">
          <button type="submit" class="btn btn-success">Add New Post</button>
        </div>
      </div>
      <input type="hidden" value="{{Session::token()}}" name="_token">
    </form>