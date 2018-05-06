@extends('trangchinh.layout.index')

@section('content')


<div class="page-head_agile_info_w3l">
	<div class="container">
			<h3>KHUYẾN MÃI</h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="/">Trang Chủ</a><i>|</i></li>
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
					@foreach($hinhthuckhuyenmai as $hinhthuckhuyenmai)

						<li>
						<input type="checkbox" id="item-1" /><b><a class="fa fa-long-arrow-right" href="{{ \App\Helpers\Url::addParams(['hinhthuckhuyenmai' => $hinhthuckhuyenmai->id]) }}" for="item-1"> {{$hinhthuckhuyenmai->ten_hinh_thuc}} </a></b>
						</li>

					@endforeach
				</ul>
			</div>
		</div>
		
		
		<div class="products-right col-md-8" style="padding-top: 0px; margin-top: 0px">
			@foreach($products as $item)
			<div class="col-md-4 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item" style="width: 100%;height: 230px">
						<img src="{{ asset('trangchinh_asset/images') }}/{{ $item->ten_hinh }}" style="height:248px;" onerror="this.onerror=null;this.src='trangchinh_asset/images/m1.jpg';" alt="" class="pro-image-front" style="height: 100%">
						<img src="{{ asset('trangchinh_asset/images') }}/{{ $item->ten_hinh }}" alt="" class="pro-image-back" style="height: 100%">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="{{ route('frontend.chitiet',[str_slug($item->ten_san_pham),$item->id]) }}" class="link-product-add-cart">Xem Chi Tiết</a>
								</div>
							</div>
							<span class="product-new-top">
							 Sale
							</span>
							
					</div>
					<div class="item-info-product ">
						<h4 style="height: 40px;"><a href="{{ route('frontend.chitiet',[str_slug($item->ten_san_pham),$item->id]) }}">{{ $item->ten_san_pham }}</a></h4>
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
