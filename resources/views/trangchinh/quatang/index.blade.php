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
                                        <a href="<?= \App\Helpers\Url::addParams(['price' => '<1']) ?>"> Bé hơn 1tr đồng   </a>
                                    </li>
                                    <li class="<?= \Request::get('price') == '1-3'   ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '1-3']) ?>"> 1.000.000đ - 3.000.000đ  </a></li>
                                    <li class="<?= \Request::get('price') == '3-5'   ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '3-5']) ?>"> 3.000.000đ - 5.000.000đ  </a></li>
                                    <li class="<?= \Request::get('price') == '5-7'   ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '5-7']) ?>"> 5.000.000đ - 7.000.000đ  </a></li>
                                    <li class="<?= \Request::get('price') == '7-10'  ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '7-10']) ?>"> 7.000.000đ - 10.000.000đ </a></li>
                                    <li class="<?= \Request::get('price') == '10-15' ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '10-15']) ?>"> 10.000.000đ - 15.000.000đ </a></li>
                                    <li class="<?= \Request::get('price') == '15-20' ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '15-20']) ?>"> 15.000.000đ - 20.000.000đ </a></li>
                                    <li class="<?= \Request::get('price') == '20'    ? 'active' : '' ?>"><a href="<?= \App\Helpers\Url::addParams(['price' => '20']) ?>"> Trên 20.000.000 đ </a></li>
                                </ul>
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
                                <div class="product">
                                    <article> <img class="img-responsive" src="{{ asset('trangchinh_asset/images') }}/{{ $pro->ten_hinh }}" alt="" >
                                        <!-- Content -->
                                        <a href="{{ route('frontend.chitiet',[str_slug($pro->ten_san_pham),$pro->id]) }}" class="tittle" style="margin-top: 10px">{{ $pro->ten_san_pham }}</a>
                                        <!-- Reviews -->
                                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Đánh Giá</span></p>
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
