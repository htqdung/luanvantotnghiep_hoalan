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
        <h3 class="box-title">Chỉnh sửa chi</h3>
      </div>
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
          <div class="form-group">
             <div class="form-group">
              <div class="col-md-12">
                  <div class="col-md-6">
                  <label>Tên chi</label>
                  <input type="text" value="{{ $data[0]->ten_chi }}" name="ten_chi" class="form-control" id=chi" placeholder="">
                </div>
                <div class="col-md-6">
                  <label>Cánh hoa</label>
                  <input type="text" value="{{ $data[0]->canh_hoa }}" name="canh_hoa" class="form-control" id=chi" placeholder="">
                </div>
              </div>
              <div class="col-md-12">
                  <div class="col-md-6">
                    <label>Đài hoa</label>
                    <input type="text" value="{{ $data[0]->dai_hoa }}" name="dai_hoa" class="form-control" id=chi" placeholder="">
                  </div>
              <div class="col-md-6">
                <label>Bông hoa</label>
                <input type="text" value="{{ $data[0]->bong_hoa }}" name="bong_hoa" class="form-control" id=chi" placeholder="">
              </div>
              </div>
              
              <div class="col-md-12 form-group" style="padding-top: 20px" >
                  <label for="content" >Mô tả:  </label>
                 
                  <textarea style="height: 500px" id="content" >{{ $data[0]->mo_ta }}</textarea>
                  <input type="hidden" name="mo_ta" id="content2">
                  <script src="../vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                  <script>
                      
                      var editor = CKEDITOR.replace( 'content' );

                      // The "change" event is fired whenever a change is made in the editor.
                      editor.on('change', function( evt ) {
                          
                          var content = evt.editor.getData();
                          $("#content2").val(content);
                      });
                  </script>
             </div>  
              <div style="clear:both"></div>
            </div>
                     
          </div>
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          
          <button type="submit" style="float: right;" class="btn btn-primary"> <i class="" ></i> Lưu lại</button>
          
        </div>
      </form>
   
    <!-- /.box -->

  
  
  <!--/.col (right) -->
</div>
@endsection
