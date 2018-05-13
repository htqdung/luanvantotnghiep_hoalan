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
          <h4 class="widget-title lighter" >THÊM CHI </h4>
          
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
                  <h4 class="widget-title">Thông tin chi</h4>

                  <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                      <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                  </div>
                </div>

                <div class="widget-body" style="background-color: #f7fbff;">
                  <div class="widget-main">
                    <div>
                      <label for="form-field-8">Tên chi</label>
                      <input type="text"  name="ten_chi"  class="form-control" id="chi" value="{{ old('ten_chi') }}" placeholder="Điền tên chi">
                    </div>
                    <br>
                    <div>
                      <label for="form-field-11">Cánh hoa</label>
                      <textarea type="text" id="form-field-11"  name="canh_hoa"  class="autosize-transition form-control" id="chi" placeholder=""> {{ old('canh_hoa') }} </textarea>
                    </div>
                    <br>
                    <div>
                      <label for="form-field-11">Đài hoa: *</label>
                      <textarea type="text" id="form-field-11"   name="dai_hoa" 
                      class="autosize-transition   form-control" id="chi" placeholder="">{{ old('dai_hoa') }} </textarea>
                    </div>
                    <br>
                    <div>
                      <label for="form-field-11">Bông hoa: *</label>
                      <textarea type="text" id="form-field-11"   name="bong_hoa" 
                      class="autosize-transition   form-control" id="chi" placeholder="">{{ old('bong_hoa') }} </textarea>
                    </div>
                    <br>
                    <div class=" form-group" style="padding-top: 20px" >
                        <label for="content" >Mô tả: </label>
                        <textarea style="height: 500px" rows="20" id="content" > {{ old('mo_ta') }}</textarea>
                        <input type="hidden" name="mo_ta"  id="content2">
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
