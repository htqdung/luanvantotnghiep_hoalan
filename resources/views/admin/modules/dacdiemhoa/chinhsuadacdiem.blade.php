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
        <h3 class="box-title">Chỉnh sửa đặc điểm</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
             <div class="form-group">
              <div class="col-md-6">
                <label>Hoa</label>
                <input type="text" value="{{ $data[0]->hoa }}"   name="hoa" class="form-control" id=dacdiem" placeholder="">
              </div>
               <div class="col-md-6">
                <label>Lá</label>
                <input type="text" value="{{ $data[0]->la }}"  name="la" class="form-control" id=dacdiem" placeholder="">
              </div>
               <div class="col-md-6">
                <label>Thân</label>
                <input type="text" value="{{ $data[0]->than }}"  name="than" class="form-control" id=dacdiem" placeholder="">
              </div>
              <div class ="col-md-6" >
                <label for="exampleInputEmail1">Rể</label>
                <input type="text" value="{{ $data[0]->re }}"  name="re" class="form-control" id="dacdiem" placeholder="">
              </div>
        
              <div style="clear:both"></div>
            </div>
                     
          </div>
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-danger" href="{{ route('DAC_DIEM_HOA') }}">Quay lại</a>
          <button type="submit" class="btn btn-primary"> <i class="fa fa-save faa-pulse animated "></i> Lưu lại</button>
          <button type="reset" class="btn btn-success">Làm mới</button>
        </div>
      </form>
   
    <!-- /.box -->

  
  
  <!--/.col (right) -->
</div>
@endsection
