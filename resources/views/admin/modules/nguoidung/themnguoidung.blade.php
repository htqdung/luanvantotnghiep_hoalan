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
          <h4 class="widget-title lighter" >THÊM NGƯỜI DÙNG </h4>
          
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
              <div class="widget-box height_500">
                <div class="widget-header" style="text-align: center;">
                  <h4 class="widget-title">Thông tin người dùng</h4>
                  <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                      <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                  </div>
                </div>

                <div class="widget-body" style="background-color: #f7fbff;">
                  <div class="widget-main height_500">
                    <div>
                        <div class="col-md-12 form-group">
                          <label><b>Tên người dùng:</b></label>
                          <input type="text" name="ten" required class="form-control" id=chi" placeholder="">{{ old('ten') }}  
                        </div>
                       
                      
                       <div class="col-md-6 form-group">
                          <label><b>Tên đăng nhập:</b></label>
                          <input type="text" name="username" class="form-control" required id=chi" placeholder="">{{ old('username') }}  
                        </div>
                        <div class="col-md-6 form-group">
                          <label><b>Khởi tạo mật khẩu:</b></label>
                          <div class="input-group">
                            <input type="text" name="password" required class="custom-file-input form-control" id="randompass">
                            <span class="input-group-btn">
                            <script>
                              function btnrandom1() {
                                  var randomstring = Math.random().toString(36).slice(-8);
                                  
                                  document.getElementById("randompass").value = randomstring;
                              }
                            </script>
                              <button class="btn btn-default" onclick="btnrandom1()" name="btnrandom" style="margin: -3px;padding: 3px;" type="button">Ngẫu nhiên!</button>
                              
                            </span>
                          </div><!-- /input-group -->
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12 row">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label for="province_id"><b>Tỉnh\Thành phố:</b></label>
                          <select  id="province_id" name="tinhthanhpho[]" class="select2 col-md-12" class="form-control">
                            @foreach ($tinhthanhpho as $element)
                                <option value="{{ $element->id }}">{{ $element->ten_tinh_thanhpho }}</option>
                            @endforeach
                          </select>                        
                        </div>
                        <div class="col-md-12" >
                          <label for="district"><b>Quận\Huyện:</b></label>
                          <select  id="district" name="quanhuyen" class="select2 col-md-12" class="form-control"></select>
                        </div>
                        <div class="col-md-12">
                            <label for="ward_id"><b>Phường\Xã:</b></label>
                            <select  id="ward_id" name="phuongxa"  class="select2 col-md-12" class="form-control"></select>
                        </div>
                        <div class="col-md-4">
                            <label for="ten_loai"><b>Số nhà:</b></label>
                            <input type="text" name="so_nha" class="form-control" id=chi" placeholder="">{{ old('so_nha') }}
                        </div>
                        <div class="col-md-8">
                            <label for="ten_loai"><b>Tên đường:</b></label>
                            <input type="text" name="ten_duong" class="form-control" id=chi" placeholder="">{{ old('ten_duong') }}
                        </div>
                        <div class="col-md-4">
                          <label for="form-field-11"><b>Số điện thoại: </b></label>
                          <input type="number" name="so_dien_thoai" class="form-control" id=chi" placeholder="">{{ old('so_dien_thoai') }}
                        </div>
                        <div class="col-md-8">
                          <label for="content" ><b>Email: </b></label>
                           <input type="text" name="email" class="form-control" id=chi" placeholder="">{{ old('email') }}
                        </div>
                      </div>
                <button type="submit" class="btn btn-primary btn_luu_lai_nd" > Lưu lại</button>
            </div><!-- /.span -->
          </div>
        
    </form>
</div>
<script>
  $('#click').on('click', function(e){
    $('#myModal').modal('show');
    e.preventDefault();
  });
</script>

<script type="text/javascript">
  //load quan theo tinh thanh pho
function load_district() {
    $("#province_id").change(function() {
        var path = 'ajax-quan-huyen/' + $(this).val();
        console.log(path);
        $.ajax({
            url: path,
            type: 'GET'
        })
        .done(function (response) {
            var lam = new String(); // khoi tao bien luu pha hien thi len view
            response.forEach(function (data) {
                lam += '<option value="' + data.id + '">' + data.ten_quan_huyen +'</option>';
                // console.log(data);
            })
            $('#district').html(lam);
        })
    })
}
// load ward
function load_ward() {
    $("#district").change(function() {
        var path = 'ajax-phuong-xa/' + $(this).val();
        $.ajax({
            url: path,
            type: 'GET'
        })
        .done(function (response) {
            var lam = new String(); // khoi tao bien luu pha hien thi len view
            response.forEach(function (data) {
                lam += '<option data-longtitude="' + data.longtitude + '" data-latitude="' + data.latitude + '" value="' + data.id + '">' + data.ten_phuong_xa +'</option>';
            })
            $('#ward_id').html(lam);
        })
    })
}

    
$(document).ready(function () {
    
    load_district();
    load_ward();
    
})
</script>

@endsection



















