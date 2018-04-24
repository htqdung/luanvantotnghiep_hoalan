<!DOCTYPE html>
<html>
<head>
<title>NEAR Shopping</title>
<base href="{{asset('')}}"></base>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<!-- css -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="app/css/all.css">

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

<!-- js -->
<script type="text/javascript" src="trangchinh_asset/js/jquery-2.1.4.min.js"></script>
<script src="trangchinh_asset/js/modernizr.custom.js"></script>
<script type="text/javascript" src="trangchinh_asset/js/bootstrap.js"></script>
<!-- //js -->
<script src="trangchinh_asset/js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //Script for responsive tabs -->

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

<!---->
<script type='text/javascript'>
$(window).load(function(){
	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 9000,
		values: [ 1000, 7000 ],
		slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
	}
});
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
});
</script>
<script type="text/javascript" src="trangchinh_asset/js/jquery-ui.js"></script>
<!---->


<!-- FlexSlider -->
<script src="trangchinh_asset/js/jquery.flexslider.js"></script>
<script>
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>
<!-- //FlexSlider-->


</body>
</html>
