
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

    
  </div>

  <div class="page-content">
    <!-- /.page-header -->
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <h3><b>DANH SÁCH ĐƠN HÀNG</b> </h3>
          
            <select name="" onchange="window.location=this.value" id="" style="float: right;" >
            <option value="{{ route('DANH_SACH_TONG') }}"> Tất cảt</option>  
            <option value="{{ route('DANH_SACH_THANG_MOT') }}"> Tháng một</option>
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
                  <thead>
                  <tr style="margin: 0px">
                    <th style="width: 3%">Mã số</th>
                    <th style="width: 20%">Ngày đặt hàng</th>
                    <th style="width: 25%">Địa chỉ</th>
                    <th style="width: 15%">Hình thức thanh toán</th>
                    <th style="width: 10%">Tổng tiền  </th>
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
                </tr> 
                @endforeach           
              </tbody>              
          </table>
      </div>
    </div>
  </div><!-- /.page-content -->
</div>
<script type="text/javascript">
function goto_url(url)
{
if(url!='0')
window.open(''+url+'');
}

</script>
@endsection
