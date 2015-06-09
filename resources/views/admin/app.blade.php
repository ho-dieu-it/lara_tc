<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="{{asset('/css/upload/jquery.fileupload.css')}}">
	<link rel="stylesheet" href="{{asset('/css/upload/jquery.fileupload-ui.css')}}">
	<!-- CSS adjustments for browsers with JavaScript disabled -->
	<noscript><link rel="stylesheet" href="{{asset('/css/upload/jquery.fileupload-noscript.css')}}"></noscript>
	<noscript><link rel="stylesheet" href="{{asset('/css/upload/jquery.fileupload-ui-noscript.css')}}"></noscript>
	<script type="text/javascript" src="{{asset('/js/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/admin/ckeditor/ckeditor.js')}}"></script>
<!-- 	<script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script> -->
<!-- 	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script> -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Admin System</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/admin/product') }}">Manage Products</a></li>
					<li><a href="{{ url('/admin/category') }}">Manage Categories</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
	@yield('content')
	</div>
	<!-- Scripts -->
<!-- 	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<!-- 	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
<!-- 	<script type="text/javascript" src="{{asset('/js/jquery-1.11.3.min.js')}}"></script> -->
<!-- 	<script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script> -->
		<!--AngularJS-->
		
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js"></script>
	<script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.6.0.js" type="text/javascript"></script>
	<script src="http://m-e-conroy.github.io/angular-dialog-service/javascripts/dialogs.min.js" type="text/javascript"></script>
<!-- 	<script src="{{ asset('/js/app.js') }}"></script> -->
	<!-- Upload File -->
	<script src="{{ asset('/js/upload/vendor/jquery.ui.widget.js') }}"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
	<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!-- 	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
	<!-- blueimp Gallery script -->
	<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<!-- 	<script src="{{ asset('/js/upload/jquery.iframe-transport.js') }}"></script> -->
	<!-- The basic File Upload plugin -->
	<script src="{{ asset('/js/upload/jquery.fileupload.js') }}"></script>
	<!-- The File Upload processing plugin -->
	<script src="{{ asset('/js/upload/jquery.fileupload-process.js') }}"></script>
	<!-- The File Upload image preview & resize plugin -->
	<script src="{{ asset('/js/upload/jquery.fileupload-image.js') }}"></script>
	<!-- The File Upload audio preview plugin -->
	<script src="{{ asset('/js/upload/jquery.fileupload-audio.js') }}"></script>
	<!-- The File Upload video preview plugin -->
	<script src="{{ asset('/js/upload/jquery.fileupload-video.js') }}"></script>
	<!-- The File Upload validation plugin -->
	<script src="{{ asset('/js/upload/jquery.fileupload-validate.js') }}"></script>
	<!-- The File Upload Angular JS module -->
	<script src="{{ asset('/js/upload/jquery.fileupload-angular.js') }}"></script>
	<!-- The main application script -->
	<script src="{{ asset('/js/upload/app.js') }}"></script>
	
</body>
</html>
