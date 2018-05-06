@extends('trangchinh.layout.index')

@section('content')
<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li> 
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<h3> <span>TƯNG BỪNG KHAI TRƯƠNG</span></h3>
						<p>Từ ngày 13/3 - 13/4</p>
						<a class="hvr-outline-out button2" href="trangchinh/sanpham/sanpham">Xem ngay </a>
					</div>
				</div>
			</div>
			<div class="item item2"> 
				<div class="container">
					<div class="carousel-caption">
						<h3> <span>TƯNG BỪNG KHAI TRƯƠNG</span></h3>
						<p>Từ ngày 13/3 - 13/4</p>
						<a class="hvr-outline-out button2" href="trangchinh/sanpham/sanpham">Xem ngay </a>
					</div>
				</div>
			</div>
			<div class="item item3"> 
				<div class="container">
					<div class="carousel-caption">
						<h3><span>TƯNG BỪNG KHAI TRƯƠNG</span></h3>
						<p>Từ ngày 13/3 - 13/4</p>
						<a class="hvr-outline-out button2" href="trangchinh/sanpham/sanpham">Xem ngay </a>
					</div>
				</div>
			</div>

		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Quay lại</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Kế tiếp</span>
		</a>
		<!-- The Modal -->

    </div> 

	<!-- //banner -->
	<div class="banner_bottom_agile_info">
	    <div class="container">
            <div class="banner_bottom_agile_info_inner_w3ls">
            	<a href="trangchinh/sanpham/sanpham">
    	           <div style="height: 500px" class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img src="trangchinh_asset/images/hoalan.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3>HOA LAN<span> TẶNG QUÀ</span></h3>
								<p>Mới</p>
							</figcaption>			
						</figure>
					</div>
				</a>
				<a href="trangchinh/sanpham/sanpham">
					 <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img src="trangchinh_asset/images/hoalan2.jpg" alt=" " class="img-responsive" />
							<figcaption>
								<h3>HOA LAN<span> NHÂN GIỐNG</span></h3>
								<p>Mới</p>
							</figcaption>			
						</figure>
					</div>
				</a>
					<div class="clearfix"></div>
		    </div> 
		 </div> 
    </div>
   
	<!-- schedule-bottom -->
	
<!-- //schedule-bottom -->
<!-- /new_arrivals --> 
<div class="new_arrivals_agile_w3ls_info"> 
	<div class="container">
		<h3 class="wthree_text_info"><span>SẢN PHẨM MỚI</span></h3>		
		<div id="horizontalTab">
			<ul class="resp-tabs-list">
				<li> Lan vanda</li>
				<li> Lan hồ điệp</li>
				<li> Lan vũ nữ</li>
			</ul>
			<div class="resp-tabs-container">
				<!--/tab_one-->
				<div class="tab1">

					@php
						$product4 = \DB::table('tbl_sanpham')
						   ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
						   ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
						   ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
						   ->orderBy('tbl_sanpham.id','DESC')
						   ->limit(8)
						   ->where('tbl_sanpham_loai.loai_id',4)
						   ->get();
					@endphp

					@foreach($product4 as $itemNew)
					<div class="col-md-3 product-men">
						<div class="men-pro-item simpleCart_shelfItem">
							<div class="men-thumb-item">
								<img src="{{ asset('trangchinh_asset/images') }}/{{ $itemNew->ten_hinh }}" style="height:248px;" onerror="this.onerror=null;this.src='trangchinh_asset/images/m1.jpg';" alt="" class="pro-image-front">
								<img src="{{ asset('trangchinh_asset/images') }}/{{ $itemNew->ten_hinh }}" alt="" class="pro-image-back">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="{{ route('frontend.chitiet',[str_slug($itemNew->ten_san_pham),$itemNew->id]) }}" class="link-product-add-cart">Xem Chi Tiết</a>
									</div>
								</div>
								<span class="product-new-top">Mới</span>

							</div>
							<div class="item-info-product ">
								<h4><a href="{{ route('frontend.chitiet',$itemNew->id) }}">{{ $itemNew->ten_san_pham }}</a></h4>
								<div class="rating1">
									<span style="margin-top: 10px" class="starRating">
										<input id="rating5" type="radio" name="rating" value="5">
										<label for="rating5">5</label>
										<input id="rating4" type="radio" name="rating" value="4">
										<label for="rating4">4</label>
										<input id="rating3" type="radio" name="rating" value="3" checked="">
										<label for="rating3">3</label>
										<input id="rating2" type="radio" name="rating" value="2">
										<label for="rating2">2</label>
										<input id="rating1" type="radio" name="rating" value="1">
										<label for="rating1">1</label>
									</span>
								</div>
								<div class="info-product-price">
									<span class="item_price">{{ number_format($itemNew->gia,0,",",".") }}đ</span>
								</div>
								<a href="{{ route('cart.add',$itemNew->id) }}">Thêm vào giỏ hàng</a>

							</div>
						</div>
					</div>
					@endforeach

					<div class="clearfix"></div>
					<div class="text-center" style="margin-top: 20px;">
						<a href="/san-pham.html?loai=4" class="btn btn-success">Xem thêm >></a>
					</div>
				</div>
				<!--//tab_one-->
				<!--/tab_two-->
				<div class="tab2">
					@php
						$product5 = \DB::table('tbl_sanpham')
						   ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
						   ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
						   ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
						   ->orderBy('tbl_sanpham.id','DESC')
						   ->limit(8)
						   ->where('tbl_sanpham_loai.loai_id',5)
						   ->get();
					@endphp

					@foreach($product5 as $itemNew)
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{ asset('trangchinh_asset/images') }}/{{ $itemNew->ten_hinh }}" style="height:248px;" onerror="this.onerror=null;this.src='trangchinh_asset/images/m1.jpg';" alt="" class="pro-image-front">
									<img src="{{ asset('trangchinh_asset/images') }}/{{ $itemNew->ten_hinh }}" alt="" class="pro-image-back">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="{{ route('frontend.chitiet',[str_slug($itemNew->ten_san_pham),$itemNew->id]) }}" class="link-product-add-cart">Xem Chi Tiết</a>
										</div>
									</div>
									<span class="product-new-top">Mới</span>

								</div>
								<div class="item-info-product ">
									<h4><a href="{{ route('frontend.chitiet',$itemNew->id) }}">{{ $itemNew->ten_san_pham }}</a></h4>
									<div class="rating1">
									<span style="margin-top: 10px" class="starRating">
										<input id="rating5" type="radio" name="rating" value="5">
										<label for="rating5">5</label>
										<input id="rating4" type="radio" name="rating" value="4">
										<label for="rating4">4</label>
										<input id="rating3" type="radio" name="rating" value="3" checked="">
										<label for="rating3">3</label>
										<input id="rating2" type="radio" name="rating" value="2">
										<label for="rating2">2</label>
										<input id="rating1" type="radio" name="rating" value="1">
										<label for="rating1">1</label>
									</span>
									</div>
									<div class="info-product-price">
										<span class="item_price">{{ number_format($itemNew->gia,0,",",".") }}đ</span>
									</div>
									<a href="{{ route('cart.add',$itemNew->id) }}">Thêm vào giỏ hàng</a>

								</div>
							</div>
						</div>
					@endforeach
					<div class="clearfix"></div>
					<div class="text-center" style="margin-top: 20px;">
						<a href="/san-pham.html?loai=5" class="btn btn-success">Xem thêm >></a>
					</div>
				</div>
				<!--//tab_two-->
				<div class="tab3">

					@php
						$product9 = \DB::table('tbl_sanpham')
						   ->leftJoin('tbl_sanpham_loai','tbl_sanpham.id','tbl_sanpham_loai.sanpham_id')
						   ->leftJoin('tbl_dongia','tbl_sanpham.id','tbl_dongia.sanpham_id')
						   ->leftJoin('tbl_hinhanh','tbl_sanpham.id','tbl_hinhanh.sanpham_id')
						   ->orderBy('tbl_sanpham.id','DESC')
						   ->where('tbl_sanpham_loai.loai_id',9)
						   ->limit(8)
						   ->get();
					@endphp

					@foreach($product9 as $itemNew)
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{ asset('trangchinh_asset/images') }}/{{ $itemNew->ten_hinh }}" style="height:248px;" onerror="this.onerror=null;this.src='trangchinh_asset/images/m1.jpg';" alt="" class="pro-image-front">
									<img src="{{ asset('trangchinh_asset/images') }}/{{ $itemNew->ten_hinh }}" alt="" class="pro-image-back">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="{{ route('frontend.chitiet',$itemNew->id) }}" class="link-product-add-cart">Xem Chi Tiết</a>
										</div>
									</div>
									<span class="product-new-top">Mới</span>

								</div>
								<div class="item-info-product ">
									<h4><a href="{{ route('frontend.chitiet',[str_slug($itemNew->ten_san_pham),$itemNew->id]) }}">{{ $itemNew->ten_san_pham }}</a></h4>
									<div class="rating1">
									<span style="margin-top: 10px" class="starRating">
										<input id="rating5" type="radio" name="rating" value="5">
										<label for="rating5">5</label>
										<input id="rating4" type="radio" name="rating" value="4">
										<label for="rating4">4</label>
										<input id="rating3" type="radio" name="rating" value="3" checked="">
										<label for="rating3">3</label>
										<input id="rating2" type="radio" name="rating" value="2">
										<label for="rating2">2</label>
										<input id="rating1" type="radio" name="rating" value="1">
										<label for="rating1">1</label>
									</span>
									</div>
									<div class="info-product-price">
										<span class="item_price">{{ number_format($itemNew->gia,0,",",".") }}đ</span>
									</div>
									<a href="{{ route('cart.add',$itemNew->id) }}">Thêm vào giỏ hàng</a>

								</div>
							</div>
						</div>
					@endforeach

					<div class="clearfix"></div>
					<div class="text-center" style="margin-top: 20px;">
						<a href="/san-pham.html?loai=9" class="btn btn-success">Xem thêm >></a>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- //new_arrivals --> 
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
  	<div class="container">
  		<h3 class="wthree_text_info"><span>CHƯƠNG TRÌNH KHUYẾN MÃI</span></h3>

  		<div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
  			<a href="trangchinh/sanpham/sanpham">
  				<div class="bb-left-agileits-w3layouts-inner grid">
  					<figure class="effect-roxy">
  						<img src="trangchinh_asset/images/bb1.jpg" alt=" " class="img-responsive" />
  						<figcaption>
  							<h3><span>S</span>ale </h3>
  							<p>Upto 55%</p>
  						</figcaption>			
  					</figure>
  				</div>
  			</a>
  		</div>
  		<div class="col-md-7 bb-grids bb-middle-agileits-w3layouts">
  			<a href="trangchinh/sanpham/sanpham">
  				<div class="bb-middle-agileits-w3layouts grid">
  					<figure class="effect-roxy">
  						<img src="trangchinh_asset/images/bottom3.jpg" alt=" " class="img-responsive" />
  						<figcaption>
  							<h3><span>S</span>ale </h3>
  							<p>Upto 55%</p>
  						</figcaption>			
  					</figure>
  				</div>
  			</a>
  			<a href="trangchinh/sanpham/sanpham">
  				<div class="bb-middle-agileits-w3layouts forth grid">
  					<figure class="effect-roxy">
  						<img src="trangchinh_asset/images/bottom4.jpg" alt=" " class="img-responsive">
  						<figcaption>
  							<h3><span>S</span>ale </h3>
  							<p>Upto 65%</p>
  						</figcaption>		
  					</figure>
  				</div>
  			</a>
  			<div class="clearfix"></div>
  		</div>
  	</div>
</div>

<div class="new_arrivals_agile_w3ls_info"> 
	<div class="container">
		<h3 class="wthree_text_info"><span>SẢN PHẨM KHUYẾN MÃI</span></h3>		
		<div id="horizontalTab">
			<div class="resp-tabs-container">
				<!--/tab_one-->
				<div class="tab1">
					@foreach($productSale as $sale)
					<div class="col-md-3 product-men">
						<div class="men-pro-item simpleCart_shelfItem">
							<div class="men-thumb-item">
								<img src="{{ asset('trangchinh_asset/images') }}/{{ $sale->ten_hinh }}" style="height:248px;" onerror="this.onerror=null;this.src='trangchinh_asset/images/m1.jpg';" alt="" class="pro-image-front">
								<img src="{{ asset('trangchinh_asset/images') }}/{{ $sale->ten_hinh }}" alt="" class="pro-image-back" style="height:248px;">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="{{ route('frontend.chitiet',[str_slug($sale->ten_san_pham),$sale->id]) }}" class="link-product-add-cart">Xem Chi Tiết</a>
									</div>
								</div>
								<span class="product-new-top">SALE</span>

							</div>
							<div class="item-info-product ">
								<h4 style="height: 30px"><a href="{{ route('frontend.chitiet',[str_slug($sale->ten_san_pham),$sale->id]) }}">{{ $sale->ten_san_pham }}</a></h4>
								<div class="rating1">
									<span style="margin-top: 10px" class="starRating">
										<input id="rating5" type="radio" name="rating" value="5">
										<label for="rating5">5</label>
										<input id="rating4" type="radio" name="rating" value="4">
										<label for="rating4">4</label>
										<input id="rating3" type="radio" name="rating" value="3" checked="">
										<label for="rating3">3</label>
										<input id="rating2" type="radio" name="rating" value="2">
										<label for="rating2">2</label>
										<input id="rating1" type="radio" name="rating" value="1">
										<label for="rating1">1</label>
									</span>
								</div>
								<div class="info-product-price">
									<span class="item_price">{{ number_format($sale->gia,"0",",",".") }}</span>
								</div>
								<a href="{{ route('cart.add',$sale->id )}}"> Thêm giỏ hàng </a>

							</div>
						</div>
					</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /new_arrivals --> 

<!-- /new_arrivals --> 

	<div class="new_arrivals_agile_w3ls_info"> 
	<div class="container">
		<h3 class="wthree_text_info"><span>TẤT CẢ SẢN PHẨM</span></h3>		
		<div id="horizontalTab">
			<div class="resp-tabs-container">
				<!--/tab_one-->
				<div class="tab1">
					@foreach($productall as $sp)
					<div class="col-md-3 product-men">
						<div class="men-pro-item simpleCart_shelfItem">
							<div class="men-thumb-item">
								<img src="{{ asset('trangchinh_asset/images') }}/{{ $sp->ten_hinh }}" style="height:248px;" onerror="this.onerror=null;this.src='trangchinh_asset/images/m1.jpg';" alt="" class="pro-image-front">
								<img src="{{ asset('trangchinh_asset/images') }}/{{ $sp->ten_hinh }}" alt="" class="pro-image-back" style="height:248px;">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="trangchinh/chitietsanpham/chitietsanpham" class="link-product-add-cart">Xem Chi Tiết</a>
									</div>
								</div>
								<!--span class="product-new-top">Mới</span>-->

							</div>
							<div class="item-info-product ">
								<h4 style="height: 30px"><a href="{{ route('frontend.chitiet',[str_slug($sp->ten_san_pham),$sp->id]) }}">{{ $sp->ten_san_pham }}</a></h4>
								<div class="rating1">
									<span style="margin-top: 10px" class="starRating">
										<input id="rating5" type="radio" name="rating" value="5">
										<label for="rating5">5</label>
										<input id="rating4" type="radio" name="rating" value="4">
										<label for="rating4">4</label>
										<input id="rating3" type="radio" name="rating" value="3" checked="">
										<label for="rating3">3</label>
										<input id="rating2" type="radio" name="rating" value="2">
										<label for="rating2">2</label>
										<input id="rating1" type="radio" name="rating" value="1">
										<label for="rating1">1</label>
									</span>
								</div>
								<div class="info-product-price">
									<span class="item_price">{{ number_format($sp->gia,"0",",",".") }}</span>
								</div>
								<a href="{{ route('cart.add',$sp->id )}}"> Thêm giỏ hàng </a>

							</div>
						</div>
					</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
		</div>	
	</div>
</div>

@extends('trangchinh.layout.facebook');


	<!-- //new_arrivals --> 
	<!-- /we-offer -->
		<div class="sale-w3ls">
			<div class="container">
				<h6 >MUA SỐ LƯỢNG LỚN GIẢM ĐẾN <span style="color: #7FB2F0" >20%</span></h6>
				<a class="hvr-outline-out button2" href="{{ route('frontend.khuyenmai') }}">Xem Ngay </a>
			</div>
		</div>
	<!-- //we-offer -->
<!--/grids-->

@endsection
