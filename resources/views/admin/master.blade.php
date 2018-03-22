@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Trang chủ</a>
            </li>
        </ul>
        <!-- /.breadcrumb -->
        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                        <input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
            </form>
        </div>
        <!-- /.nav-search -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>Trang chủ
                    
                </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                    <div class="space-12"></div>
                    <div class="infobox-container">
                        <div class="infobox infobox-blue">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-user"></i>
                            </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number">11</span>
                                <div class="infobox-content"> <a href="#">NGƯỜI DÙNG</a></div>
                            </div>
                        </div>
                        <div class="infobox infobox-pink">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-shopping-cart"></i>
                            </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number">8</span>
                                <div class="infobox-content"> <a href="#">ĐƠN HÀNG</a></div>
                            </div>
                        </div>
                        <div class="infobox infobox-red">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-money"></i>
                            </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number">7</span>
                                <div class="infobox-content"><a href="#">DOANH THU</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="vspace-12-sm"></div>
                </div>
                <!-- /.row -->
                <div class="hr hr32 hr-dotted"></div>
                <!-- PAGE CONTENT ENDS -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <h3><b>ĐƠN HÀNG GẦN ĐÂY</b></h3>
                    <thead>
                        <tr>
                            <th style="width: 5%">Id</th>
                            <th style="width: 10%">Ngày hóa đơn</th>
                            <th style="width: 5%">Chiết khấu</th>
                            <th style="width: 10%"> Ngày giao</th>
                            <th style="width: 40%">Địa chỉ giao hàng</th>
                            <th style="width: 10%">Trạng thái</th>
                            <th style="width: 20%">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>4/3/2018</td>
                            <td>0</td>
                            <td>5/3/2018</td>
                            <td>45,võ trường toản,an hòa,ninh kiều, cần thơ</td>
                            <td>Đang giao</td>
                            <td style="padding: 0">
                                <a href="#" class="btn btn-info">Xem chi tiết</a>
                                <a href="#" class="btn btn-danger">Hủy</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>4/3/2018</td>
                            <td>0</td>
                            <td>4/3/2018</td>
                            <td>48,võ trường toản,an hòa,ninh kiều, cần thơ</td>
                            <td>Đang xử lý</td>
                            <td style="padding: 0">
                                <a href="#" class="btn btn-info">Xem chi tiết</a>
                                <a href="#" class="btn btn-danger">Hủy</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.page-content -->
</div>

@endsection