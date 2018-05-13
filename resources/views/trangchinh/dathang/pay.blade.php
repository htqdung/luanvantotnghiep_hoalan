@extends('trangchinh.layout.main')
@section('main-content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-offset-2" id="checkout">
                    <div class="box">
                        <form method="post" action="{{ route('postPay')}}">
                            <input type="hidden" name="_token" value="FDdIS7CIYENM0wVwg6uIlwWnCgQRLGrdW0tGfktJ">
                        <form method="post" action="{{ route('postPay') }}">
                            <h3 class="wthree_text_info" style="color: #35478C; margin-top: 20px; margin-bottom: 10px; text-align: left;">THÔNG TIN GIAO HÀNG</h3>
                            <hr>
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label style="margin-bottom: 10px" for="firstname">Họ Tên:</label>
                                            <input style="margin-bottom: 20px" required="" name="ten" value="{{ $users->tbl_thongtinlienhe->ten }}" type="text" class="form-control" id="firstname">
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label style="margin-bottom: 10px" for="lastname">Số Điện Thoại:</label>
                                            <input style="margin-bottom: 20px" required="" name="so_dien_thoai" value="{{ $users->tbl_thongtinlienhe->so_dien_thoai }}" type="text" class="form-control" id="lastname">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label style="margin-bottom: 10px" for="email">Email:</label>
                                            <input style="margin-bottom: 20px" required="" name="email" value="{{ $users->tbl_thongtinlienhe->email }}" type="text" class="form-control" id="email">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label style="margin-bottom: 10px" for="company">Tỉnh/Thành Phố:</label>
                                            <select style="margin-bottom: 20px" required="" class="form-control city" id="state" name="city">
                                                <option value="">--Chọn tỉnh thành phố --</option>
                                                <option value="1">Cần Thơ</option>
                                                <option value="2">Sóc Trăng</option>
                                                <option value="3">Kiên Giang</option>
                                                <option value="4">Thành Phố Hồ Chí Minh</option>
                                                <option value="5">Hà Nội</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label style="margin-bottom: 10px" for="street">Quận/Huyện:</label>
                                            <select style="margin-bottom: 20px" required="" class="form-control district" id="state" name="district"></select>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label style="margin-bottom: 10px" for="city">Phường/Xã:</label>
                                            <select style="margin-bottom: 20px" required="" class="form-control wards" id="state" name="wards"></select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label style="margin-bottom: 10px" for="zip">Địa Chỉ</label>
                                            {{--<input style="margin-bottom: 20px" required="" type="text" name="address px"  class="form-control" id="zip">--}}
                                            <select style="margin-bottom: 20px" required="" class="form-control px" id="state" name="address"></select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label style="margin-bottom: 10px" for="city"> Tên Người Nhận </label>
                                            <input style="margin-bottom: 20px" required="" class="form-control" name="ten_nguoi_nhan" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label style="margin-bottom: 10px" for="zip">Hình Thức Thanh Toán</label>
                                            <select style="margin-bottom: 20px" required="" class="form-control"  name="hinh_thuc_thanh_toan">
                                                <option value="Nhận hàng gủi tiền">Nhận Hàng Khi Thanh Toán </option>
                                                <option value="Chuyển khoản">Chuyển Khoản </option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <!-- /.row -->
                                <div class="box-footer clearfix">
                                    <div class="text-center" style="margin-bottom: 40px">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <a href="/" class="btn btn-default"  style="background: #337ab7;border: 1px solid #337ab7"><i class="fa fa-chevron-left"></i> Quay Lại </a>
                                        <button type="submit" class="btn btn-primary" style="background: #337ab7;border: 1px solid #337ab7"> Đặt Hàng <i class="fa fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>

        
    </div>

@endsection<!-- Footer -->
