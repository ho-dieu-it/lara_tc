<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="screen, projection"
	href="{{asset('/css/admin/page.css')}}" />
<script type="text/javascript" src="{{asset('/js/admin/phh.js')}}"></script>
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
<title>Administration Control Panel</title>
<!--[if lt IE 7]>
<script defer type="text/javascript" src="{{asset('/js/admin/pngfix.js')}}"></script>
<![endif]-->

<!--[if lte IE 6]>
<style type="text/css">
.clearfix {height: 1%;}
</style>
<![endif]-->

<!--[if gte IE 7.0]>
<style type="text/css">
.clearfix {display: inline-block;}
</style>
<![endif]-->
</head>
<body>
	<div id="fw_frame" class="clearfix">
		<!-- HEADER -->
		@include('admin.includes.header')
		<!-- MENU -->
		@include('admin.includes.menu')
		<div id="main_frame">@yield('content')</div>
		@include('admin.includes.footer')
	</div>
</body>
</html>