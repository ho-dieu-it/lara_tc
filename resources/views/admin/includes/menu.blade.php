<?php
	$menu[0]		=	"Quản lý nội dung";
	$name[0][0]	=	"Quản lý Tin tức";					$link[0][0]	=	"?act=cms_manager";
	$name[0][1]	=	"Quản lý Sản phẩm";					$link[0][1]	=	"?act=product_manager";
	$name[0][2]	=	"Quản lý Trang nội dung";			$link[0][2]	=	"?act=page_list";
	$name[0][3]	=	"QL Thông tin Khách hàng";				$link[0][3]	=	"?act=cus_manager";
	$name[0][4]	=	"QL Thông tin Quảng cáo";				$link[0][4]	=	"?act=ads_manager";	
	$name[0][5]	=	"QL Thông tin HTKH";						$link[0][5]	=	"?act=info_manager";	
	$name[0][6]	=	"QL Banner";						$link[0][6]	=	"?act=banner_manager";	
	//$name[0][7]	=	"QL Logo";						$link[0][7]	=	"?act=logo_manager";	
	
	//$menu[1]		=	"Công cụ";
	//m$name[1][0]	=	"Sao lưu CSDL";			$link[1][0]	=	"?act=backup";

	$menu[1]		=	"Quản trị hệ thống";
	$name[1][0]	=	"Quản lý Thành viên";	$link[1][0]	=	"?act=member_list";
	
?>
<div id="fw_menu">
	<ul id="menu_1">
		<!-- <li onclick="Forward('?act=home');">Trang chủ</li> -->
		<?php
for ($i = 0; $i < count($menu); $i++)
		{
		echo "<li>".$menu[$i];
		echo "<ul>";
			for ($j = 0; $j < count($name[$i]); $j++)
			{
				echo "<li onclick=\"Forward('".$link[$i][$j]."');\">".$name[$i][$j]."</li>";
			}
		echo "</ul>";
		echo "</li>";
		}
		?>
	</ul>
	<div id="tool">
		<a href="javascript:_postback();" onclick="Forward('?logout=OK');"><img border="0" src="images/logout.png" /></a>
	</div>
</div>
<div id="fw_menu_2"></div>