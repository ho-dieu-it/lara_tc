@extends('admin.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Category</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/category/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="{{$category->id}}">
						<div class="form-group">
							<label class="col-md-4 control-label">Category Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{$category->name}}">
							</div>
						</div>
					
						<div class="form-group">
							<label class="col-md-4 control-label">Parent</label>
							<div class="col-md-6">
								<div class="dropdown">
							 <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Categories
							  <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
							    @foreach($categories as $key=>$row) 
							    <?php if($row->id==$category->parent_id){
							    	$parentName=$row->name;
							    }?>
										<li ><a href="#" data-id="{{$row->id}}">
										@if($row->depth>1)
											<span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="padding-left:{{$row->depth*5}}px;"></span>
										@endif
										{{$row->name}}</a></li>
								@endforeach
							  </ul>
							</div>
								<input type="hidden" name="parent" id="parent" value={{$category->parent_id}} />
								<input type="hidden" name="parentName" id="parentName" value="{{!empty($parentName)?$parentName:NULL}}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
								<textarea  class="form-control" name="description" >{{$category->description}}</textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Edit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$parentName=$('#parentName').val();	
	if($parentName!='')								
		$('.dropdown-toggle').html($parentName+" <span class='caret'></span>");
	else 
		$('.dropdown-toggle').html("--Categories -- <span class='caret'></span>");
	$('.dropdown-menu').prepend('<li class="cate" ><a href="#" data-id="{{CATEGORY_ROOT_ID}}"> --Categories-- </a></li>');
    $(".dropdown-menu li a").click(function(){
			$val=$(this).text().trim();
			$id=$(this).attr('data-id');
			$(this).parent().parent().prev().html($val+" <span class='caret'></span>");
			$('#parent').val($id);
			$('#parentName').val($val);
        });
   
</script>
@endsection
