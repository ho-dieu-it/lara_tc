<div class="row">
<div class="col-md-12">
<?php //echo $error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
<form name="frm_edit" id="frm_edit" action="create" enctype="multipart/form-data" method="post"/>
<input type="hidden" name="id" value="{{$product->id}}" />
<input type="hidden" name="func" value="<?php //echo $func?>" />
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab_general" data-toggle="tab">
		General </a></li>
</ul>
<div class="tab-content no-space">
	<div class="tab-pane active" id="tab_general">
	<div class="form-group">
	    <label class="col-md-2 control-label" for="nameForTitle">Tên bài viết :<span class="required">*</span></label>
	    <div class="col-md-10">
	    	<input class="form-control" type="text" name="name"  value="{{$product->name}}" class="form-control" id="name" placeholder="Enter name">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-md-2 control-label" for="nameForTitle">Nhóm :</label>
	    <div class="col-md-10">
			<input  class="form-control" type="file" name="s_image"/>    
		</div>
	  </div>
	  <div class="form-group">
	    <label class="col-md-2 control-label" for="nameForTitle">Hình ảnh :<span class="required">*</span></label>
	    <div class="col-md-10">
			<input  class="form-control" type="file" name="s_image"/>
		</div>
	  </div>
	  <div class="form-group">
	    <label class="col-md-2 control-label" for="noteForImage">Ghi chú hình ảnh :</label>
	    <div class="col-md-10">
			<input class="form-control" type="text" name="txt_hinh_note" value="<?php //echo $txt_hinh_note?>"/>
		</div>
	  </div>
	  <div class="form-group">
	    <label class="col-md-2 control-label" for="noteForImage">Sơ lược bài viêt :</label>
	    <div class="col-md-10">
			<textarea name="summary" class="form-control">{{$product->summary}}</textarea>
		</div>
	  </div>
	  <div class="form-group">
	    <label class="col-md-2 control-label" for="noteForImage">Giới thiệu :</label>
	    <div class="col-md-10">
			<textarea name="content" id="content" class="form-control">{{$product->summary}}</textarea>
			<script>
				CKEDITOR.replace('content');
            </script>
		</div>
	  </div>
	  <div class="form-group">
	    <label class="col-md-2 control-label" for="noteForImage">Hiển thị :</label>
	   <div class="col-md-10">
	   <div class="form-control">
  			<label><input name="visible" type="radio" value="0" <?php echo $product->visible==0?"checked":""?> /> Tắt</label>
  			<label><input name="visible" type="radio" value="0" <?php echo $product->visible==1?"checked":""?> /> Mở *</label>
	  	</div>
	  	</div>

	  <div class="form-group">
	    <label class="col-md-2 control-label" for="noteForImage">Nổi bật :</label>
	   <div class="col-md-10">
	   <div class="form-control">
			<label><input  name="hot" type="radio" value="0" <?php echo $product->hot==0?"checked":""?> /> Tắt</label>
			<label><input name="hot" type="radio" value="1" <?php echo $product->hot==1?"checked":""?> /> Mở *	</label>
		</div>
	</div>
	  </div>
	   <div class="form-group">
	  <div class="btn-group">
		<input name="submit" type="submit" value="Submit" />
		<input name="submit" type="reset" value="Làm lại" />
		<input type="button" value="Xem DS" onclick="Forward('?act=cms_manager');">
	  </div>
	  </div>
	</div>
</div>



<?php

function	show_cat($name,$id)
{
	global $db;
	
//$r2 = $db->select("tgp_cat","_cms = 1","order by thu_tu asc");
$db->query("CALL sp_temp_cms_get_cat(1)");
$rows= $db->fetchall();
?>
<select name="<?php echo $name?>" class="inputbox" style="width:50%;">
<?php
foreach ($rows as $row2)
{
	echo "<optgroup label='".$row2["ten"]."'>";
	//$r	=	$db->select("tgp_cms_menu","cat = '".$row2["id"]."'","order by thu_tu asc");
	
	$db->query("CALL sp_temp_cms_menu_get_by_cate('".$row2["id"]."')");
	$rows_m= $db->fetchall();
	foreach ($rows_m as $row)
	{
		echo "<option value='".$row["id"]."'";
		if ($id == $row["id"]) echo " selected ";
		echo ">".$row["ten"]."</option>";
	}
	echo "</optgroup>";
}
?>
</select>
<?php
}
?>
</form>
</div>
</div>