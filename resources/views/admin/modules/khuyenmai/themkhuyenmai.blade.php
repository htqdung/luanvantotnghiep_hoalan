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
          <h4 class="widget-title lighter" >THÊM KHUYẾN MẠI </h4>
          
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
                  <h4 class="widget-title">Thông tin khuyến mãi</h4>
                  <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                      <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                  </div>
                </div>

                <div class="widget-body" style="background-color: #f7fbff;">
                  <div class="widget-main">
                    <div>
                      <label for="form-field-8">Tên khuyến mãi</label>
                      <input type="text"  name="ten_chuong_trinh"  class="form-control" id="chi" value="{{ old('ten_chuong_trinh') }}" placeholder="Điền tên khuyến mãi">
                    </div>
                    <br>
                    <div>
                      <label for="form-field-11">Tỉ lệ giảm giá (%)</label>
                      <input type="number"  name="ti_le_giam"  class="form-control" id="chi" value="{{ old('ti_le_giam') }}" placeholder="">
                    </div>
                    <br>
                    <div>
                      <label for="form-field-8">Tên sản phẩm</label>
                      <select  id="framework"  name="ten_san_pham[]" class="select2 col-md-12" multiple="multiple" class="form-control">
                      @foreach ($data as $item)
                        <option value="{{ $item->id_sanpham }}">{{ $item->ten_san_pham }}</option>
                      @endforeach
                     </select>
                    </div>
                    <br>
                    <div>
                      <label for="form-field-11">Ngày bắt đầu</label>
                      <input type="date"  name="ngay_bat_dau"  class="form-control" id="chi" value="{{ old('ngay_bat_dau') }}" placeholder="">
                    </div>
                    <br>
                    <div>
                      <label for="form-field-11">Ngày kết thúc</label>
                      <input type="date"  name="ngay_ket_thuc"  class="form-control" id="chi" value="{{ old('ngay_ket_thuc') }}" placeholder="">
                    </div>
                    <br>
                    
                  <div>
                      <img src="http://localhost:8080/luanvantotnghiep_hoalan/public/admin/assets/images/avatars/avatar2.png" alt="">
                    <br>
                  <label for="image">Chọn hình ảnh</label>
                  <input type="file" accept="image/*" class="" name="thangcho" id="image" placeholder="" style="margin-right: 0; " >
                  </div>  
                  <div class="form-group">
                    <label for="">Chọn kích cỡ ảnh</label>
                    <input type="number" value="1366" title="Nhập vào chiều ngang. Ví dụ: 1366px" name="ngang" >
                    <input type="number" value="400" title="Nhập vào chiều dọc. Ví dụ: 1366px" name="doc" >
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
