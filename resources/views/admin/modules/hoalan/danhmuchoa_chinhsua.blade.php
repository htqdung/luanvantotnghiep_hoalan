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
        <h3 class="box-title">Chỉnh sửa loài hoa</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action=""  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
             <div class="form-group">
              <div class="col-md-6">
                <label>Tên loài</label>
                <input type="text" value="{{ $data->ten_loai }}"  name="ten_loai" class="form-control" id=loai" placeholder="">
              </div>
              <div class="col-md-6">
                <label>Tên khoa học</label>
                <input type="text" value="{{ $data->ten_loai }}" name="ten_khoa_hoc" class="form-control" id=loai" placeholder="">
              </div>
              <div class="col-md-6">
                <label>Đặc điểm</label>
                <select id="" name="dacdiem_id"  class="form-control" required>
                      
                      @foreach ($dacdiem as $item)
                        <option value="{{ $item->id }}">Hoa: {{ $item->hoa }}, Lá: {{ $item->la }}, Thân: {{ $item->than }}, Rễ:{{ $item->re }} </option>
                      @endforeach
                      
                      
                 </select>
              </div>
              <div class="col-md-6">
                <label>Chi</label>
                <select id="" name="id_chi"  class="form-control" required>
                      
                      @foreach ($chi as $item)
                        <option value="{{ $item->id }}">{{ $item->ten_chi }}</option>
                      @endforeach
                      
                      
                 </select>
              </div>
              <div class="col-md-12">
                <label>Mô tả</label>
                <textarea  rows="10" cols="50" class="form-control" name="mo_ta">{{ $data->ten_loai }}</textarea>
              </div>
              
        
              <div style="clear:both"></div>
            </div>
                     
          </div>
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-danger" href="{{ route('DANH_MUC_HOA') }}">Quay lại</a>
          <button type="submit" class="btn btn-primary"></i> Lưu lại</button>
          <button type="reset" class="btn btn-success">Làm mới</button>
        </div>
      </form>
   
    <!-- /.box -->

  
  
  <!--/.col (right) -->
</div>
@endsection




