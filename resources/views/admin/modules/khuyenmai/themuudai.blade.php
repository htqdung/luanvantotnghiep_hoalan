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
        <h3 class="box-title">Thêm ưu đãi</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
             <div class="form-group">
              <div class="col-md-12">
                <div class="col-md-6">
                  <label>Tên ưu đãi</label>
                  <input type="text" name="ten_hinh_thuc" class="form-control" id=ten_hinh_thuc" placeholder="">
                </div>
                <div class="col-md-6">
                    <label>Tên sản phẩm</label>
                    <select name="ten_san_pham" class="form-control">
                      @foreach ($data as $element)
                        <option value="{{ $element->id_sanpham }}">{{ $element->ten_san_pham }}</option>
                      @endforeach
                    </select>
                    
                </div>
              </div>
              <div class="col-md-12">
                  
                  <div class="col-md-6">
                    <label>Số lượng</label>
                    <input type="number" name="so_luong_toi_thieu" class="form-control" placeholder="">
                  </div> 
                  <div class ="col-md-6" >
                    <label for="exampleInputEmail1">Tỉ lệ giảm</label>
                    <input type="number" name="ti_le_giam_gia"  class="form-control" id="ti_le_giam_gia" placeholder="%">
                  </div>
              </div> 
              <div style="clear:both"></div>
            </div>
                     
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
