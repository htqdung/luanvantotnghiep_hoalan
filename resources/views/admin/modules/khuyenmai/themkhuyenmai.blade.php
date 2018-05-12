@extends('admin.layout.index')
@section('main-content')

  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
     <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="{{ route('MO_GIAO_DIEN_ADMIN') }} ">Trang chủ</a>
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
        <h3 class="box-title">Thêm khuyến mại</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">

              
              <div class="col-md-4"> 
                  <img src="http://localhost:8080/luanvantotnghiep_hoalan/public/admin/assets/images/avatars/avatar2.png" alt="">
                    <br>
                  <label for="image">Chọn hình ảnh</label>

                  <input type="file" accept="image/*" class="" name="ten_hinh_anh" id="image" placeholder="" style="margin-right: 0; " >
                </div>
              <div class="col-md-8">
                  <div class="form-group">
                  <label>Tên chương trình</label>
                  <input type="text" name="ten_chuong_trinh"  class="form-control" id=chi" placeholder="Nhập vào tên khuyến mãi" >
                </div>
                <div class ="form-group" >
                  <label for="exampleInputEmail1">Tỉ lệ giảm</label>
                  <input type="number" name="ti_le_giam" class="form-control" id="chi" placeholder="% giảm giá">
                </div>
                <div class="form-group">
                  <label>Ngày bắt đầu</label>
                  <input type="date" name="ngay_bat_dau" class="form-control" id=chi" placeholder="">
                </div>
                <div class="form-group">
                  <label>Ngày kết thúc</label>
                  <input type="date" name="ngay_ket_thuc" class="form-control" id=chi" placeholder="">
                </div>
              </div>
              <div style="clear:both"></div>
            
                     
          </div>
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" style="float: right;" class="btn btn-primary"> Lưu lại</button>
        </div>
      </form>
   
    <!-- /.box -->

  
  
  <!--/.col (right) -->
</div>
@endsection
