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
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Thêm đặc điểm</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">   
          <div style="clear:both"></div>
            <div class="col-md-9 col-md-offset-2">
              <div class="col-md-12">
                  <div class="col-md-4" style="margin-right: 0; ">
                    <label for="hoa"><b>Hoa</b></label>
                    <input type="text" class="form-control" name="hoa" id="hoa" placeholder="" style="margin-right: 0; ">
                  </div>  
                  <div class="col-md-4" style="margin-right: 0; ">
                    <label for="la"><b>Lá</b></label>
                    <input type="text" class="form-control" name="la" id="la" placeholder="" style="margin-right: 0; ">
                  </div> 
                  <div class="col-md-4" style="margin-right: 0; ">
                      <label for="than"><b>Thân</b></label>
                      <input type="text" class="form-control" name="than" id="than" placeholder="" style="margin-right: 0; ">
                  </div>               
              </div>
                    
              <div class="col-md-12">
                <div class="col-md-6" style="margin-right: 0; ">
                    <label for="re"><b>Rể</b></label>
                    <input type="text" class="form-control" name="re" id="re" placeholder="" style="margin-right: 0; ">
                  </div>
                <div class="col-md-6" style="margin-right: 0; ">
                  <label for="thoigianno"><b>Thời gian nở</b></label>
                  <input type="text" class="form-control" name="thoigianno" id="thoigianno" placeholder="" style="margin-right: 0; ">
                </div>
              </div>
              <div class="col-md-12" style="margin-right: 0; ">
                  <div class="col-md-12" style="padding-top: 10px">
                    <label for="dac_diem_sinh_truong"><b>Đặc điểm sinh trưởng:</b></label> 
                  </div>
                   
              </div>
              <div class="col-md-12">
                <div class="col-md-3" style="margin-right: 0; ">
                    <label for="dac_diem_sinh_truong"><i>Nhiệt độ</i></label>
                    <input type="text" class="form-control" name="nhiet_do" id="re" placeholder="" style="margin-right: 0; ">
                </div> 
                <div class="col-md-3" style="margin-right: 0; ">
                    <label for="re"><i>Độ ẩm</i></label>
                    <input type="text" class="form-control" name="do_am" id="re" placeholder="" style="margin-right: 0; ">
                </div>
                <div class="col-md-3" style="margin-right: 0; ">
                    <label for="re"><i>Ánh sáng</i></label>
                    <input type="text" class="form-control" name="anh_sang" id="re" placeholder="" style="margin-right: 0; ">
                </div>
                <div class="col-md-3" style="margin-right: 0; ">
                    <label for="re"><i>Vấn đề sâu bệnh</i></label>
                    <input type="text" class="form-control" name="van_de_sau_benh" id="re" placeholder="" style="margin-right: 0; ">
                </div>
              </div>
              <div class="col-md-12">
                <div style=" padding-top:  50px; padding-left: 46px" class="col-md-offset-10" >
                  <input type="submit" class="btn btn-success" value="Lưu lại">
                </div>  
              </div>
            </div>
        
        <div class="box-footer" style ="padding-top: 25px">          
          
          
         
         
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