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
<link rel="stylesheet" type="text/css" href="trangchinh_asset/css/jquery-ui.css"> 
<link href="trangchinh_asset/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="trangchinh_asset/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="trangchinh_asset/css/font-awesome.css" rel="stylesheet"> 
<link href="trangchinh_asset/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="trangchinh_asset/css/flexslider.css" type="text/css" media="screen" />
<link href="trangchinh_asset/css/team.css" rel="stylesheet" type="text/css" media="all" />
<link href="trangchinh_asset/css/fonts_1.css" rel="stylesheet">
<link href='trangchinh_asset/css/fonts_2.css' rel='stylesheet' type='text/css'>
<link href="trangchinh_asset/css/style.default.css" rel="stylesheet">
<!-- //css -->

</head>
<body>

	@include('trangchinh.layout.header')

	@include('trangchinh.layout.menu')

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

<!-- cart-js -->
<script src="trangchinh_asset/js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- //cart-js --> 

<!-- Script for responsive tabs -->						
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

<!-- Stats -->
	<script src="trangchinh_asset/js/jquery.waypoints.min.js"></script>
	<script src="trangchinh_asset/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
<!-- //Stats -->

<!-- Start-smoth-scrolling -->
<script type="text/javascript" src="trangchinh_asset/js/move-top.js"></script>
<script type="text/javascript" src="trangchinh_asset/js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //End-smoth-scrolling -->

<!-- Starts scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {				
			$().UItoTop({ easingType: 'easeOutQuart' });			
			});
	</script>
<!-- //Ends scrolling icon -->

<script src="trangchinh_asset/js/responsiveslides.min.js"></script>
<script>
	$(function () {
	// Slideshow 4
	$("#slider3").responsiveSlides({
		auto: true,
		pager: true,
		nav: false,
		speed: 500,
		namespace: "callbacks",
		before: function () {
			$('.events').append("<li>before event fired.</li>");
		},
		after: function () {
			$('.events').append("<li>after event fired.</li>");
		}
	});
});
</script>
<script src="trangchinh_asset/js/modernizr.custom.js"></script>
<!-- Custom-JavaScript-File-Links --> 

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

<!-- script for responsive tabs -->						
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

<!-- //script for responsive tabs -->	

<!-- single -->
<script src="trangchinh_asset/js/imagezoom.js"></script>
<!-- single -->

<!-- //script -->

</body>
</html>
