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
        <h3 class="box-title">Chỉnh sửa ưu đãi</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
             <div class="form-group">
              <div class="col-md-6">
                <label>Tên hình thức</label>
                <input type="text"  value="{{ $uudai[0]->ten_hinh_thuc }}" name="ten_hinh_thuc" class="form-control" id=uudai" placeholder="">
              </div>
               <div class="col-md-6">
                <label>Tên sản phẩm</label>
                <input type="text"  value="{{ $uudai[0]->ten_san_pham }}" name="ten_san_pham" class="form-control" id=uudai" placeholder="">
              </div>
              <div class="col-md-6">
                <label>Số lượng</label>
                <input type="number"  value="{{ $uudai[0]->so_luong_toi_thieu }}" name="so_luong" class="form-control" id=uudai" placeholder="">
              </div>
              <div class ="col-md-6" >
                <label for="exampleInputEmail1">Tỉ lệ giảm</label>
                <input type="number"  value="{{ $uudai[0]->ti_le_giam_gia }}" name="ti_le_giam_gia" class="form-control" id="uudai" placeholder="">
              </div>
        
              <div style="clear:both"></div>
            </div>
                     
          </div>
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-danger" href="{{ route('DANH_SACH_UU_DAI') }}">Quay lại</a>
          <button type="submit" class="btn btn-primary"> <i class="fa fa-save faa-pulse animated "></i> Lưu lại</button>
          <button type="reset" class="btn btn-success">Làm mới</button>
        </div>
      </form>
   
    <!-- /.box -->

  
  
  <!--/.col (right) -->
</div>
@endsection
