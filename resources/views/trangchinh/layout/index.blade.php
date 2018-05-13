<!DOCTYPE html>
<html>
<head>
<title>NEAR Shopping</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<!-- css -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/backend/css/all.min.css">

<!-- //css -->
</head>
<body style="background: 	#fff">

	@include('trangchinh.layout.header')

	@include('trangchinh.layout.menu')
	@foreach(['success','danger'] as $item)
		@if(session($item))
			<div class="flash-message">
				<div class="alert alert-{{ $item }}" role="alert" style="position: absolute;right: 10px;top: 20px">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					<strong class="font-weight-100 font-size-14">{{ session($item) }}  </strong>
				</div>
			</div>

		@endif
	@endforeach

	<div>
		@yield('content')
	</div>

	@include('trangchinh.layout.footer')

	<!-- script -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

	@yield('main-js')
	<script src="/backend/js/all.min.js"></script>
</body>
</html>
