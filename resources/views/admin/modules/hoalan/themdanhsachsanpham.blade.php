@extends('admin.layout.index')
@section('main-content')


  <!-- left column -->
  <div class="col-md-12">
     <!-- general form elements -->
     <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="# ">Trang chủ</a>
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
        <h3 class="box-title">Thêm sản phẩm</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="">
        <div class="box-body">   
              <div style="clear:both"></div>
          
          <div class="form-group">
            <div class="col-md-12">
            	 <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Id</label>
                    <input type="text" class="form-control" name="id" id="sanpham" placeholder="" style="margin-right: 0; ">
                 </div>  
                 <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="tensanpham" id="sanpham" placeholder="" style="margin-right: 0; ">
                 </div>                  
            </div>
            <div  class="col-md-12">
            	 
                  <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Đơn giá</label>
                    <input type="number" class="form-control" name="dongia" id="sanpham" placeholder="" style="margin-right: 0; ">
                  </div>
                    <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Kích thước</label>
                    <input type="text" class="form-control" name="kichthuoc" id="sanpham" placeholder="" style="margin-right: 0; ">
           			 </div>
            <div  class="col-md-12">
            	  <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Hình thức</label>
                    <input type="text" class="form-control" name="hinhthuc" id="sanpham" placeholder="" style="margin-right: 0; ">
                  </div>
                  
            	  <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <input type="text" class="form-control" name="mota" id="sanpham" placeholder="" style="margin-right: 0; ">
                  </div>
			<div  class="col-md-12">
                 
            	  <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Điểm thưởng</label>
                    <input type="text" class="form-control" name="diemthuong" id="sanpham" placeholder="" style="margin-right: 0; ">
                  </div>
                 
            	  <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Tag</label>
                    <input type="text" class="form-control" name="tag" id="sanpham" placeholder="" style="margin-right: 0; ">
                  </div>
            </div>	
            </div>
          </div> 
               
        <div style="clear: both;"></div>
       
            
      
        <!-- /.box-body -->

        <div class="box-footer" style="padding-top: 25px">          
          <a class="btn btn-danger" href="{{ route('DANH_SACH_SAN_PHAM') }}">Quay lại</a>
          
          <button type="submit" class="btn btn-primary"><i class="fa fa-next faa-pulse animated "></i>Lưu lại</button>
          <button type="reset" class="btn btn-success"><i class="fa  fa-refresh fa-spin"></i> Làm mới</button>
        </div>
      </form>
    </div>
    <!-- /.box -->

  
  </div>
<script>
    

</script>
  <!--/.col (right) -->

<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script >function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }
  
}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for(let i = 0; i < boxes.length; i++) {if (window.CP.shouldStopExecution(1)){break;}
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}
window.CP.exitedLoop(1);




/// drop-effect
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);
  
  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';
    
    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';
    
    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");
    
    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();
    
  }
}

//# sourceURL=pen.js
</script>
@endsection