@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ</a>
      </li>  
      <li><a href="javascript:void(0)">Đơn hàng đang xử lý</a></li> 
    </ul><!-- /.breadcrumb -->
    
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
                    <th style="width: 3%">Stt</th>
                    <th style="width: 20%">Ngày đặt hàng</th>
                    <th style="width: 25%">Địa chỉ</th>
                    <th style="width: 15%">Hình thức thanh toán</th>
                    <th style="width: 10%">Tổng tiền  </th>
                    <th style="width: 10%">Trạng thái  </th>
                    <th style="width: 15%">Chức năng</th>
                  </tr>
                  </thead>
                   <tbody>
                     <?php $i=1; ?>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->ngay_dat_hang)) }}</td>                  
                    <td>{{ $item->so_nha}}, {{ $item->ten_duong }}, {{ $item->ten_phuong_xa }}, {{ $item->ten_quan_huyen}} , {{ $item->ten_tinh_thanhpho }}</td>
                     <td>{{ $item->ten_hinh_thuc}}</td>
                    <td>{{ $item->tong_tien}}</td>
                    <td>{{ $item->ten_trang_thai}}</td>
                    <td>
                        <a style=" margin: 0px; padding: 0px; width: 40px" class="btn btn-success" data-toggle="tooltip" title="Duyệt đơn hàng"  href=""><i class="glyphicon glyphicon-check"></i></a>
                        <a style=" margin: 0px; padding: 0px; width: 40px" class="btn btn-warning" data-toggle="tooltip" title="Chi tiết"  href=""><i class="glyphicon glyphicon-folder-open"></i></a>
                          <a style="margin: 0px; padding: 0px; width: 40px" data-toggle="tooltip" title="Xóa" class="btn btn-danger" href="{{-- {{ route('XOA_CHI', $item->id) }} --}}"><i class="fa fa fa-trash-o fa-fw"></i></a>
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
