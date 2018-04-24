<!-- menu -->
<div class="ban-top" style="height: 73px; background: #4E7AC7; border-bottom: 1px solid #e1e1e1;">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header" style="height: 73px; background: #4E7AC7">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock"  id="bs-example-navbar-collapse-1" >
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a style="font-size: 14px" class="menu__link" href="/"><b>TRANG CHỦ</b> <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="{{ route('frontend.about') }}"><b>GIỚI THIỆU</b></a></li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><b class="mau-menu">HOA LAN</b><span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="{{ route('frontend.listproduct') }}"><img src="trangchinh_asset/images/hoalan5.jpg" alt=" "/></a>
									</div>
									<div class="col-sm-4 multi-gd-img">
										<ul style="color: #16193B; margin-left: 20px; font-size: 15px;" class="multi-column-dropdown">
											@foreach($loai_sp as $loai)
											<li><b><a href="{{ route('frontend.listproduct') }}">{{$loai->ten_loai}}</a></b></li>
											@endforeach
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>QUÀ TẶNG</b><span class="caret"></span></a>
						<ul class="dropdown-menu multi-column columns-3">
							<div class="agile_inner_drop_nav_info">
								<div class="col-sm-3 multi-gd-img">
									<ul class="multi-column-dropdown">
										<li><a href="{{ route('frontend.listproduct') }}">Mừng 8-3</a></li>
										<li><a href="{{ route('frontend.listproduct') }}">Mừng ngày nhà giáo Việt Nam</a></li>
										<li><a href="{{ route('frontend.listproduct') }}">Mừng ngày lễ Tết</a></li>
									</ul>
								</div>

								<div class="col-sm-3 multi-gd-img">
									<ul class="multi-column-dropdown">
										<li><a href="{{ route('frontend.listproduct') }}">Tân gia nhà</a></li>
										<li><a href="{{ route('frontend.listproduct') }}">Khánh thành</a></li>

									</ul>
								</div>
								<div class="col-sm-6 multi-gd-img multi-gd-text ">
									<a href="{{ route('frontend.listproduct') }}"><img src="trangchinh_asset/images/hoalan1.jpg" alt=" "/></a>
								</div>
								<div class="clearfix"></div>
							</div>
						</ul>
					</li>
					<li class=" menu__item"><a class="menu__link" href="{{ route('frontend.sale') }}"><b>KHUYẾN MÃI</b></a></li>
					<li class=" menu__item"><a class="menu__link" href="{{ route('frontend.contact') }}"><b>LIÊN HỆ</b></a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right" >
			<div class="wthreecartaits wthreecartaits2 cart cart box_1" style="height: 72px; background: #4E7AC7" > 
				<a href="{{ route('cart.index') }}"><button class="w3view-cart hover-cart"  type="submit" name="submit" value="" style=" background: 	#4E7AC7" ><i class="fa fa-cart-plus " data-toggle="tooltip" title="Giỏ hàng" style="font-size: 1.3em; color: #fff"  aria-hidden="true" ></i></button></a>
  			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //menu -->