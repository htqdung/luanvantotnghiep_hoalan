@extends('trangchinh.layout.main')
@section('main-content')
    <style>
        .active a{ color: red}
    </style>
    <div id="content">
        <!-- Products -->
        <section class="padding-top-40 padding-bottom-60">
            <div class="container">
                <div class="row">
                    <!-- Shop Side Bar -->
                    <div class="col-md-3">
                        <div class="shop-side-bar">
                            <!-- Categories -->
                            <div>
                                <h6>Danh mục</h6>
                                <div class="checkbox checkbox-primary">
                                    <ul>
                                        @php $loai_sp = \App\Loai::all(); @endphp
                                        @foreach($loai_sp as $sp)
                                            <li class="{{ Request::segment(2) == str_slug($sp->ten_loai).'-'.$sp->id.'.html' ? 'active' : ''  }}" >
                                                <a href="{{ \App\Helpers\Url::addParams(['loai' => $sp->id]) }}">{{ $sp->ten_loai }}</a>
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>
                            </div>

                            <!-- Categories -->
                            <h6>Giá </h6>
                            <!-- PRICE -->
                            <div class="checkbox checkbox-primary">
                                <ul>
                                    <li class="<?= \Request::get('price') == '<1' ? 'active' : '' ?>">
                                        <a href="<?= \App\Helpers\Url::addParams(['price' => '<1']) ?>">    </a>
                                    </li>
                                    <li class="<?= \Request::get('price') == '0-3'   ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '0-3']) ?>"> 0đ - 300.000đ  </a></li>
                                    <li class="<?= \Request::get('price') == '3-5'   ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '3-5']) ?>"> 300.000 đ -  500.000 đ  </a></li>
                                    <li class="<?= \Request::get('price') == '5-8'   ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '5-8']) ?>"> 500.000đ - 800.000đ  </a></li>
                                    <li class="<?= \Request::get('price') == '8-1tr'   ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '8-1tr']) ?>"> 800.000đ - 1.000.000 đ  </a></li>
                                    <li class="<?= \Request::get('price') == '>1tr'   ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '>1tr']) ?>"> > 1.000.000 đ  </a></li>

                                </ul>
                            </div>

                            <h6> Lọc giá tuỳ chọn</h6>
                            <!-- PRICE -->
                            <div class="checkbox checkbox-primary">
                                <form action="">
                                    Từ <input type="number" name="min_price" class="form-control" value="{{ Request::get('min_price') }}" placeholder="0"><br>
                                    Đến <input type="number" name="max_price" class="form-control" value="{{ Request::get('max_price') }}"  placeholder="1.000.000">
                                    <input type="submit" value=" Lọc " class="btn btn-success" style="background: #337ab7;padding: 7px 10px ">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Products -->
                    <div class="col-md-9">
                        <!-- Short List -->
                        <div class="short-lst">
                            {{--							<h2>{{ $loai->ten_loai }}</h2>--}}
                            <ul>
                                <!-- Short List -->
                                <li>
                                    <p>Hiển thị {{ $products->currentPage() }}– {{ $products->perPage() }} trong {{ $products->total() }} kết quả</p>
                                </li>
                                <!-- Short  -->

                            </ul>
                        </div>
                        <!-- Items -->
                        <div class="item-col-4">
                            <!-- Product -->
                            @foreach($products as $pro)
                                @php

                                    $rag = \DB::table('tbl_danhgia')->where('sanpham_id',$pro->id)->avg('danh_gia');
                                    $rag_count = \DB::table('tbl_danhgia')->where('sanpham_id',$pro->id)->count();

                                @endphp
                                <div class="product">
                                    <article> <img style="height: 170px" class="img-responsive" src="{{ asset('trangchinh_asset/images') }}/{{ $pro->ten_hinh }}" alt="" >
                                        <!-- Content -->
                                        <a href="{{ route('frontend.chitiet',[str_slug($pro->ten_san_pham),$pro->id]) }}" class="tittle" style="margin-top: 10px">{{ $pro->ten_san_pham }}</a>
                                        <!-- Reviews -->
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

                                            <span class="margin-left-10">{{ $rag_count }} Đánh Giá</span>
                                        </p>
                                        <div class="price">{{ number_format($pro->gia,0,",",".") }}đ</div>
                                        <a href="{{ route('cart.add',$pro->id) }}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                                </div>
                        @endforeach

                        <!-- Product -->

                            <!-- pagination -->
                        </div>
                        <div class="clearfix col-sm-12 text-center">
                            {!! $products->appends($query)->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection<!-- Footer -->
