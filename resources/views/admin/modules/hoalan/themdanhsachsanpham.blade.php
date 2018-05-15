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
  </div>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">THÊM SẢN PHẨM</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

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
      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">  
          <div class="col-xs-12 col-sm-6 col-md-offset-3">
            <div class="col-md-12">
              <div class="widget-box">
                <div class="widget-header" style="text-align: center;">
                  <h4 class="widget-title">Thông tin sản phẩm</h4>
                  <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                      <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                  </div>
                </div>

                
                <div class="widget-body" style="background-color: #f7fbff;">
                  <div class="widget-main" style="height: 850px">
                    <div>
                      <div class="col-md-12">
                          <div class="col-md-12">
                            <label for="form-field-8">Tên sản phẩm</label>
                            <input type="text"  name="ten_san_pham" title="Ví dụ: chậu lan hồ điệp 12 cành,....."  class="form-control" id="chi" value="{{ old('ten_san_pham') }}" placeholder="Tên sản phẩm">  
                          </div>
                      </div>
                    </div>
                    <br>
                    <div>
                      <div class="col-md-12">
                          <div class="col-md-12">
                            <label for="form-field-8">Thêm các loài hoa</label>
                            <small>* Có thể chọn được nhiều loài</small>
                               <select id="framework" name="framework[]" class="form-control" >                      
                                @foreach ($data as $item)
                                  <option value="{{ $item->id }}">{{ $item->ten_loai }}</option>
                                @endforeach
                               </select>
                          </div>
                        </div>
                    </div>
                    <br>
                  <div>
                        <div class="col-md-12">
                          <div class="col-md-6" style="margin-right: 0; ">
                              <label for="dac_diem_sinh_truong"><i>Đơn giá</i></label>
                              <input type="number" class="form-control" name="gia" value="{{ old('gia') }}" id="re" placeholder="" style="margin-right: 0; ">
                          </div> 
                          <div class="col-md-6" style="margin-right: 0; ">
                              <label for="re"><i>Điểm thưởng</i></label>
                              <input type="number" class="form-control" name="diem_thuong" id="re" value="{{ old('diem_thuong') }}" placeholder="" style="margin-right: 0; ">
                          </div>
                        </div>
                        <div>
                          <div class="col-md-12">
                            <label for="form-field-tags">Tags</label>
                            <div class="col-md-12">
                              <div class="inline">
                                <input type="text" name="tags" id="form-field-tags" value="{{ old('tags') }}" placeholder="Nhập vào tags..." />
                              </div>
                            </div>
                              
                      
                          </div>
                            
                        <div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                             <label for="image">Chọn hình ảnh</label>
                              <input type="file" accept="image/*" class="" name="hinh_anh" id="image" placeholder="" style="margin-right: 0; " >
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                          <div class="col-md-12">
                              <div class="col-md-12 form-group" style="padding-top: 20px" >
                                    <label for="content" >Nội dung chi tiết: </label>
                                   
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
                              </div>    
                          </div>
                          <button type="submit" class="btn btn-white btn-primary" style="float: right; margin-top: 15px; margin-right: 4.2%"><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Lưu lại</button>
                    </div>
                      </div>

                    
                  <br>                    
                  </div>
                   
                    <div>          
                  </div>
                     
                  </div>
              </div>
              </div>
            </div>
                  
              
            </div>
          </div> 
      </form>
    </div>
    <!-- /.box -->

  
  </div>
<script type="text/javascript">
// Get the reference to the input field
var elt = $('#txtSkills');

var skills = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('id'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        url: '{!!url("/")!!}' + '/api/find?keyword=%QUERY%',
      wildcard: '%QUERY%',
    }
});
skills.initialize();
</script>
<script>

$('#txtSkills').tagsinput({
    itemValue : 'id',
    itemText  : 'name',
    maxChars: 200,
    trimValue: true,
    allowDuplicates : false,
    freeInput: false,
    focusClass: 'form-control',
    tagClass: function(item) {
      if(item.display)
       return 'label label-' + item.display;
      else
        return 'label label-default';

    },
    onTagExists: function(item, $tag) {
      $tag.hide().fadeIn();
    },
    typeaheadjs: [{
          hint: false,
                    highlight: true
                  },
                  {
                 name: 'skills',
            itemValue: 'id',
            displayKey: 'name',
            source: skills.ttAdapter(),
            templates: {
                    empty: [
                        '<ul class="list-group"><li class="list-group-item">Nothing found.</li></ul>'
                    ],
                    header: [
                        '<ul class="list-group">'
                    ],
                    suggestion: function (data) {
                        return '<li class="list-group-item">' + data.name + '</li>'
                  }
            }
    }]
});
</script>

<script>

  function noi_chuoi() {
    var dai = "";
    var rong = "";
    var cao = "";
    var tong= "";
    dai = document.getElementById("dai").value;    
    rong = document.getElementById("rong").value;     
    cao = document.getElementById("cao").value;
    tong = dai + "," + rong + "," + cao; 
    document.getElementById("kich_thuoc").value = tong;
  }
  

</script>
  <!--/.col (right) -->

<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>

@endsection