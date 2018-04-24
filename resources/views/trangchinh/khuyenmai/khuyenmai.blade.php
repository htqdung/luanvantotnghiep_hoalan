@extends('trangchinh.layout.index')

@section('content')


<div class="page-head_agile_info_w3l">
	<div class="container">
			<h3>KHUYẾN MÃI</h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Trang Chủ</a><i>|</i></li>
								<li>Khuyến mãi</li>
							</ul>
						</div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
  <!-- banner-bootom-w3-agileits -->
  
<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		<div class="col-md-4 products-left">
			<div class="css-treeview">
				<h4>Danh sách khuyến mại</h4>
				<ul class="tree-list-pad">	
					<li><input type="checkbox" checked="checked" id="item-2" /><label for="item-2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> TƯNG BỪNG KHAI TRƯƠNG GIẢM TỚI 90%</label>
					</li>
				</ul>
			</div>

			<!--
			@foreach($products as $k =>  $km)
				@if ($k <= 1)
					<div class="product-men">
						<div class="men-pro-item simpleCart_shelfItem">
							<div class="men-thumb-item">
								<img src="{{ asset('trangchinh_asset/images') }}/{{ $km->ten_hinh }}" style="height:248px;" onerror="this.onerror=null;this.src='trangchinh_asset/images/m1.jpg';" alt="" class="pro-image-front">
								<img src="trangchinh_asset/images/m2.jpg" alt="" class="pro-image-back">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="{{ route('frontend.chitiet',[str_slug($km->ten_san_pham),$km->id]) }}" class="link-product-add-cart">Xem Chi Tiết</a>
									</div>
								</div>
								<span class="product-new-top"> Sale</span>

							</div>
							<div class="item-info-product ">
								<h4><a href="{{ route('frontend.chitiet',[str_slug($km->ten_san_pham),$km->id]) }}">{{ $km->ten_san_pham }}</a></h4>
								<div class="info-product-price">
									<span class="item_price">{{ number_format($km->gia,0,",",".") }} VNĐ</span>
								</div>
								<a href="{{ route('cart.add',$km->id) }}">Thêm vào giỏ hàng</a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		-->
		</div>
		
		
		<div class="products-right col-md-8" style="padding-top: 0px; margin-top: 0px">
			@foreach($products as $item)
			<div class="col-md-4 product-men" style="padding-top: 0px; margin-top: 0px;margin-bottom: 10px">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="{{ asset('trangchinh_asset/images') }}/{{ $item->ten_hinh }}" style="height:248px;" onerror="this.onerror=null;this.src='trangchinh_asset/images/m1.jpg';" alt="" class="pro-image-front">
						<img src="trangchinh_asset/images/m2.jpg" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="{{ route('frontend.chitiet',[str_slug($item->ten_san_pham),$item->id]) }}" class="link-product-add-cart">Xem Chi Tiết</a>
								</div>
							</div>
							<span class="product-new-top"> Sale</span>
							
					</div>
					<div class="item-info-product ">
						<h4><a href="{{ route('frontend.chitiet',[str_slug($item->ten_san_pham),$item->id]) }}">{{ $item->ten_san_pham }}</a></h4>
						<div class="info-product-price">
							<span class="item_price">{{ number_format($item->gia,0,",",".") }} VNĐ</span>
						</div>
						<a href="{{ route('cart.add',$item->id) }}">Thêm vào giỏ hàng</a>
															
					</div>
				</div>
			</div>
            @endforeach
				<div class="text-center">
					{{ $products->links() }}
				</div>
		</div>


	</div>
</div>	
<!-- //mens -->

@endsection
