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
      <li><a href="javascript:void(0)">Chỉnh sửa loài hoa</a></li>
    </ul><!-- /.breadcrumb -->
  </div>
<div class="row">
  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
    <div class="hr hr-18 hr-double dotted"></div>
    <div class="widget-box">
      <div class="widget-header widget-header-blue widget-header-flat" >
        <h4 class="widget-title lighter" >CHỈNH SỬA LOÀI HOA </h4>        
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
                  <h4 class="widget-title">Thông tin loài hoa</h4>
                  <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                      <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                  </div>
                </div>

                <div class="widget-body" style="background-color: #f7fbff;">
                  <div class="widget-main" style="height: 700px">
                    
                    <div>
                      <div class="col-md-12">
                          <div class="col-md-12">
                            <label>Tên loài</label>
                              <input type="text" value="{{ $loai[0]->ten_loai }}"  name="ten_loai" class="form-control" id=loai" placeholder="">  
                          </div>
                      </div>
                    </div>
                    <br>
                    <div>
                      <div class="col-md-12">
                          <div class="col-md-12">
                            <label>Tên khoa học</label>
                              <input type="text" value="{{ $loai[0]->ten_khoa_hoc }}" name="ten_khoa_hoc" class="form-control" id=loai" placeholder="">
                          </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                              <label>Đặc điểm</label>
                                <select id="" name="dacdiem_id"  class="form-control" required>
                                      @foreach ($dacdiem as $item)
                                        <option value="{{ $item->id }}">Hoa: {{ $item->hoa }}, Lá: {{ $item->la }}, Thân: {{ $item->than }}, Rễ:{{ $item->re }} </option>
                                      @endforeach 
                                 </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                      <div class="col-md-12">
                        <div class="col-md-12">
                          <label>Chi</label>
                            <select id="" name="id_chi"  class="form-control" required>
                                  @foreach ($chi as $item)
                                    <option value="{{ $item->id }}">{{ $item->ten_chi }}</option>
                                  @endforeach
                             </select>
                        </div>  
                      </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                      <div class="col-md-12">
                      <div class=" form-group" style="padding-top: 20px" >
                        <label for="content" >Mô tả: </label>
                        <textarea style="height: 400px" name="mo_ta" rows="20" id="content" >{{ $loai[0]->mo_ta }}</textarea>
                
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

