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
      <li><a href="javascript:void(0)">Thêm đặc điểm</a></li>
    </ul><!-- /.breadcrumb -->
  </div>
<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
    <div class="hr hr-18 hr-double dotted"></div>
    <div class="widget-box">
      <div class="widget-header widget-header-blue widget-header-flat" >
        <h4 class="widget-title lighter" >THÊM ĐẶC ĐIỂM </h4>        
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
    <div class="box box-primary">
      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-offset-3">
              <div class="widget-box">
                <div class="widget-header" style="text-align: center;">
                  <h4 class="widget-title">Thông tin đặc điểm</h4>
                  <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                      <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                  </div>
                </div>

                <div class="widget-body" style="background-color: #f7fbff;">
                  <div class="widget-main" style="height: 535px">
                    
                    <div>
                      <div class="col-md-12">
                          <div class="col-md-12">
                            <label for="form-field-8">Hoa</label>
                            <input type="text"  name="hoa" title="Hoa: Thể hiện màu sắc, hình dáng và số cánh hoa,..."  class="form-control" id="chi" value="{{ old('hoa') }}" placeholder="Đặc điểm hoa">  
                          </div>
                      </div>
                    </div>
                    <br>
                    <div>
                      <div class="col-md-12">
                          <div class="col-md-12">
                            <label for="form-field-8">Lá</label>
                            <input type="text" id="form-field-8" title="Lá: Hình dáng lá, màu sắc,..."  name="la"  class="autosize-transition form-control" id="chi" placeholder="Đặc điểm lá" value="{{ old('la') }}"> 
                          </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                              <label for="form-field-8">Thân</label>
                              <input type="text" id="form-field-8" name="than" class="autosize-transition form-control" title="Hình dáng thân" id="chi" placeholder="Đặc điểm thân" value="{{ old('than') }}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                      <div class="col-md-12">
                        <div class="col-md-12">
                          <label for="form-field-8">Rể: </label>
                          <input type="text" id="form-field-8"   name="re" 
                          class="autosize-transition   form-control" id="chi" title="VD: Rễ chùm, rễ cọc,..." placeholder="Đặc điểm rể" value="{{ old('re') }} ">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div>
                      <div class="col-md-12">
                        <div class="col-md-12">
                      <label for="form-field-8">Thời gian nở hoa: </label>
                      <input type="text" id="form-field-8"   name="thoigianno" 
                      class="autosize-transition   form-control" id="thoigianno" title="Thời gian từ lúc hoa nở đến lúc hoa tàn là bao lâu? Người dùng thường chú trọng đến thời gian nở của hoa để chọn loại hoa tốt nhất đem về!" placeholder="Thời gian nở hoa của loài" value="{{ old('thoigianno') }}">
                    </div>

                  </div>

                  <label style="padding-left: 4%; margin-top: 15px" for="">Đặc điểm sinh trưởng</label>
                  <div>
                        <div class="col-md-12">
                          <div class="col-md-6" style="margin-right: 0; ">
                              <label for="dac_diem_sinh_truong"><i>Nhiệt độ</i></label>
                              <input type="text" class="form-control" name="nhiet_do" value="{{ old('nhiet_do') }}" id="re" placeholder="" style="margin-right: 0; ">
                          </div> 
                          <div class="col-md-6" style="margin-right: 0; ">
                              <label for="re"><i>Độ ẩm</i></label>
                              <input type="text" class="form-control" name="do_am" id="re" value="{{ old('do_am') }}" placeholder="" style="margin-right: 0; ">
                          </div>
                          <div class="col-md-6" style="margin-right: 0; ">
                              <label for="re"><i>Ánh sáng</i></label>
                              <input type="text" class="form-control" name="anh_sang" id="re" placeholder="" value="{{ old('anh_sang') }}" style="margin-right: 0; ">
                          </div>
                          <div class="col-md-6" style="margin-right: 0; ">
                              <label for="re"><i>Vấn đề sâu bệnh</i></label>
                              <input type="text" class="form-control" name="van_de_sau_benh" value="{{ old('van_de_sau_benh') }}" id="re" placeholder="" style="margin-right: 0; ">
                          </div>
                        </div>
                      </div>
                  <br>                    
                  </div>
                      <button type="submit" class="btn btn-white btn-primary" style="float: right; margin-top: 15px; margin-right: 4.2%"><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Lưu lại</button>
                  </div>
              </div>
            </div><!-- /.span -->
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