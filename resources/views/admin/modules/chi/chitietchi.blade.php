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
          <a style="float: right; padding: 0px; margin-left: 5px" class="btn btn-warning" href="{{ route('DANH_SACH_CHi') }}"><i class=""></i>Quay lại</a>
         
        </div>
      <div class="box-header with-border">
        <h3 class="box-title">Chi tiết chi</h3>

      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
             <div class="form-group">
              <div class="col-md-12">
                <div class="col-md-6" style="padding-top: 14px">
                <label for="chi"><b>Tên chi:</b> {{ $data[0]->ten_chi}}</label>
                
                </div>

                <div class="col-md-6" style="padding-top: 14px">
                <label for="chi"><b>Cánh hoa:</b> {{ $data[0]->canh_hoa}}</label>
                
               </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-6" style="padding-top: 14px">
                <label for="chi"><b>Đài hoa:</b> {{ $data[0]->dai_hoa}}</label>
                
                </div> 
                <div class="col-md-6" style="padding-top: 14px">
                <label for="chi"><b>Bông hoa:</b> {{ $data[0]->bong_hoa}}</label>
               
              </div>               
              </div>
             <div class="col-md-12 form-group" style="padding-top: 20px" >
                  <label for="content" ><b>Mô tả:</b><?= $data[0]->mo_ta;?> </label>
            </div>  
              <div style="clear:both"></div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
       
      </form>
   
    <!-- /.box -->

  
  
  <!--/.col (right) -->
</div>
@endsection
