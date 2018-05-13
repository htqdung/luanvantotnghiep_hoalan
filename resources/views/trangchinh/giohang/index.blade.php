@extends('trangchinh.layout.main')
@section('main-content')
    <div id="content">

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
                                    <div class="media-left"> <a href="#."> <img class="img-responsive" src="{{ asset('trangchinh_asset/images/') }}/{{ $item->options->hinhanh }}" alt="" > </a> </div>
                                    <div class="media-body">
                                        <p>{{ $item->name }}</p>
                                    </div>
                                </div></td>
                            <td class="text-center padding-top-60">{{ number_format($item->price,0,",",".") }} VNĐ</td>
                            <td class="text-center"><!-- Quinty -->

                                <div class="quinty padding-top-20">
                                    <input type="number" value="{{ $item->qty }}" class="form-control" name="qty[]">
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
        </section>
    </div>

@endsection<!-- Footer -->
