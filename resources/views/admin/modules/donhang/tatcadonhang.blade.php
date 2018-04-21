@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
          <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ</a>
      </li>   
    </ul><!-- /.breadcrumb -->
    <div class="nav-search" id="nav-search">
      <form class="form-search">
        <span class="input-icon">
          <input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
          <i class="ace-icon fa fa-search nav-search-icon"></i>
        </span>
      </form>
    </div><!-- /.nav-search -->
  </div>
  <div class="page-content">
    <!-- /.page-header -->
    <div class="row">
      <div class="col-md-12">
         
        <table class="table">
          <h3><b>DANH SÁCH ĐƠN HÀNG</b>  <div  style="margin-left: 80%">
                    <label><b>Sắp xếp</b></label>
                      <select name="forma" style="font-size: 0.7em;" onchange="location = this.value;">
                        <option value=""> Chọn một danh sách</option>
                        <option value="{{ route('TAT_CA_DON_HANG') }}">Tất cả đơn hàng</option>
                        <option value="{{ route('DON_HANG_DA_GIAO') }}">Đã giao hàng</option>
                        <option value="{{ route('DON_HANG_DANG_GIAO') }}">Đang giao</option>
                        <option value="{{ route('DON_HANG_DANG_XU_LY') }}">Đang xử lý</option>
                      </select> 
                </div>
          </h3>
                  <thead>
                  <tr style="margin: 0px">
                    <th style="width: 3%">ID</th>
                    <th style="width: 20%">Ngày đặt hàng</th>
                    <th style="width: 30%">Địa chỉ</th>
                    <th style="width: 15%">Hình thức thanh toán</th>
                    <th style="width: 17%">Tổng tiền  </th>
                    <th style="width: 15%">Trạng thái  </th>
                    <th colspan="3">Chức năng</th>
                  </tr>
                  </thead>
                   <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->ngay_dat_hang)) }}</td>                 
                    <td>{{ $item->so_nha}}, {{ $item->ten_duong }}, {{ $item->ten_phuong_xa }}, {{ $item->ten_quan_huyen}} , {{ $item->ten_tinh_thanhpho }}</td>
                     <td>{{ $item->hinh_thuc_thanh_toan}}</td>
                    <td>{{ $item->tong_tien}}</td>
                    <td>{{ $item->ten_trang_thai}}</td>
                    <td>
                      <a style="margin-right: 0px; padding: 0px; width: 100px" class="btn btn-info" href="#"><i class="fa fa-cog fa-1x fa-fw"></i>Chỉnh sửa</a>
                    </td>
                    <td>
                      <a style="padding-left:10px; padding: 0px; margin:0px; width: 100px" class="btn btn-warning" href="#"><i class="glyphicon glyphicon-folder-open"></i>Chi tiết</a>
                    </td>                    <td>
                      <a style="margin: 0px; padding: 0px; width: 100px" class="btn btn-danger" href="#"><i class="fa fa-close fa-1x fa-fw"></i>Xóa</a>
                    </td>
                </tr> 
                @endforeach           
              </tbody>              
          </table>
      </div>
    </div>
  </div><!-- /.page-content -->
</div>
@endsection
