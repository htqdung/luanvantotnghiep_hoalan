
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
          <h3><b>DANH SÁCH ĐON HÀNG</b> <button type="" name="in" style="float: right;" >   <i class="  fa fa-print" ></i></button></h3>
          
          <select name="" onchange="window.location=this.value" id="" style="float: right;" >
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
                  <thead>
                  <tr style="margin: 0px">
                    <th style="width: 3%">Stt</th>
                    <th style="width: 20%">Ngày đặt hàng</th>
                    <th style="width: 17%">Tổng tiền  </th>
                  </tr>
                  </thead>
                   <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->ngay_dat_hang)) }}</td>
                   
                    
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
