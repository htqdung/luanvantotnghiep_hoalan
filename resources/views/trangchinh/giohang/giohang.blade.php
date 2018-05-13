@extends('trangchinh.layout.index')
@section('content')
<div class="page-head_agile_info_w3l">
	<div class="container">
			<h3>GIỎ HÀNG <span>CỦA BẠN </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Trang Chủ</a><i>|</i></li>
								<li>Giỏ Hàng</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
<div id="all">

        <div id="content" class="banner_bottom_agile_info">
            <div class="container">

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                            <h3 style="text-align: left;" class="wthree_text_info">GIỎ HÀNG</h3>
                            <hr>
                            <p class="text-muted"> Hiện có {{ \Cart::count() }} sản phẩm trong giỏ hàng của bạn.</p>
                            <div class="bs-docs-example">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Sản Phẩm</th>
                                            <th>Số Lượng</th>
                                            <th>Đơn Giá</th>
                                            <th>Giảm Giá</th>
                                            <th colspan="2">Thành Tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {{--{{ dd($products) }}--}}
                                    @foreach($products as $key => $item)
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="{{ asset('trangchinh_asset/images/') }}/{{ $item->options->hinhanh }}" alt="White Blouse Armani">
                                                </a>
                                            </td>
                                            <td><a href="#">{{ $item->name }}</a></td>
                                            <td>
                                                <input type="number" value="{{ $item->qty }}" class="form-control" name="qty[]">
                                                <input type="hidden" name="rowID[]" value="{{ $key }}">
                                            </td>
                                            <td>{{ number_format($item->price,0,",",".") }} VNĐ</td>
                                            <td>0</td>
                                            <td>{{ number_format($item->price * $item->qty,0,",",".") }} VNĐ</td>
                                            <td><a href="{{ route('delete.item.cart',$item->rowId) }}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Tổng Tiền</th>
                                            <th colspan="2">{{ number_format((str_replace(',','',\Cart::subtotal(0))),0,",",".") }} VNĐ</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="/" class="btn btn-default"><i class="fa fa-chevron-left"></i> Trở lại mua hàng </a>
                                </div>
                                <div class="pull-right">
                                    <button  class="btn btn-default" type="submit"><i class="fa fa-refresh"></i>  Cập nhật giỏ hàng </button>
                                    <a href="{{ route('pay') }}" class="btn btn-primary"> Tiến hành Thanh toán <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->


                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div style="background-color: #4E7AC7; text-align: center;" class="box-header">
                            <h3>THANH TOÁN</h3>
                        </div>
                        <p class="text-muted">Tổng thanh toán chưa bao gồm phí vận chuyển và thuế.</p>
                        <div class="bs-docs-example">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Tổng Tiền</td>
                                        <th>{{ number_format((str_replace(',','',\Cart::subtotal(0))),0,",",".") }} VNĐ</th>
                                    </tr>
                                    {{--<tr>--}}
                                        {{--<td>Giảm giá</td>--}}
                                        {{--<th>$10.00</th>--}}
                                    {{--</tr>--}}
                                    <tr class="total">
                                        <td>Tổng Cộng</td>
                                        <th>{{ number_format((str_replace(',','',\Cart::subtotal(0))),0,",",".") }} VNĐ</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!--
                    <div class="box">
                        <div style="background-color: #045FB4; text-align: center;" class="box-header">
                            <h3>MÃ GIẢM GIÁ</h3>
                        </div>
                        <p class="text-muted">Nếu bạn có mã giảm giá, vui lòng nhập mã vào ô bên dưới.</p>
                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

					               <button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>

				                </span>
                    </div> -->
                            <!-- /input-group -->
                        </form>
                    </div>

                </div>
                <!-- /.col-md-3 -->
                <div class="w3_agile_latest_arrivals">
                            <h3 class="wthree_text_info"><span>Có thể </span>Bạn Sẽ Thích</h3>    
                            <div class="col-md-3 product-men single">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="trangchinh_asset/images/w2.jpg" alt="" class="pro-image-front">
                                        <img src="trangchinh_asset/images/w2.jpg" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="trangchinh/chitietsanpham/chitietsanpham" class="link-product-add-cart">Xem Chi Tiết</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="item-info-product ">
                                        <h4><a href="single.html">Sleeveless Solid Blue Top</a></h4>
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
                                            <span class="item_price">$140.99</span>
                                            <del>$189.71</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                            <form action="#" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart">
                                                    <input type="hidden" name="add" value="1">
                                                    <input type="hidden" name="business" value=" ">
                                                    <input type="hidden" name="item_name" value="Sleeveless Solid Blue Top">
                                                    <input type="hidden" name="amount" value="30.99">
                                                    <input type="hidden" name="discount_amount" value="1.00">
                                                    <input type="hidden" name="currency_code" value="USD">
                                                    <input type="hidden" name="return" value=" ">
                                                    <input type="hidden" name="cancel_return" value=" ">
                                                    <input type="submit" name="submit" value="Thêm Vào Giỏ Hàng" class="button">
                                                </fieldset>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 product-men single">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="trangchinh_asset/images/w4.jpg" alt="" class="pro-image-front">
                                        <img src="trangchinh_asset/images/w4.jpg" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="trangchinh/chitietsanpham/chitietsanpham" class="link-product-add-cart">Xem Chi Tiết</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="item-info-product ">
                                        <h4><a href="single.html">Black Basic Shorts</a></h4>
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
                                            <span class="item_price">$120.99</span>
                                            <del>$189.71</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                            <form action="#" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart">
                                                    <input type="hidden" name="add" value="1">
                                                    <input type="hidden" name="business" value=" ">
                                                    <input type="hidden" name="item_name" value="Black Basic Shorts">
                                                    <input type="hidden" name="amount" value="30.99">
                                                    <input type="hidden" name="discount_amount" value="1.00">
                                                    <input type="hidden" name="currency_code" value="USD">
                                                    <input type="hidden" name="return" value=" ">
                                                    <input type="hidden" name="cancel_return" value=" ">
                                                    <input type="submit" name="submit" value="Thêm Vào Giỏ Hàng" class="button">
                                                </fieldset>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 product-men single">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="trangchinh_asset/images/s6.jpg" alt="" class="pro-image-front">
                                        <img src="trangchinh_asset/images/s6.jpg" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="trangchinh/chitietsanpham/chitietsanpham" class="link-product-add-cart">Xem Chi Tiết</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="item-info-product ">
                                        <h4><a href="single.html">Aero Canvas Loafers  </a></h4>
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
                                            <span class="item_price">$120.99</span>
                                            <del>$199.71</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                            <form action="#" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart">
                                                    <input type="hidden" name="add" value="1">
                                                    <input type="hidden" name="business" value=" ">
                                                    <input type="hidden" name="item_name" value="Aero Canvas Loafers">
                                                    <input type="hidden" name="amount" value="30.99">
                                                    <input type="hidden" name="discount_amount" value="1.00">
                                                    <input type="hidden" name="currency_code" value="USD">
                                                    <input type="hidden" name="return" value=" ">
                                                    <input type="hidden" name="cancel_return" value=" ">
                                                    <input type="submit" name="submit" value="Thêm Vào Giỏ Hàng" class="button">
                                                </fieldset>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 product-men single">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="trangchinh_asset/images/w7.jpg" alt="" class="pro-image-front">
                                        <img src="trangchinh_asset/images/w7.jpg" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="trangchinh/chitietsanpham/chitietsanpham" class="link-product-add-cart">Xem Chi Tiết</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="item-info-product ">
                                        <h4><a href="single.html">Ankle Length Socks</a></h4>
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
                                            <span class="item_price">$100.99</span>
                                            <del>$159.71</del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                            <form action="#" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart">
                                                    <input type="hidden" name="add" value="1">
                                                    <input type="hidden" name="business" value=" ">
                                                    <input type="hidden" name="item_name" value="Ankle Length Socks">
                                                    <input type="hidden" name="amount" value="30.99">
                                                    <input type="hidden" name="discount_amount" value="1.00">
                                                    <input type="hidden" name="currency_code" value="USD">
                                                    <input type="hidden" name="return" value=" ">
                                                    <input type="hidden" name="cancel_return" value=" ">
                                                    <input type="submit" name="submit" value="Thêm Vào Giỏ Hàng" class="button">
                                                </fieldset>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                            <!--//slider_owl-->
                        </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

    </div>


@endsection