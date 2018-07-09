@extends('admin.layout.index')
@section('main-content')
  <div class="col-md-12">
    <!-- general form elements -->
     <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ</a>
      </li>
    
    </ul><!-- /.breadcrumb -->
  </div>
  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <div class="hr hr-18 hr-double dotted"></div>
      <div class="widget-box">
        <div class="widget-header widget-header-blue widget-header-flat" >
          <h4 class="widget-title lighter" >THÊM QUÀ TẶNG </h4>
          
        </div>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
     
      @if(!empty($errors->first()))
          <div class=" error row col-lg-12" >
              <div class="alert alert-danger">
                  <span>{{ $errors->first() }}</span>
              </div>
          </div>
      @endif
      <script >
       $(document).ready(function () {          
              setTimeout(function() {
                  $('.error').slideUp("slow");
              }, 5000);
      });
      </script>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">

          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-offset-3">
              <div class="widget-box">
                <div class="widget-header" style="text-align: center;">
                  <h4 class="widget-title">Thông tin quà tặng</h4>
                  <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                      <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                  </div>
                </div>

                <div class="widget-body" style="background-color: #f7fbff;">
                  <div class="widget-main">
                    <div>
                      <label>Tên quà tặng</label>
                      <input type="text" name="ten_qua_tang" value="{{ old('ten_qua_tang') }}" class="form-control" id="ten_qua_tang" placeholder="Nhập tên quà tặng" required="">
                    </div>
                    <br>
                    <div>
                      <label for="form-field-11">Số lượng</label>
                      <input type="number" min="0"  name="so_luong"  class="form-control" id="so_luong" value="{{ old('so_luong') }}" placeholder="Nhập số lượng quà tặng" required="">
                    </div>
                    <br>
                    <div>
                      <label for="form-field-11">Chương trình khuyến mại</label>
                      <select  id="state" multiple="multiple"  name="chuongtrinh_id[]" class="col-xs-9 col-sm-12 form-control col-md-12 col-lg-12 select2" data-placeholder="Chọn chương trình khuyến mại" required="">
                          @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->ten_chuong_trinh }}</option>
                          @endforeach
                      </select>
                    </div>               
                  </div>

                </div>

                <button type="submit" class="btn btn-primary" style="float: right;"> Lưu lại</button>
              </div>
            </div><!-- /.span -->
          </div>
        </div>
        
      </form>
</div>
@endsection








