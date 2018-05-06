@extends('admin.layout.index')
@section('main-content')


  <!-- left column -->
<div class="col-md-12" onload=" tach_chuoi() ">
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
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Chỉnh sửa sản phẩm</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
         <div class="box-body">   
          <div style="clear:both"></div>
           <div class="col-md-4">
             <img src="../public/sanpham/<?= $data_hinhanh[0]->ten_hinh; ?>" alt="">
            <label for="image">Chọn hình ảnh</label>
            <input type="file" accept="image/*" class="" value="{{ $data_hinhanh[0]->ten_hinh }}" name="hinh_anh" id="image" placeholder="" style="margin-right: 0; " >
          </div>
          <div class="col-md-8">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label for="sanpham">Tên sản phẩm</label>
                    <input type="text" class="form-control" value="{{ $data_sp[0]->ten_san_pham }}" name="ten_san_pham" id="sanpham" placeholder="" style="margin-right: 0; " >
                
                    <label for="dongia">Đơn giá</label>
                    <input type="number" class="form-control" name="don_gia" value="{{ $data_sp[0]->gia }}" id="dongia" placeholder="" style="margin-right: 0; " >
                           
                    
                    <label for="tags">Tags</label>
                    <input type="hidden" class="form-control" name="tags" id="tags" value="{{ $data_sp[0]->tag }}" placeholder="" style="margin-right: 0; " >
                    <input type="text" class="form-control" id="txtSkills" name = "Skills" data-role="tagsinput">               
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <label for="diemthuong">Điểm thưởng</label>
                    <input type="number" value="{{ $data_sp[0]->diem_thuong }}" class="form-control" name="diem_thuong" id="diemthuong" placeholder="" style="margin-right: 0; " >
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-right: 0; ">
                       <label>Thêm các loài hoa</label>
                       <small>* Có thể chọn được nhiều loài</small>
                       <select id="framework" name="framework[]" class="form-control" >                      
                        
                        <option value="{{$data_dmhoa[0]->id_loai }}">{{ $data_dmhoa[0]->ten_loai }}</option>
                        @foreach ($data as $item)

                          <option value="{{ $item->id }}">{{ $item->ten_khoa_hoc }}</option>
                        @endforeach
                       </select>
                    </div>
                </div>
                
            </div>
            <div  class="form-group">
              <div class="col-md-12 form-group" style="padding-top: 20px" >
                      <label for="content" >Nội dung chi tiết: </label>
                     
                      <textarea style="height: 500px" id="content" >{{ $data_sp[0]->mo_ta }}</textarea>
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
            <div class="box-footer" style="padding-top: 25px">          
              <a class="btn btn-danger" href="{{ route('DANH_SACH_SAN_PHAM') }}">Quay lại</a>
              <button type="submit" class="btn btn-primary"><i class=""></i>Lưu lại</button>
              <button type="reset" class="btn btn-success"><i class=" "></i> Làm mới</button>
            </div>    
          </div>
        </div>
      </form>
    </div>
</div>
<script>
    

</script>
  <!--/.col (right) -->

<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
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
  
  function tach_chuoi() {
    var dai = "";
    var rong = "";
    var cao = "";
    var tong= "";
    var tmp = [];
    tong  = document.getElementById("kich_thuoc").value;
    tmp = document.write(tong.split(",").length);
    for(i=0; i<tmp.length(); i++)
    {
      console.log(tmp[i]);
    }
  }




</script>

@endsection