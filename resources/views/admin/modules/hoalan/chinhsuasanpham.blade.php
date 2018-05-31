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
    <li><a href="javascript:void(0)">Chỉnh sửa sản phẩm</a></li>
    </ul><!-- /.breadcrumb -->
  </div>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">CHỈNH SỬA SẢN PHẨM</h3>
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
          <div class="col-md-8 col-md-offset-2 ">
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
                  <div class="widget-main" style="height: 1250px">
                    <div class="col-md-12 form-group">
                      <label for="form-field-8">Tên sản phẩm</label>
                      <input type="text" required  name="ten_san_pham" title="Ví dụ: chậu lan hồ điệp 12 cành,....."  class="form-control" id="ten_san_pham" value="{{ $data_sp->ten_san_pham }}" placeholder="Tên sản phẩm">  
                    </div>
                    <div class="col-md-12">
                      <label for="form-field-8">Thêm các loài hoa</label>
                      <small>* Có thể chọn được nhiều loài</small>
                         <br> 
                         <select  id="framework" name="themloai[]" class="select2 col-md-12" multiple="multiple" class="form-control">
                          @foreach ($data_dmhoa2 as $item2)
                              @foreach ($data_dmhoa as $item)
                              

                                @if($item2->loai_id  == $item->loai_id)
                                <option selected="selected" value="{{ $item2->loai_id }}">{{ $item->ten_loai }}</option>
                                @else
                                <option value="{{ $item2->loai_id  }}">{{ $item2->ten_loai }}</option>
                                @endif
                              @endforeach
                          @endforeach
                         </select>
                    </div>
                    
                    <div class="col-md-6 form-group" >
                        <label for="gia"><i>Đơn giá</i></label>
                        
                        @foreach ($data_gia as $element)                            
                            <input type="hidden" value="{{ $element->dongia_id }}" name="dongia_id">
                            <input type="number" min="0" class="form-control" name="gia" value="{{ $element->gia }}" id="gia" placeholder="" style="margin-right: 0; ">
                        @endforeach
                        
                    </div> 
                    <div class="col-md-6 form-group" >
                        <label for="diem_thuong"><i>Điểm thưởng</i></label>
                        <input type="number" class="form-control" name="diem_thuong" id="diem_thuong" min="0" max="100" value="{{ $data_sp->diem_thuong }}"placeholder="" style="margin-right: 0; ">
                        <small hidden="hidden" id = "diem_thuong_gioi_y" style="font-size: 0.85em; color: red">Điểm thưởng gợi ý!</small>
                    </div>
                    <script>
                         $("#gia").on("input change onlick",function(e){
                          var diem_thuong = ($("#gia").val()/100000)*1;
                          // alert(diem_thuong);
                          $("#diem_thuong").val(Math.round( diem_thuong ));
                          $('#diem_thuong_gioi_y').removeAttr('hidden');
                          });
                    </script>
                    <div class="col-md-12 form-group" style="margin-right: 0; ">
                        <label for="kich_thuoc"><i>Kích thước</i></label>
                        <input type="text" required="required" class="form-control" name="kich_thuoc" id="kich_thuoc" value="{{ $data_sp->kich_thuoc }}" placeholder="" style="margin-right: 0; ">
                    </div>

                    <label for="form-field-tags" style="padding-left: 8px;">Tags</label>
                    <div class="col-md-12">
                      <div class="inline">
                        <input type="text" name="ten_tags" id="form-field-tags" value=" 
                          @foreach($data_tags as $item)
                               {{ $item->ten_tags }},
                          @endforeach
                          " placeholder="Nhập vào tags..." />
                      </div>
                    </div>
                    <div class="col-md-12 form-group" style="padding-top: 20px" >
                      <label for="content" >Nội dung chi tiết: </label>
                      <textarea style="height: 500px" id="content" >{{ $data_sp->mo_ta }}</textarea>
                      <input type="hidden" name="mo_ta" value=" {{ $data_sp->mo_ta }}"  id="content2">
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
                    <div class="col-md-12" style="margin-left: 0px;">
                  
                            <div class="widget-box">
                              <div class="widget-header">
                                <h4 class="widget-title">Chọn ảnh</h4>
                              </div>
                            <br>
                            
                            <div>                               
                              <div class="col-xs-12">
                                <input multiple="multiple" type="file" name="ten_hinh[]"  class="form-control" id="id-input-file-3" />
                              </div>
                                <label>
                                  <input type="checkbox" name="" id="ten_hinh" class="ace" />
                                  <span class="lbl"> Chọn ảnh</span>
                                  <input type="number"  value="" placeholder="Nhập chiều dài ảnh" name="ngang">
                                  <input type="number"  value="" placeholder="Nhập chiều dọc ảnh" name="doc">
                                  <br><small><i>Lưu ý: </i> Kích cỡ ảnh mặc định 1170 x 500, Chọn kích cỡ ảnh dùng để hiển thị slider ảnh</small>
                                </label>
                            </div>                             
                           </div>
                           <br>
                      <ul class="ace-thumbnails clearfix">
                        @foreach($data_hinhanh as $item)
                        <li>
                          <a href="/public/sanpham/<?php echo $item->ten_hinh; ?>" title="Photo Title" data-rel="colorbox">
                            <img width="150" height="150" alt="150x150" src="/public/sanpham/<?= $item->ten_hinh; ?>" />
                          </a>
                          <div class="tools">
                            <a href="{{ route('XoaAnhSanPham', $item->id ) }}">
                              <i class="ace-icon fa fa-times red "  id="delete()"></i>
                            </a>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                   
                    <button type="submit" class="btn btn-white btn-primary" style="float: right; margin-top: 15px; margin-right: 4.2%"><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Lưu lại</button>
                  </div>

              </div>
              
            </div>
          </div>
          
        
            
      </form>
    </div>
  </div>
    <!-- /.box -->

  
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
