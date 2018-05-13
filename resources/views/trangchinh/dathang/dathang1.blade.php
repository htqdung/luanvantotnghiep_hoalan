@extends('trangchinh.layout.index')
@section('content')
@include('trangchinh.dathang.banner')

<div id="all">

    <div id="content" class="banner_bottom_agile_info">
        <div class="container">

            <div class="col-md-9" id="checkout">
                <div class="box">
                    <form method="post" action="{{ route('postPay') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h3 class="wthree_text_info" style="color: #35478C; margin-top: 5px; margin-bottom: 40px; text-align: left;">THÔNG TIN GIAO HÀNG</h3>
                        <hr>
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>ĐỊA CHỈ <br> GIAO HÀNG</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>PHƯƠNG THỨC <br> VẬN CHUYỂN</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>PHƯƠNG THỨC <br> THANH TOÁN</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>KIỂM TRA <br> ĐƠN HÀNG</a>
                            </li>
                            <br>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="firstname">Họ Tên:</label>
                                        <input style="margin-bottom: 20px" required name="ten" value="{{ old('ten') }}" type="text" class="form-control" id="firstname">
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="lastname">Số Điện Thoại:</label>
                                        <input style="margin-bottom: 20px" required name="so_dien_thoai" value="{{ old('so_dien_thoai') }}" type="text" class="form-control" id="lastname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="email">Email:</label>
                                        <input style="margin-bottom: 20px" required name="email" value="{{ old('email') }}" type="text" class="form-control" id="email">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="company">Tỉnh/Thành Phố:</label>
                                        <select style="margin-bottom: 20px" required class="form-control city" id="state" name="city">
                                            <option value="">--Chọn tỉnh thành phố --</option>
                                            @foreach($tinhthanhp as $tp)
                                                <option value="{{ $tp->id }}">{{ $tp->ten_tinh_thanhpho }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="street">Quận/Huyện:</label>
                                        <select style="margin-bottom: 20px" required class="form-control district" id="state" name="district" ></select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="city">Phường/Xã:</label>
                                        <select style="margin-bottom: 20px" required class="form-control wards" id="state" name="wards"></select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="zip">Địa Chỉ</label>
                                        <input style="margin-bottom: 20px" required type="text" name="address" class="form-control" id="zip">
                                    </div>
                                </div>
                            <!-- /.row -->

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="margin-bottom: 10px" for="state">Ghi Chú:</label>
                                        <textarea type="text" required class="form-control" name="messages" id="zip" rows="8" cols="95"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="/" class="btn btn-default"><i class="fa fa-chevron-left"></i> Quay Lại </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary"> Thanh toán <i class="fa fa-chevron-right"></i></button>
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
</div>

@endsection


