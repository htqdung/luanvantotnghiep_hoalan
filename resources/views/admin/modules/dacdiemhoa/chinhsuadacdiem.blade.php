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
              <div class="col-md-12">
                  <div class="col-md-6">
                  <label><b>Hoa</b></label>
                  <input type="text" value="{{ $data[0]->hoa }}"   name="hoa" class="form-control" id=dacdiem" placeholder="">
                </div>
                 <div class="col-md-6">
                  <label><b>Lá</b></label>
                  <input type="text" value="{{ $data[0]->la }}"  name="la" class="form-control" id=dacdiem" placeholder="">
                </div>
                 
              </div>
                <div class="col-md-12">
                  <div class="col-md-4">
                  <label><b>Thân</b></label>
                  <input type="text" value="{{ $data[0]->than }}"  name="than" class="form-control" id=dacdiem" placeholder="">
                </div>
                  <div class ="col-md-4" >
                  <label for="exampleInputEmail1"><b>Rể</b></label>
                  <input type="text" value="{{ $data[0]->re }}"  name="re" class="form-control" id="dacdiem" placeholder="">
                </div>
                <div class ="col-md-4" >
                  <label for="exampleInputEmail1"><b>Thời gian nở</b></label>
                  <input type="text" value="{{ $data[0]->thoigianno }}"  name="thoigianno" class="form-control" id="dacdiem" placeholder="">
                </div>
              </div>
              <?php
                  $du_lieu_chua_cat = $data[0]->dac_diem_sinh_truong;
                  $du_lieu_se_cat[] = explode(',',$du_lieu_chua_cat);
                  $nhiet_do = $du_lieu_se_cat[0][0];
                  $anh_sang = $du_lieu_se_cat[0][1];
                  $do_am = $du_lieu_se_cat[0][2];
                  $sau_benh = $du_lieu_se_cat[0][3];

              ?>


              <div class ="col-md-12" >
                <label for="exampleInputEmail1"><b>Đặc điểm sinh trưởng</b></label>
              </div>
              <div class ="col-md-12" >
                <div class ="col-md-3" >
                <label for="exampleInputEmail1"><i>Nhiệt độ</i></label>
                <input type="text" value="<?= $nhiet_do;  ?>"  name="nhiet_do" class="form-control" id="dacdiem" placeholder="">
              </div>
              <div class ="col-md-3" >
                <label for="exampleInputEmail1"><i>Độ ẩm</i></label>
                <input type="text" value="<?= $do_am;  ?>"  name="do_am" class="form-control" id="dacdiem" placeholder="">
              </div>
              <div class ="col-md-3" >
                <label for="exampleInputEmail1"><i>Ánh sáng</i></label>
                <input type="text" value="<?= $anh_sang;  ?>"  name="anh_sang" class="form-control" id="dacdiem" placeholder="">
              </div>
              <div class ="col-md-3" >
                <label for="exampleInputEmail1"><i>Vấn đề sâu bệnh</i></label>
                <input type="text" value="<?=  $sau_benh; ?>"  name="saubenh" class="form-control" id="dacdiem" placeholder="">
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
