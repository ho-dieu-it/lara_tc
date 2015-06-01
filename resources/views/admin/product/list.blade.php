@extends('admin.app')

@section('content')
<div ng-app="laraApp">
<span class="title">Categories <img src="{{asset('admin/images/bl3.gif')}}" border="0" /> List </span>
<hr size="1" color="#cadadd" />
<div class="function">
	<a href="category/create"><img src="{{asset('admin/images/add_new.gif')}}" align="absmiddle" border="0" /></a> <a href="category/create">Thêm danh mục</a>
</div>
<form action="{{ url('/admin/category/delete') }}" method="post" ng-controller="categoryController" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="func" value="del" />
<input type="hidden" name="id" value="10" />
<table class="table table-hover"  ng-init="getCategories()"> 
<tr>
	<th></th>
	<th>Name </th>
	<th>Description</th>
	<th>Parent Id</th>
	<th>Right</th>
	<th>Left</th>
	<th>Created at</th>
	<th>Updated at</th>
	<th>Actions</th>
</tr>
<?php

// 	$num=count($categories);
// 	$count=0;
?>

<tr ng-repeat="category in categories">
	<td><input type="hidden" value="<% category.id %>" name="catId"/></td>
	<td>
		<span class="glyphicon glyphicon-menu-right" ng-if="category.depth >1" aria-hidden="true" style="padding-left:<%category.depth*10%>px;"></span>
		<%category.name%>
	</td>
	<td><%category.description%></td>
	<td><%category.parent_id%></td>
	<td><%category.lft%></td>
	<td><%category.rgt%></td>
	<td><%category.created_at%></td>
	<td><%category.updated_at%></td>
	<td>
	<a href="category/edit/<% category.id %>" class="btn btn-default glyphicon glyphicon-edit" role="button"></a>
	<a href="#" class="btn btn-default glyphicon glyphicon-trash" name="btnDelete" 
	role="button" ng-click="confirm($index)"></a>
	</td>
</tr>
</table>
<i ng-show="loading" class="fa fa-spinner fa-spin"></i>
<div modal="showModal" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Warning</h4>
      </div>
      <div class="modal-body">
        Do you really want to delete ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" ng-click="deleteCategory()" >Yes</button>
      </div>
    </div>
  </div>
</div>
</form>
<script type="text/javascript">

</script>
</div>
@endsection
