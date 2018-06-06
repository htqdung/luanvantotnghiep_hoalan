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
                          <input type="text" name="ten_nguoi_dung" required class="form-control" id=chi" placeholder="">{{ old('ten') }}  
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
                          <label for="ten_loai"><b>Tỉnh\Thành phố:</b></label>
                          <select  id="province_id" name="tinhthanhpho[]" onchange="provChange()" class="select2 col-md-12" multiple="multiple" class="form-control">
                          </select>                        
                        </div>
                        <div class="col-md-12">
                          <label for="ten_loai"><b>Quận\Huyện:</b></label>
                          <input type="text" name="ten_quan_huyen" class="form-control" id=chi" placeholder="">{{ old('ten_quan_huyen') }}
                        </div>
                        <div class="col-md-12">
                            <label for="ten_loai"><b>Phường\Xã:</b></label>
                            <input type="text" name="ten_phuong_xa" class="form-control" id=chi" placeholder="">{{ old('ten_phuong_xa') }}
                        </div>
                        <div class="col-md-4">
                            <label for="ten_loai"><b>Số nhà:</b></label>
                            <input type="text" name="so_nha" class="form-control" id=chi" placeholder="">{{ old('so_nha') }}
                        </div>
                        <div class="col-md-8">
                            <label for="ten_loai"><b>Tên đường:</b></label>
                            <input type="text" name="ten_duong" class="form-control" id=chi" placeholder="">{{ old('ten_duong') }}
                        </div>
                        
                        
                    </div>
                    <br>
                    <div>
                      <div class="col-md-4">
                        <label for="form-field-11"><b>Số điện thoại: </b></label>
                        <input type="number" name="so_dien_thoai" class="form-control" id=chi" placeholder="">{{ old('so_dien_thoai') }}
                      </div>
                      <br>
                      <div class="col-md-8">
                        <label for="content" ><b>Email: </b></label>
                         <input type="text" name="email" class="form-control" id=chi" placeholder="">{{ old('email') }}
                         
                      </div>
                    </div>
                    <br>
                  </div>

                </div>

                <button type="submit" class="btn btn-primary btn_luu_lai_nd" > Lưu lại</button>
              </div>
            </div><!-- /.span -->
          </div>
        </div>
        
      </form>
</div>
<script>
  $('#click').on('click', function(e){
    $('#myModal').modal('show');
    e.preventDefault();
  });
</script>

{{-- <script type="text/javascript">
  function provChange(){
    var province = $("#province_id").val();
    $.ajax({
      url: "/"+province+"/<?php //echo $this->request->data('Car.city_id'); ?>",cache: false,
      success: function(msg){$("#city_id").html(msg); },
      "statusCode": {
        403: function() {
          window.location.href="<?php //echo $this->Html->url(array('controller'=>'front','action'=>'index')); ?>"
        },
        500: function() {
          alert('Error Server Side occured');
        }
      }
    });
  }
</script> --}}

@endsection



















