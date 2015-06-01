@extends('admin.app')

@section('content')
<?php
$cate_id=10;
?>
<font size="2" face="Tahoma"><b>Sản phẩm <img src="{{asset('images/admin/bl3.gif')}}" border="0" /> Quản lý sản phẩm</b></font>
<hr size="1" color="#cadadd" />
<div class="function">
	<a href="create?cate_id={{$cate_id}}"><img src="{{asset('images/admin/add_new.gif')}}" align="absmiddle" border="0" /></a> <a href="create?cate_id={{$cate_id}}">Thêm sản phẩm mới</a>
</div>
<?php
	//	Kiểm tra sự tồn tại của ID
	// ==========================
	/* $cateid=$_GET['id'];
	$db->query("CALL sp_fe_product_get_by_cate_id(?,?)");
	$db->bindParam(1, $cateid, PDO::PARAM_INT);
	$db->bindParam(2, -1, PDO::PARAM_INT);
	$rows= $db->fetchall(); */
	
	// if($db->rowCount()==0)
	// {
		// admin_load("Không tồn tại Mục này.","?act=product_manager");
	// }
	// foreach ($rows as $row)
	// {
		// var_dump($row);
	// }
	//=================================
	//$id = $id + 0;
	// $r	= $db->select("tgp_product_menu","id = '".$id."'");
	// if ($db->num_rows($r) == 0)
		// admin_load("Không tồn tại Mục này.","?act=product_manager");

	/* if ($func == "del")
	{
		try{
		$tik=$_POST['tik'];
		for ($i = 0; $i < count($tik); $i++)
		{
		
			$db->query("CALL sp_be_product_delete(?)");
			$db->bindParam(1, $tik[$i], PDO::PARAM_INT ); 
			$result=$db->execute();
			
		}
		admin_load("Đã xóa các Bài viết đã chọn.","?act=product_list&id=".$id);
		}catch(Exception $e)
		{
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			die();
		}
		
	} */
?>
<center>
<form action="?act=product_list" method="post" onsubmit="return confirm('Bạn có chắc chắn không ?');">
<input type="hidden" name="func" value="del" />
<input type="hidden" name="id" value="10" />
<table class="table table-hover">
<tr>
	<th>STT</th>
	<th>PIC</th>
	<th>Tên sản phẩm</th>
	<th>Giá bán</th>
	<th>Hiển thị</th>
	<th>Ngày đăng</th>
	<th>Người đăng</th>
	<th>Chỉnh sửa</th>
	<th>Xóa</th>
</tr>
<?php

	$products=$paginator['data'];
	$per_page=$paginator['per_page'];
	$page=$paginator['current_page'];
	$pages=$paginator->lastPage();
	$count=$per_page*($page-1);
?>

@for($i=0;$i<$per_page;$i++)
	<?php $product=$products[$i];
	$count++;?>
<tr class="tb_content">
	<td>{{$count}}</td>
	<td>
	@if($product['gallery_id']!=0)
	<img src="{{asset('images/admin/true.gif')}}" />
	@else 
	<img src="{{asset('images/admin/false.gif')}}" />
	@endif
	</td>
	<td>{{$product['name']}}</td>
	<td style="text-align:right;">{{$product['price']}}</td>
	<td>
	@if($product['visible']==1)
	<img src="{{asset('images/admin/true.gif')}}" />
	@else
	<img src="{{asset('images/admin/false.gif')}}" />
	@endif
	</td>
	<td>{{$product['created_at']}}</td>
	<td>{{$product['user_id']}}</td>
	<td><a href="?act=product_edit&id={{$product['id']}}">Sửa</a></td>
	<td><input name="tik[]" type="checkbox" value="{{$product['id']}}" /></td>
</tr>
@endfor
<?php
//}

?>
<tr class="tb_foot">
	<td colspan="8" style="text-align:left;">
		<strong>Trang : </strong>
		<?php
		//var_dump($paginator);die;
			 if ($pages==0) echo ":1:";
    		for($i=1;$i<=$pages;$i++) {
    			if ($i==$page) echo "<b>[".$i."]</b>";
    			else {
					echo "<a href='?cate_id=".$cate_id."&page=$i'>-$i-</a>";
				}
			}
    	?>
	</td>
	<td><input type="submit" value="Xóa" class="button_2" style="width:80%;" /></td>
</tr>
</table>
</table>
</form>
</center>
<div class="function">
	<a href="create?cate_id={{$cate_id}}"><img src="{{asset('images/admin/add_new.gif')}}" align="absmiddle" border="0" /></a> <a href="create?cate_id={{$cate_id}}">Đăng bài viết mới</a>
</div>
@endsection
