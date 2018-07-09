@extends('trangchinh.layout.main')
{{--<meta http-equiv="refresh" content="10">--}}
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
                                                <ul style="text-align: center;" class="slides">
                                                    <li data-thumb="{{ asset('sanpham') }}/{{ $product->ten_hinh }}"> <img src="{{ asset('sanpham') }}/{{ $product->ten_hinh }}" alt="" style=" width: 400px; height: 400px" > </li>
                                                    <li data-thumb="{{ asset('sanpham') }}/{{ $product->ten_hinh }}"> <img src="{{ asset('sanpham') }}/{{ $product->ten_hinh }}" alt="" style="width: 400px; height: 400px" > </li>
                                                    
                                                </ul>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Item Content -->
                                    <div class="col-xs-7">

                                        <h5>{{ $product->ten_san_pham }}</h5>
                                        <p class="rev">
                                            <?php
                                                $string_rag = '';
                                                if ($rag)
                                                {
                                                    for ($i = 1 ; $i <= $rag ; $i ++ )
                                                    {
                                                        $string_rag .= '<i class="fa fa-star"></i>';
                                                    }

                                                    $stop = 5 - $rag ;
                                                    for ($i = 1 ; $i <= $stop ; $i ++ )
                                                    {
                                                        $string_rag .= '<i class="fa fa-star-o"></i>';
                                                    }

                                                }

                                            ?>
                                            {!! $string_rag !!}

                                            <span class="margin-left-10">{{ $rag_count }} Đánh Giá</span></p>
                                        <div class="row">
                                            <div class="col-sm-6"><span class="price">{{ number_format($product->gia,0,",",'.') }} VNĐ</span></div>
                                            <div class="col-sm-6">
                                                <p>Tình Trạng: <span class="in-stock">Còn Hàng</span></p>
                                            </div>

                                        </div>
                                        @php

                                            $dacdiem = \DB::table('tbl_sanpham_loai')
                                                    ->leftJoin('tbl_loai','tbl_loai.id','=','tbl_sanpham_loai.loai_id')
                                                    ->where('sanpham_id',$product->id)
                                                    ->get();

                                        @endphp
                                        @if( $dacdiem )
                                        <ul class="bullet-round-list">
                                            <h6>Đặc điểm loài</h6>
                                            @foreach($dacdiem as $item)
                                                <b>{{ $item->ten_loai }} ({{ $item->ten_khoa_hoc }})</b>
                                                {!! $item->mo_ta !!}
                                            @endforeach
                                        </ul>
                                        @endif



                                        <ul class="cmp-list">
                                            <li><a href="#."><i class="fa fa-clock-o"></i> Ngày đăng {{ $product->created_at ? $product->created_at : Carbon\Carbon::now() }}</a></li>
                                            {{--<li><a href="#."><i class="fa fa-navicon"></i> Add to Compare</a></li>--}}
                                            {{--<li><a href="#."><i class="fa fa-envelope"></i> Email to a friend</a></li>--}}
                                        </ul>

                                        <!-- Quinty -->
                                        <br>
                                        <br>
                                        <div class="quinty">
                                            <input type="number" value="1" disabled>
                                        </div>

                                        <a href="{{ route('cart.add',$product->id) }}" class="btn-round"><i class="icon-basket-loaded margin-right-5"></i> Thêm vào giỏ hàng</a>
                                        <span class="btn btn-xs btn-round"> <i class="fa fa-eye"></i> {{ $product->so_luot_xem }}</span>
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
                                        {!! $product->mo_ta !!}
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
                                            <article> <img style="height: 250px" class="img-responsive" src="{{ asset('sanpham') }}/{{ $ps->ten_hinh }}" alt="" >
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
