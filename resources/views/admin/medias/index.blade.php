@extends('admin.master')
@section('title','Media')
@section('breadcrumb')
<a href="{{ route('media.create') }}" class="btn btn-primary">Create</a>
@endsection
@section('content')
<div class="">
	
<div class="panel">         
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">				    
				<table class="table admin-form theme-warning fs13" id="datatable3">
						<thead>
							<tr class="bg-light">
								<th >SN</th>
								<th>Image</th>
								<th>Name</th> 
								<th>link</th>
								<th>Created Date</th>   
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($data) > 0)	            
							@foreach($data as $row)
							<tr class="id{{$row->id}}">
								<td>{{$loop->iteration}}</td>
								<td> 
								@if($row->thumbnail)
								<img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $row->thumbnail) }}" width="100px"> 
								</td>
								@endif
								<td>{{ ucfirst($row->name) }}</td>
								<td> 
									 <button value="copy" onclick="copyToClipboard('copy_{{ $row->id }}')" class="btn btn-success btn">CopyLink</button>
									 <input type="text" id="copy_{{ $row->id }}" value="{{ asset( env('PUBLIC_PATH') . '/uploads/original/' . $row->thumbnail) }}" class="form-control">
                    
									<!-- <button class="btn btn-success btn copyBtn" data-text="{{ asset( env('PUBLIC_PATH') . '/uploads/original/' . $row->thumbnail) }}">Copy</button> -->
								</td>
								<td> {{ $row->created_at }} </td>
								<td class="text-left">  
									<a href="{{ url('admin/media/'.$row->id.'/edit') }}">Edit</a> |
									<a href="#{{$row->id}}" class="btn-delete">Delete</a>
								</td>
							</tr>
							@endforeach
							@endif  
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
jQuery(document).ready(function() {
  $('.btn-delete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"{{url('admin/media') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('tbody tr.id' + id ).remove();
      },
      error:function(data){       
       alert('Error occurred!');
     }
   });
  });
});
  </script>
  <!-- add the text you want to copy inside the data-text attribute -->


<script>
    function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');
    }
</script>
@endsection