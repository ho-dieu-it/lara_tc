@extends('admin.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Create Category</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/category/create') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Category Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Parent</label>
							<div class="col-md-8">
							<div class="dropdown">
							 <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">--Categories--
							  <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
							  <li ><a href="#" data-id="4">--Categories--</a></li>
							    @foreach($categories as $key=>$category) 
									<li ><a href="#" data-id="{{$category->id}}">
									@if($category->depth>1)
										<span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="padding-left:{{$category->depth*5}}px;"></span>
									@endif
									{{$category->name}}</a></li>
								@endforeach
							  </ul>
							</div>
								<input type="hidden" name="parent" id="parent" value="{{CATEGORY_ROOT_ID}}" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
								<textarea  class="form-control" name="description"></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Create
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
//$('.dropdown-toggle').dropdown();
    $(".dropdown-menu li a").click(function(){
			$val=$(this).text();
			$id=$(this).attr('data-id');
			$(this).parent().parent().prev().html($val+" <span class='caret'></span>");
			$('#parent').val($id);
        });
</script>
@endsection
