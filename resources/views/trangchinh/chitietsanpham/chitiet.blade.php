@extends('trangchinh.layout.main')
@section('main-content')
    <!-- Content -->
    <div id="content">

        <!-- Products -->
        <section class="padding-top-40 padding-bottom-60">
            <div class="container">
                <div class="row">
                    <!-- Products -->
                    <div class="col-md-12">
                        <div class="product-detail">
                            <div class="product">
                                <div class="row">
                                    <!-- Slider Thumb -->
                                    <div class="col-xs-5">
                                        <article class="slider-item on-nav">
                                            <div class="thumb-slider">
                                                <ul class="slides">
                                                    <li data-thumb="{{ asset('trangchinh_asset/images') }}/{{ $product->ten_hinh }}"> <img src="{{ asset('trangchinh_asset/images') }}/{{ $product->ten_hinh }}" alt="" style="height: 500px" > </li>
                                                    <li data-thumb="{{ asset('trangchinh_asset/images') }}/{{ $product->ten_hinh }}"> <img src="{{ asset('trangchinh_asset/images') }}/{{ $product->ten_hinh }}" alt="" style="height: 500px" > </li>
                                                    <li data-thumb="{{ asset('trangchinh_asset/images') }}/{{ $product->ten_hinh }}"> <img src="{{ asset('trangchinh_asset/images') }}/{{ $product->ten_hinh }}" alt="" style="height: 500px" > </li>
                                                </ul>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Item Content -->
                                    <div class="col-xs-7">
                                        <h5>{{ $product->ten_san_pham }}</h5>
                                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Đánh Giá</span></p>
                                        <div class="row">
                                            <div class="col-sm-6"><span class="price">{{ number_format($product->gia,0,",",'.') }} VNĐ</span></div>
                                            <div class="col-sm-6">
                                                <p>Tình Trạng: <span class="in-stock">Còn Hàng</span></p>
                                            </div>
                                        </div>
                                        <!-- List Details -->
                                        {{--<ul class="bullet-round-list">--}}
                                            {{--<li>Screen: 1920 x 1080 pixels</li>--}}
                                            {{--<li>Processor: 2.5 GHz None</li>--}}
                                            {{--<li>RAM: 8 GB</li>--}}
                                            {{--<li>Hard Drive: Flash memory solid state</li>--}}
                                            {{--<li>Graphics : Intel HD Graphics 520 Integrated</li>--}}
                                            {{--<li>Card Description: Integrated</li>--}}
                                        {{--</ul>--}}
                                        <!-- Colors -->

                                        <!-- Compare Wishlist 
                                        <ul class="cmp-list">
                                            <li><a href="#."><i class="fa fa-heart"></i> Add to Wishlist</a></li>
                                            <li><a href="#."><i class="fa fa-navicon"></i> Add to Compare</a></li>
                                            <li><a href="#."><i class="fa fa-envelope"></i> Email to a friend</a></li>
                                        </ul>
                                    -->
                                        <!-- Quinty -->
                                        <br>
                                        <br>
                                        <div class="quinty">
                                            <input type="number" value="1">
                                        </div>
                                        <div>
                                        <a href="#." class="btn-round"><i class="icon-basket-loaded margin-right-5"></i> Thêm Vào Giỏ Hàng</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Details Tab Section-->
                            <div class="item-tabs-sec">

                                <!-- Nav tabs -->
                                <ul class="nav" role="tablist">
                                    <li role="presentation" class="active"><a href="#pro-detil"  role="tab" data-toggle="tab"> Chi Tiết Sản Phẩm </a></li>
                                    <li role="presentation"><a href="#cus-rev"  role="tab" data-toggle="tab">Đánh Giá</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="pro-detil">
                                        {{ $product->mo_ta }}
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="cus-rev"></div>
                                    <div role="tabpanel" class="tab-pane fade" id="ship"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Related Products -->
                        <section class="padding-top-30 padding-bottom-0">
                            <!-- heading -->
                            <div class="heading">
                                <h2> SẢN PHẨM CÙNG DANH MỤC </h2>
                                <hr>
                            </div>
                            <!-- Items Slider -->
                            <div class="item-slide-4 with-nav">
                                <!-- Product -->
                                @if($product_suggess)
                                    @foreach($product_suggess as $ps )
                                        <div class="product">
                                            <article> <img style="height: 250px" class="img-responsive" src="{{ asset('trangchinh_asset/images') }}/{{ $ps->ten_hinh }}" alt="" >
                                                <!-- Content -->
                                                 <a href="{{ route('frontend.chitiet',[str_slug($ps->ten_san_pham),$ps->id]) }}" class="tittle">{{ $ps->ten_san_pham }}</a>
                                                <!-- Reviews -->
                                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Đánh Giá</span></p>
                                                <div class="price">{{ number_format($ps->gia,0,",",".") }}đ</div>
                                                <a href="{{ route('cart.add',$ps->id) }}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                                        </div>
                                        @endforeach
                                @endif
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End Content -->

@endsection<!-- Footer -->
