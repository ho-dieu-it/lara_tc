@extends('admin.temp')

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
							<label class="col-md-2 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Code</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="code"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Summary</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="summary"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Category</label>
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
								<input type="hidden" name="cateId" id="cateId"/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Upload Image</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="file[]" multiple/>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-2 control-label"></label>
							<div class="col-md-6">
						 <!-- The table listing the files available for upload/download -->
				        <table class="table table-striped files ng-cloak">
				            <tr data-ng-repeat="file in queue" data-ng-class="{'processing': file.$processing()}">
				                <td data-ng-switch data-on="!!file.thumbnailUrl">
				                    <div class="preview" data-ng-switch-when="true">
				                        <a data-ng-href="<%file.url%>" title="<%file.name%>" download="<%file.name%>" data-gallery><img data-ng-src="<%file.thumbnailUrl%>" alt=""></a>
				                    </div>
				                    <div class="preview" data-ng-switch-default data-file-upload-preview="file"></div>
				                </td>
				                <td>
				                    <p class="name" data-ng-switch data-on="!!file.url">
				                        <span data-ng-switch-when="true" data-ng-switch data-on="!!file.thumbnailUrl">
				                            <a data-ng-switch-when="true" data-ng-href="<%file.url%>" title="<%file.name%>" download="<%file.name%>" data-gallery><%file.name%></a>
				                            <a data-ng-switch-default data-ng-href="<%file.url%>" title="<%file.name%>" download="<%file.name%>"><%file.name%></a>
				                        </span>
				                        <span data-ng-switch-default><%file.name%></span>
				                    </p>
				                    <strong data-ng-show="file.error" class="error text-danger"><%file.error%></strong>
				                </td>
				                <td>
				                    <p class="size"><%file.size | formatFileSize%></p>
				                    <div class="progress progress-striped active fade" data-ng-class="{pending: 'in'}[file.$state()]" data-file-upload-progress="file.$progress()"><div class="progress-bar progress-bar-success" data-ng-style="{width: num + '%'}"></div></div>
				                </td>
				                <td>
				                    <button type="button" class="btn btn-primary start" data-ng-click="file.$submit()" data-ng-hide="!file.$submit || options.autoUpload" data-ng-disabled="file.$state() == 'pending' || file.$state() == 'rejected'">
				                        <i class="glyphicon glyphicon-upload"></i>
				                        <span>Start</span>
				                    </button>
				                    <button type="button" class="btn btn-warning cancel" data-ng-click="file.$cancel()" data-ng-hide="!file.$cancel">
				                        <i class="glyphicon glyphicon-ban-circle"></i>
				                        <span>Cancel</span>
				                    </button>
				                    <button data-ng-controller="FileDestroyController" type="button" class="btn btn-danger destroy" data-ng-click="file.$destroy()" data-ng-hide="!file.$destroy">
				                        <i class="glyphicon glyphicon-trash"></i>
				                        <span>Delete</span>
				                    </button>
				                </td>
				            </tr>
				        </table>
				        </div>
				       </div>
						<div class="form-group">
							<label class="col-md-2 control-label">Content</label>
							<div class="col-md-10">
								<textarea  class="form-control" name="content"></textarea>
								<script>
									CKEDITOR.replace('content');
            					</script>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Edit
								</button>
								<button type="submit" class="btn btn-primary">
									Cancel
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
			$('#cateId').val($id);
        });
</script>
@endsection
