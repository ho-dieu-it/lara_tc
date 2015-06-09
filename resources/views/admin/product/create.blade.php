@extends('admin.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-* col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Create Product</div>
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

					<form class="form-horizontal" id="fileupload" data-ng-app="demo" data-ng-controller="DemoFileUploadController" data-file-upload="options" data-ng-class="{'fileupload-processing': processing() || loadingFiles}" role="form" 
					 action="{{ url('/admin/product/create') }}" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

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
								<input type="file" class="form-control" name="file" multiple/>
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-2 control-label"></label>
							<div class="col-md-6">
							<!-- Upload  -->
							<!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-lg-10">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button" ng-class="{disabled: disabled}">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple ng-disabled="disabled">
                </span>
                <button type="button" class="btn btn-primary start" data-ng-click="submit()">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start upload</span>
                </button>
                <button type="button" class="btn btn-warning cancel" data-ng-click="cancel()">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel upload</span>
                </button>
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5 fade" data-ng-class="{in: active()}">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" data-file-upload-progress="progress()"><div class="progress-bar progress-bar-success" data-ng-style="{width: num + '%'}"></div></div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
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
        
       						 <!-- End upload -->
							</div>
<!-- 							 -->
<!-- 							<a href="#" class="btn btn-default glyphicon glyphicon-plus-sign" name="btnDelete"  -->
<!-- 								role="button" ng-click="addFile()"></a> -->
<!-- 							<a href="#" class="btn btn-default glyphicon glyphicon-minus-sign" name="btnDelete"  -->
<!-- 								role="button" ng-click="deleteFile()"></a> -->
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
									Create
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
var deferred = $.Deferred();

deferred.fail(function(value) {
   console.log(value);
});

deferred.reject("hello world");

//$('.dropdown-toggle').dropdown();
    $(".dropdown-menu li a").click(function(){
			$val=$(this).text();
			$id=$(this).attr('data-id');
			$(this).parent().parent().prev().html($val+" <span class='caret'></span>");
			$('#cateId').val($id);
        });
</script>
@endsection
