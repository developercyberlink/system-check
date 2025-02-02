@extends('admin.master')
@section('title','Media')
@section('breadcrumb')
<a href="{{ route('media.index') }}" class="btn btn-primary">List</a>
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ route('media.store') }}" method="post" enctype="multipart/form-data">
 {{ csrf_field() }}            
 <div class="col-md-8">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Add </span>
    </div>
    <div class="panel-body"> 

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Name </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="name" name="name" class="form-control" />
          </div>
        </div>
      </div>  

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Thumbnail </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="file" name="thumbnail" class="form-control" />
          </div>
        </div>
      </div> 

    </div>
  </div> 

 <div class="form-group">  
  <div class="col-lg-8">
    <div class="bs-component">
     <input type="submit" class="btn btn-primary btn" value="Submit" />
   </div>
 </div>
</div> 

</div>
</form>
@endsection