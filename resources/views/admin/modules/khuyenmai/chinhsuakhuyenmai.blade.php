@extends('admin.layout.index')
@section('main-content')

  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
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
      <div class="box-header with-border">
        <h3 class="box-title">Chỉnh sửa khuyến mại</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action=""  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
             <div class="form-group">
              <div class="col-md-6">
                <label>Tên khuyến mại</label>
                <input type="text" name="ten_hinh_thuc" value="{{ $data[0]->ten_hinh_thuc }}" class="form-control" id=ten_hinh_thuc" placeholder="">
              </div>
              <div class="col-md-6">
                <label>Ngày bắt đầu</label>

                <input type="date" name="ngay_bat_dau" value="{{ date("Y_m_d"),strtotime($data[0]->ngay_bat_dau) }}" class="form-control" id="ngay_bat_dau" placeholder="">
              </div>
              <div class="col-md-6">
                <label>Ngày kết thúc</label>
                <input type="date" name="ngay_ket_thuc" value="{{ $data[0]->ngay_ket_thuc }}" class="form-control" id="ngay_ket_thuc" placeholder="">
              </div>
              <div class ="col-md-6" >
                <label for="exampleInputEmail1">Tỉ lệ giảm (%)</label>
                <input type="text" name="ti_le_giam_gia" value="{{ $data[0]->ti_le_giam_gia }}" class="form-control" id="ti_le_giam_gia" placeholder="">
              </div>
        
              <div style="clear:both"></div>
            </div>
                     
          </div>
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-danger" href="{{ route('DANH_SACH_KHUYEN_MAI') }}">Quay lại</a>
          <button type="submit" class="btn btn-primary">  Lưu lại</button>
          <button type="reset" class="btn btn-success">Làm mới</button>
        </div>
      </form>
   
    <!-- /.box -->

  
  
  <!--/.col (right) -->
</div>
@endsection
