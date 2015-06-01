@extends('admin.app')

@section('content')

<span class="title">Danh mục sản phẩm <img src="{{asset('admin/images/bl3.gif')}}" border="0" /> Quản lý danh mục sản phẩm </span>
<hr size="1" color="#cadadd" />
<div class="function">
	<a href="category/create"><img src="{{asset('admin/images/add_new.gif')}}" align="absmiddle" border="0" /></a> <a href="category/create">Thêm danh mục</a>
</div>
<form action="{{ url('/admin/category/delete') }}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="func" value="del" />
<input type="hidden" name="id" value="10" />
<table class="table table-hover">
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

	$num=count($categories);
	$count=0;
?>

@foreach($categories as $key=>$category)
<tr>
	<td><input type="hidden" value="{{$category->id}}" name="catId"/></td>
	<td>
		@if($category->depth>1)
			<span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="padding-left:{{$category['depth']*10}}px;"></span>
		@endif
		{{$category->name}}
	</td>
	<td>{{$category->description}}</td>
	<td>{{$category->parent_id}}</td>
	<td>{{$category->lft}}</td>
	<td>{{$category->rgt}}</td>
	<td>{{$category->created_at}}</td>
	<td>{{$category->updated_at}}</td>
	<td>
	<a href="category/edit/{{$category->id}}" class="btn btn-default" role="button">Edit</a>
	<a href="#" class="btn btn-default" name="btnDelete"  role="button">Delete</a>
	</td>
</tr>
@endforeach
</table>
<input type="hidden" value="{{$category->id}}" name="id"/>
</form>
<script type="text/javascript">
$(document).ready(function(){
	$("a[name='btnDelete']").click(function(){ 
		$id=$(this).parent().siblings(':first').find("input[name='catId']").val();
		$row=$(this).parent().parent();
		$("input[name='id']").val($id);
		$dataString=$('form').serialize();
		$.ajax({
            type: 'POST',
            url: 'category/delete',
            data: $dataString,
            success: function(content) {
              $($row).remove();
            }
        });
	});
	
});
</script>
@endsection
