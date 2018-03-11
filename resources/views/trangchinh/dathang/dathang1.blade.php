@extends('trangchinh.layout.index')

@section('content')

@include('trangchinh.dathang.banner')

<div id="all">

    <div id="content" class="banner_bottom_agile_info">
        <div class="container">

            <div class="col-md-9" id="checkout">

                <div class="box">
                    <form method="post" action="">
                        <h1>ĐỊA CHỈ</h1>
                        <hr>
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>ĐỊA CHỈ</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>PHƯƠNG THỨC VẬN CHUYỂN</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>PHƯƠNG THỨC THANH TOÁN</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>KIỂM TRA ĐƠN HÀNG</a>
                            </li>
                            <br>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Tên:</label>
                                        <input type="text" class="form-control" id="firstname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Họ:</label>
                                        <input type="text" class="form-control" id="lastname">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" id="company">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="street">Đường:</label>
                                        <input type="text" class="form-control" id="street">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="city">Company</label>
                                        <input type="text" class="form-control" id="city">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="zip">ZIP</label>
                                        <input type="text" class="form-control" id="zip">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-control" id="state"></select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="form-control" id="country"></select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Điện Thoại:</label>
                                        <input type="text" class="form-control" id="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="trangchinh/giohang/giohang" class="btn btn-default"><i class="fa fa-chevron-left"></i> Quay Lại </a>
                            </div>
                            <div class="pull-right">
                                <a href="trangchinh/dathang/dathang2" class="btn btn-primary"> Tiếp Tục <i class="fa fa-chevron-right"></i></a>
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