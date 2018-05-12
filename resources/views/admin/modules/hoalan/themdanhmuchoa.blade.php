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
        <h3 class="box-title">Thêm loài hoa</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action=""  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
            <div class="col-md-7 col-md-offset-2">
              <div class="col-md-12">
                <div class="col-md-12">
                <label><b>Chi</b></label>
                <select id="" name="id_chi"  class="form-control" required>
                      @foreach ($data as $item)
                        <option value="{{ $item->id }}">{{ $item->ten_chi }}</option>
                      @endforeach
                </select>
               </div>
                <div class="col-md-12">
                <label><b>Tên loài</b></label>
                <input type="text" name="ten_loai" class="form-control" id="chi" required placeholder="">
                </div>
                <div class="col-md-12">
                  <label><b>Tên khoa học</b></label>
                  <input type="text" required name="ten_khoa_hoc" class="form-control" id=chi" placeholder="">
                </div>

                </div>
                <div class="form-group col-md-12">
                  <div class="col-md-12" >
                    <label><b>Đặc điểm</b></label>  
                  </div>
                  <div class="col-md-6">
                    <label><i>Hoa</i></label>
                    <input type="text" value="{{ $dacdiem[0]->hoa }}" required name="hoa" class="form-control" id=dacdiem" placeholder="">
                    
                  </div>
                <div class="col-md-6">
                  <label><i>Lá</i></label>
                  <input type="text" value="{{ $dacdiem[0]->la }}" required name="la" class="form-control" id=dacdiem" placeholder="">
                </div>
                </div>
                
                <div class="col-md-12">
                  <div class="col-md-6">
                  <label><i>Thân</i></label>
                  <input type="text" value="{{ $dacdiem[0]->than }}" required name="than" class="form-control" id=dacdiem" placeholder="">
                </div>
                <div class="col-md-6">
                  <label><i>Rễ</i></label>
                 <input type="text" value="{{ $dacdiem[0]->re }}" required name="re" class="form-control" id=dacdiem" placeholder="">
                </div>
                </div>
                <div class="col-md-12">
                  <div class="col-md-12">
                    <label><i>Thời gian nở</i></label>
                  <input type="text" value="{{ $dacdiem[0]->thoigianno }}" required name="thoigianno" class="form-control" id=dacdiem" placeholder="">  
                  </div>
                  
                </div>
                <div class="col-md-12 form-group" style="padding-top: 20px" >
                  <label for="content" >Mô tả: </label>
                 
                  <textarea style="height: 500px" id="content" ></textarea>
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

                     <button type="submit" style="float: right; padding-right: 25px" class="btn btn-primary">Lưu lại</button>   
            </div>
              
                
              </div>
        
              <div style="clear:both"></div>
            </div>
          </div>
          
         
      </form>
   
    <!-- /.box -->

  
  
  <!--/.col (right) -->
</div>
@endsection




