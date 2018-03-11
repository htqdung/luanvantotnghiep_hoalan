@extends('trangchinh.layout.index')

@section('content')

@include('trangchinh.dathang.banner')

<div id="all">

    <div id="content" class="banner_bottom_agile_info">
        <div class="container">

            <div class="col-md-9" id="checkout">

                <div class="box">
                    <form method="post" action="">
                        <h1>PHƯƠNG THỨC THANH TOÁN</h1>
                        <hr>
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="trangchinh/dathang/dathang1"><i class="fa fa-map-marker"></i><br>ĐỊA CHỈ</a>
                            </li>
                            <li><a href="trangchinh/dathang/dathang2"><i class="fa fa-truck"></i><br>PHƯƠNG THỨC VẬN CHUYỂN</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-money"></i><br>PHƯƠNG THỨC THANH TOÁN</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>KIỂM TRA ĐƠN HÀNG</a>
                            </li>
                            <br>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>Thanh Toán Trước</h4>

                                        <p><br>Thanh toán trước khi giao hàng.</p>

                                        <div class="box-footer text-center">

                                            <input type="radio" name="payment" value="payment1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>Thanh Toán Khi Nhận Hàng</h4>

                                        <p><br>Thanh toán khi nhận được hàng.</p>

                                        <div class="box-footer text-center">

                                            <input type="radio" name="payment" value="payment2">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="trangchinh/dathang/dathang2" class="btn btn-default"><i class="fa fa-chevron-left"></i> Quay Lại </a>
                            </div>
                            <div class="pull-right">
                                <a href="trangchinh/dathang/dathang4" class="btn btn-primary"> Tiếp Tục <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            @include('trangchinh.dathang.thanhtoan')

            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

@endsection