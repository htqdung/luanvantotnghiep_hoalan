@extends('trangchinh.layout.main')
@section('main-content')
    <div id="content">

        <style>
            .sale_custome {
                background: #f73232;
                border-radius: 2px;
                font-size: 10px;
                color: #fff;
                font-weight: 700;
                position: absolute;
                top: 0px;
                padding: 2px;
                right: 0;
            }
        </style>

        <!-- Ship Process 
        <div class="ship-process padding-top-30 padding-bottom-30">
            <div class="container">
                <ul class="row">

                    
                    <li class="col-sm-3 current">
                        <div class="media-left"> <i class="flaticon-shopping"></i> </div>
                        <div class="media-body"> <span>Step 1</span>
                            <h6>Shopping Cart</h6>
                        </div>
                    </li>

                    
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="flaticon-business"></i> </div>
                        <div class="media-body"> <span>Step 2</span>
                            <h6>Payment Methods</h6>
                        </div>
                    </li>

                    
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                        <div class="media-body"> <span>Step 3</span>
                            <h6>Delivery Methods</h6>
                        </div>
                    </li>

                    
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="fa fa-check"></i> </div>
                        <div class="media-body"> <span>Step 4</span>
                            <h6>Confirmation</h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    -->

        <!-- Shopping Cart -->
        <section class="shopping-cart padding-top-30 padding-bottom-60">
            @if ( $products->count() == 0)
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <span>Không có sản phẩm nào trong giỏ hàng <a href="/" style="text-decoration: underline !important;">Về trang chủ </a></span>
                        </div>
                    </div>
                </div>
            @else
                <form method="post" action="">
                    <div class="container">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Số Lượng</th>
                                <th class="text-center">Thành Tiền </th>
                                <th>&nbsp; </th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- Item Cart -->
                            @foreach($products as $key => $item)
                                <tr>
                                    <td><div class="media">
                                            <div class="media-left">
                                                <a href="#." style="position: relative">
                                                    <img class="img-responsive" src="{{ asset('trangchinh_asset/images/') }}/{{ $item->options->hinhanh }}" alt="" >
                                                    @if($item->options->pt_sale)
                                                        <span style="position: absolute" class="sale_custome">{{ $item->options->pt_sale  }} % </span>
                                                    @endif
                                                </a>


                                            </div>
                                            <div class="media-body">
                                                <p>{{ $item->name }}</p>
                                                @if($item->options->pt_sale)
                                                    <span style="font-size:10px;color:red"> Chú ý: <i>Giá đã được giảm  so với giá gốc</i> </span>
                                                @endif
                                            </div>
                                        </div></td>
                                    <td class="text-center padding-top-60">{{ number_format($item->price,0,",",".") }} VNĐ</td>
                                    <td class="text-center"><!-- Quinty -->

                                        <div class="quinty padding-top-20">
                                            <input type="number" value="{{ $item->qty }}" class="form-control price" min="1" name="qty[]">
                                            <input type="hidden" name="rowID[]" value="{{ $key }}">
                                        </div></td>
                                    <td class="text-center padding-top-60">{{ number_format($item->price * $item->qty,0,",",".") }} VNĐ</td>
                                    <td class="text-center padding-top-60"><a href="{{ route('delete.item.cart',$item->rowId) }}"><i class="fa fa-trash-o"></i></a>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <!-- Promotion -->
                        <div class="promo">
                            <!--
                            <div class="coupen">
                                <label> Promotion Code
                                    <input type="text" placeholder="Your code here">
                                    <button type="submit"><i class="fa fa-arrow-circle-right"></i></button>
                                </label>
                            </div>
                            -->

                            <!-- Grand total -->
                            <div class="g-totel">
                                <h5>Tổng tiền : <span>{{ number_format((str_replace(',','',\Cart::subtotal(0))),0,",",".") }} VNĐ</span></h5>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pro-btn">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="/" class="btn-round btn-light">Tiếp tục mua hàng </a>
                            <button  class="btn btn-success" style="background: #4cae4c;border: 1px solid #4cae4c" type="submit"><i class="fa fa-refresh"></i>  Cập nhật giỏ hàng </button>
                            <a href="{{ route('pay') }}" class="btn-round">Tiến hành thanh toán </a>
                        </div>
                    </div>
                </form>
            @endif

        </section>
    </div>

@endsection<!-- Footer -->
