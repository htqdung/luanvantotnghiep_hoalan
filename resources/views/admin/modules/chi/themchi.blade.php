@extends('admin.layout.index')
@section('main-content')

  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
     <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="# ">Trang chủ</a>
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
        <h3 class="box-title">Thêm chi</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
             <div class="form-group">
              <div class="col-md-12" style="padding-top: 14px">
                <label for="chi">Tên chi: *</label>
                <input type="text"  name="ten_chi"  class="form-control" id="chi" placeholder="Điền tên chi">
              </div>
              <div class ="col-md-12" style="padding-top: 14px">
                <label for="chi_mota">Mô tả: *</label>
                <textarea name="mo_ta" rows="10" cols="50" class="form-control" id="chi_mota" placeholder="Mô tả về loài chi này...."></textarea>
              </div>
              <div style="clear:both"></div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a class="btn btn-danger" href="{{ route('DANH_SACH_CHi') }}">Quay lại</a>
          <button type="submit" class="btn btn-primary"> Lưu lại</button>
          <button type="reset" class="btn btn-success">Làm mới</button>
        </div>
      </form>
   
    <!-- /.box -->

  
  
  <!--/.col (right) -->
</div>
@endsection
