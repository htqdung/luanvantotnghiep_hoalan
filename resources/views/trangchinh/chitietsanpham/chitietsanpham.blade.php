@extends('trangchinh.layout.index')

@section('content')
<!--/single_page-->
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
  <div class="container">
      <h3>CHI TIẾT SẢN PHẨM</h3>
      <!--/w3_short-->
         <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

               <ul class="w3_short">
                <li><a href="index.html">Trang Chủ</a><i>|</i></li>
                <li>Chi tiết sản phẩm</li>
              </ul>
             </div>
        </div>
     <!--//w3_short-->
  </div>
</div>

  <!-- banner-bootom-w3-agileits -->
  <div class="banner-bootom-w3-agileits">
    <div class="container">
      <div class="col-md-4 single-right-left ">
        <div class="grid images_3_of_2">
          <div class="flexslider">
            
            <ul class="slides">
              <li data-thumb="trangchinh_asset/images/d2.jpg">
                <div class="thumb-image"> <img src="trangchinh_asset/images/d2.jpg" data-imagezoom="true" class="img-responsive"> </div>
              </li>
              <li data-thumb="trangchinh_asset/images/d1.jpg">
                <div class="thumb-image"> <img src="trangchinh_asset/images/d1.jpg" data-imagezoom="true" class="img-responsive"> </div>
              </li> 
              <li data-thumb="trangchinh_asset/images/d3.jpg">
                <div class="thumb-image"> <img src="trangchinh_asset/images/d3.jpg" data-imagezoom="true" class="img-responsive"> </div>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>  
        </div>
      </div>
{{--      {{ dd($product) }}--}}
      <div class="col-md-8 single-right-left simpleCart_shelfItem">
        <h3>{{ $product->ten_san_pham }}</h3>
        <p><span class="item_price">{{ number_format($product->gia,0,",",'.') }} VNĐ</span></p>
        <div class="rating1">
          <span class="starRating">
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
        <div class="color-quality">
          <div class="color-quality-right">

            <h5>Số lượng :   <select  id="country1" onchange="change_country(this.value)" class="frm-field required sect"  >
              @for($i = 1 ; $i <= $product->so_luong ; $i ++)
                  <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>      </h5>

          </div>
        </div>
        <a href="{{ route('cart.add',$id) }}">Thêm vào giỏ hàng </a>
        <div class="occasion-cart" style="display: none">
          <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
            <form action="#" method="post">
              <fieldset>
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="add" value="1">
                <input type="hidden" name="business" value=" ">
                <input type="hidden" name="item_name" value="Wing Sneakers">
                <input type="hidden" name="amount" value="650.00">
                <input type="hidden" name="discount_amount" value="1.00">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="return" value=" ">
                <input type="hidden" name="cancel_return" value=" ">
                <input type="submit" name="submit" value="Thêm Vào Giỏ Hàng" class="button">
              </fieldset>
            </form>
          </div>
          
        </div>
        <ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
          <li class="share">Chia sẻ : </li>
          <li><a href="#" class="facebook">
            <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
            <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                </ul>
                
              </div>
              <div class="clearfix"> </div>
              <!-- /new_arrivals --> 
              <div class="responsive_tabs_agileits"> 
                <div id="horizontalTab">
                  <ul class="resp-tabs-list">
                    <li>Mô tả</li>
                    <li>Đánh giá</li>
                  
                  </ul>
                  <div class="resp-tabs-container">
                    <!--/tab_one-->
                    <div class="tab1">

                      <div class="single_page_agile_its_w3ls">
                        {{ $product->mo_ta }}
                      </div>
                    </div>
                    <!--//tab_one-->
                    <div class="tab2">
                      
                      <div class="single_page_agile_its_w3ls">
                        <div class="bootstrap-tab-text-grids">
                          <div class="bootstrap-tab-text-grid">
                            <div class="bootstrap-tab-text-grid-left">
                              <img src="trangchinh_asset/images/t1.jpg" alt=" " class="img-responsive">
                            </div>
                            <div class="bootstrap-tab-text-grid-right">
                              <ul>
                                <li><a href="#">Admin</a></li>
                                <li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i>Trả lời</a></li>
                              </ul>
                              <p>Hoa rất đẹp</p>
                            </div>
                            <div class="clearfix"> </div>
                          </div>
                          <div class="add-review">
                            <h4>Thêm đánh giá</h4>
                            <form action="#" method="post">
                              <input type="text" name="Name" required="Name">
                              <input type="email" name="Email" required="Email"> 
                              <textarea name="Message" required=""></textarea>
                              <input type="submit" value="Gửi">
                            </form>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    
                  </div>
                </div>  
              </div>
              <!-- //new_arrivals --> 
              <!--/slider_owl-->
              
              <div class="w3_agile_latest_arrivals">
                <h3 class="wthree_text_info"><span>SẢN PHẨM</span> VỪA XEM</h3> 
                <div class="col-md-3 product-men single">
                  <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">
                      <img src="trangchinh_asset/images/w2.jpg" alt="" class="pro-image-front">
                      <img src="trangchinh_asset/images/w2.jpg" alt="" class="pro-image-back">
                      <div class="men-cart-pro">
                        <div class="inner-men-cart-pro">
                          <a href="single.html" class="link-product-add-cart">Xem Chi Tiết</a>
                        </div>
                      </div>
                      <span class="product-new-top">Mới</span>
                      
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
                          <a href="single.html" class="link-product-add-cart">Xem Chi Tiết</a>
                        </div>
                      </div>
                      <span class="product-new-top">Mới</span>
                      
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
                          <a href="single.html" class="link-product-add-cart">Xem Chi Tiết</a>
                        </div>
                      </div>
                      <span class="product-new-top">Mới</span>
                      
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
                          <a href="single.html" class="link-product-add-cart">Xem Chi Tiết</a>
                        </div>
                      </div>
                      <span class="product-new-top">Mới</span>
                      
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
          </div>
          <!--//single_page-->


@endsection