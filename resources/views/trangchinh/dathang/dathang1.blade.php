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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="firstname">Họ Tên:</label>
                                        <input style="margin-bottom: 20px" type="text" class="form-control" id="firstname">
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="lastname">Số Điện Thoại:</label>
                                        <input style="margin-bottom: 20px" type="text" class="form-control" id="lastname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="email">Email:</label>
                                        <input style="margin-bottom: 20px" type="text" class="form-control" id="email">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="company">Tỉnh/Thành Phố:</label>
                                        <select style="margin-bottom: 20px" class="form-control" id="state"></select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="street">Quận/Huyện:</label>
                                        <select style="margin-bottom: 20px" class="form-control" id="state"></select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="city">Phường/Xã:</label>
                                        <select style="margin-bottom: 20px" class="form-control" id="state"></select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="zip">Địa Chỉ</label>
                                        <input style="margin-bottom: 20px" type="text" class="form-control" id="zip">
                                    </div>
                                </div>
                            <!-- /.row -->

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="state">Ghi Chú:</label>
                                        <textarea type="text" class="form-control" id="zip" rows="8" cols="95"></textarea>
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