
@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ</a>
      </li>
    <li><a href="javascript:void(0)">Đơn hàng đang giao</a></li>
    </ul><!-- /.breadcrumb -->

    
  </div>

  <div class="page-content">
    <!-- /.page-header -->
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <h3><b>DANH SÁCH ĐƠN HÀNG</b>  
            <div  >
               <label  style="float: right; margin-right: 350px"><b>Sắp xếp: </b></label>
                    <div class="col-md-12" >
                           
                           <div class="col-md-2"  style="float: right;">
                             <select name="" onchange="window.location=this.value" id="" style="font-size: 0.7em; float: right;" >
                              <option value="{{ route('DANH_SACH_TONG') }} ">Tất cả</option>
                              <option value="{{ route('DANH_SACH_THANG_MOT') }}">Tháng một</option>
                              <option value="{{ route('DANH_SACH_THANG_HAI') }}">Tháng hai</option>
                              <option value="{{ route('DANH_SACH_THANG_BA') }}">Tháng ba</option>
                              <option value="{{ route('DANH_SACH_THANG_TU') }}">Tháng tư</option>
                              <option value="{{ route('DANH_SACH_THANG_NAM') }}">Tháng năm</option>
                              <option value="{{ route('DANH_SACH_THANG_SAU') }}">Tháng sáu</option>
                              <option value="{{ route('DANH_SACH_THANG_BAY') }}">Tháng bảy</option>
                              <option value="{{ route('DANH_SACH_THANG_TAM') }}">Tháng tám</option>
                              <option value="{{ route('DANH_SACH_THANG_CHIN') }}">Tháng chín</option>
                              <option value="{{ route('DANH_SACH_THANG_MUOI') }}">Tháng mười</option>
                              <option value="{{ route('DANH_SACH_THANG_MUOI_MOT') }}">Tháng mười một</option>
                              <option value="{{ route('DANH_SACH_THANG_MUOI_HAI') }}">Tháng mười hai</option>
                            </select>
                          </div>
                             <div class="col-md-2"  style="float: right;">
                             <select name="forma" style="font-size: 0.7em; float: left; " onchange="location = this.value;">
                                <option value=""> Chọn một danh sách</option>
                                <option value="{{ route('TAT_CA_DON_HANG') }}">Tất cả đơn hàng</option>
                                <option value="{{ route('DON_HANG_DA_GIAO') }}">Đã giao hàng</option>
                                <option value="{{ route('DON_HANG_DANG_GIAO') }}">Đang giao</option>
                                <option value="{{ route('DON_HANG_DANG_XU_LY') }}">Đang xử lý</option>
                              </select> 
                           </div>  
                    </div>
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
                       
                         
                          <a style="margin: 0px; padding: 0px; width: 40px" data-toggle="tooltip" title="Hủy" class="btn btn-danger" href="{{-- {{ route('XOA_CHI', $item->id) }} --}}"><i class="fa fa fa-trash-o fa-fw"></i></a>
                     </td>
                </tr> 
                @endforeach           
              </tbody>              
          </table>
          {{ $data->render() }}
      </div>
    </div>
  </div><!-- /.page-content -->
</div>
@endsection
