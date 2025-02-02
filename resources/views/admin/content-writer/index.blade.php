@extends('admin.master')
@section('title','Content Writer')
@section('breadcrumb')
	<a href="{{ route('contentwriter.create') }}" class="btn btn-primary">Add</a>
@endsection
@section('content')
<div class="">

<div class="panel">         
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">
				    
				<table class="table admin-form theme-warning fs13">
						<thead>
							<tr class="bg-light">
								<th>SN</th>
								<th>Content Writer</th> 
								<th> Category </th> 
								<th> Ordering </th> 
								<th>Created Date</th>   
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($data) > 0)	            
							@foreach($data as $row)
							<tr class="id{{$row->id}}">
								<td>{{$loop->iteration}}</td>
								<td><a href="{{ url('admin/contentwriter/' . $row->id ) }}">{{ $row->name }}</a> &nbsp; ({{ news_countby_author($row->id) }})</td>
								<td>{{team_cat($row->email)->title}}</td>
								<td>{{$row->ordering}}</td>
								<td> {{ $row->created_at }} </td>
								<td class="text-left">  
									<a href="{{ url('admin/contentwriter/'.$row->id.'/edit') }}">Edit</a>  &nbsp;
									@if(news_countby_author($row->id) == 0)
									<a href="#{{$row->id}}" class="btn-delete">Delete</a>
									@endif
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
      url:"{{url('admin/contentwriter') . '/'}}" + id,
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
@endsection