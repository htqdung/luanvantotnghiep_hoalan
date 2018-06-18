@extends('admin.layout.index')
@section('main-content')

<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href=" {{ route('MO_GIAO_DIEN_ADMIN') }} ">Trang chủ</a>
      </li><li><a href="javascript:void(0)">Danh sách người dùng thường</a></li>
    </ul><!-- /.breadcrumb -->
  </div>
  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <div class="hr hr-18 hr-double dotted"></div>
      <div class="widget-box">
        <div class="widget-header widget-header-blue widget-header-flat" style="text-align: center;">
          <h4 class="widget-title lighter" >DANH SÁCH NGƯỜI DÙNG</h4>
        </div>
      </div>
    </div><!-- /.col -->
  </div>
  <div class="page-content">
    <!-- /.page-header -->
    <div class="box box-primary">

      <div class="row">
        <div class="col-md-12">
          <table class="table" id="myTable">
           
                   <tbody>
                  
                @foreach ($data as $item)
                  <tr>
                   
                </tr> 
                @endforeach   
               <thead>
                  <tr style="margin: 0px">
                    <th style="width: 7%">Mã số</th>
                    <th style="width: 20%">Họ tên</th>
                    <th style="width: 15%">Số điện thoại</th>
                    <th style="width: 15%">Email</th>
                    <th style="width: 30%">Địa chỉ </th>
                    <th style="width: 10%">Chức năng</th>
                  
                  </tr>
                  </thead>
              <tbody>
                <?php $i=0 ?>
                @foreach ($data as $item)
                    <tr>
                      <td>{{ $item->id_nguoidung }}</td>
                    <td>{{ $item->ten}}</td>
                    <td>{{ $item->so_dien_thoai}}</td>
                    <td>{{ $item->email}}</td>
                    <td>{{ $item->so_nha}}, {{ $item->ten_duong }}, {{ $item->ten_phuong_xa }}, {{ $item->ten_quan_huyen}} , {{ $item->ten_tinh_thanhpho }}</td>
                      <td>
                        <a style=" margin: 0px; padding: 0px; width: 40px" class="btn btn-warning" data-toggle="tooltip" href="{{ route('CHI_TIET_NGUOI_DUNG',$item->id_nguoidung) }}" title="Chi tiết"  href=""><i class="fa fa-eye fa-fw"></i></a>
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
</div>
@endsection





