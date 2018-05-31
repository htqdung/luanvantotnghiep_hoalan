@extends('admin.layout.index')
@section('main-content')
  <!-- left column -->
  <div class="col-md-12">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ</a>
        </li>
      <li><a href="javascript:void(0)">Chi tiết sản phẩm</a></li>
      </ul><!-- /.breadcrumb -->

      
    </div>
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="box-header with-border">
        <h2 class="box-title" style="color: #2B7DBC" >Chi tiết sản phẩm
          <a style="float: right; padding: 0px; margin-left: 5px" class="btn btn-success" href="{{ route('DANH_SACH_SAN_PHAM') }}">
          <i class="fa fa-hand-o-left"></i>  Quay lại</a>
        </h2>
       </div>  
      </div>
      <!-- /.box-header -->
      <div class="box-body">
            <div class="row">
              <div class="col-md-12">
              <div class="col-md-4" style="margin-left: 0px;">
                      <ul class="ace-thumbnails clearfix">
                        @foreach($data_hinhanh as $item)
                        <li>
                          <a href="public/sanpham/<?php echo $item->ten_hinh; ?>" title="Photo Title" data-rel="colorbox">
                            <img width="150" height="150" alt="150x150" src="/public/sanpham/<?= $item->ten_hinh; ?>" />
                          </a>
                         
                        </li>
                        @endforeach
                      </ul>
                    </div>
              <div class="col-md-8" style = "padding-top: 25px">
                <div class="">
                  <table class="table">
                    <thead>
                        @foreach ($data_sp as $data)
                         
                        <tr>
                          <th style="width: 30%">Tên sản phẩm: </th>
                         <td>{{ $data->ten_san_pham }}</td>
                        </tr>
                        <tr>
                          <th style="width: 30%">Giá: </th>
                         <td><?= number_format($data->gia); ?>VND</td>
                        
                        </tr>
                       {{--  <tr>
                          <th style="width: 30%">Số lượng: </th>
                         <td>{{ $data_hoa->so_luong }}</td>
                        </tr> --}}
                        <tr>
                          <th style="width: 30%">Điểm thưởng: </th>
                         <td>{{ $data->diem_thuong }}</td>
                        </tr>
                        
                       
                        @endforeach
                        
                       
                    </thead>
                    <tbody>
                                  
                    </tbody> 
                  </table>  
                </div> 
              </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              <h2 style="color: #2B7DBC">Mô tả</h2>
              <?= $data->mo_ta; ?>
                </div>
            </div>
    <div class="row">
      <div class="col-md-12">
         
        <table class="table">
          <h3><b>DANH SÁCH ĐÁNH GIÁ</b>  <div  style="margin-left: 80%">
                   
                </div>
          </h3>
                  <thead>
                  <tr style="margin: 0px">
                    <th style="width: 5%">Mã số</th>
                    <th style="width: 15%">Tên người dùng</th>
                    <th style="width: 15%">Điểm đánh giá</th>                 
                    <th style="width: 30%">Nội dung</th>
                    <th style="width: 10%">Ngày đánh giá</th>
                    
                  </tr>
                  </thead>
                   <tbody>
                    
                @foreach ($data_danhgia as $item)
                  <tr>
                    <td>{{ $item->id_danhgia }}</td>
                    <td>{{ $item->ten}}</td>
                    <td>{{ $item->danh_gia}}</td>
                    <td>{{ $item->noi_dung}}</td>
                    <td>{{ date('d-m-Y', strtotime($item->ngay_danh_gia)) }}</td>
                </tr> 
                @endforeach           
              </tbody>              
          </table>
      </div>
    </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!--/.col (right) -->
@endsection







