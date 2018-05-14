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
          <h4 class="widget-title lighter" >THÊM LOÀI HOA </h4>
          
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
                  <h4 class="widget-title">Thông tin loài hoa</h4>
                  <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                      <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                  </div>
                </div>

                <div class="widget-body" style="background-color: #f7fbff;">
                  <div class="widget-main">
                    <div>
                      <label><b>Chi:</b></label>
                        <div>
                          <select  id="state"  name="id_chi" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 select2" data-placeholder="Tìm kiếm chi">
                             @foreach ($data as $item)
                                <option value="{{ $item->id }}">{{ $item->ten_chi }}</option>
                              @endforeach
                          </select>
                        </div>
                        
                    </div>
                    <br>
                    <div>
                      <label for="ten_loai"><b>Tên loài:</b></label>
                       <textarea type="text" id="form-field-11"  name="ten_loai"  class="autosize-transition form-control" id="ten_loai" placeholder=""> {{ old('ten_loai') }} </textarea>
                      
                    </div>
                    <br>
                    <div>
                      <label for="form-field-11">Tên khoa học: *</label>
                      <textarea type="text" id="form-field-11"   name="ten_khoa_hoc" 
                      class="autosize-transition   form-control" id="chi" placeholder=""> {{ old('ten_khoa_hoc') }}</textarea>
                    </div>
                    <br>
                    <div>
                     <label><b>Đặc điểm</b></label>  
                     <div class="form-group">  
                        <div>
                          <select  id="state"  name="dacdiem_id" class="col-xs-9 col-sm-12 col-md-12 col-lg-12 select2" data-placeholder="Tìm kiếm đặc điểm">
                              @foreach ($dacdiem as $item)
                                <option value="{{ $item->id }}">{{ $item->hoa }},{{ $item->la }},{{ $item->than }},{{ $item->re }},{{ $item->thoigianno }}</option>
                              @endforeach
                          </select>
                         {{--  <button hidden="hidden" class="col-md-3 btn btn-white btn-primary" style="float: right; height: 32.4px " id="click">Thêm nhanh</button> --}}
                        </div>
                        
                      <div class=" form-group" style="padding-top: 20px" >
                        <label for="content" >Mô tả: </label>
                        <textarea style="height: 500px" rows="20" id="content" > {{ old('mo_ta') }}</textarea>
                        <input type="hidden" name="mo_ta" value="{{ old('mo_ta') }}" id="content2">
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
              </div>
              <button type="submit" class="btn btn-white btn-primary" style="float: right;"> Lưu lại</button>
            </div><!-- /.span -->
          </div>
        </div>
        
      </form>
</div>


{{-- MODAL THÊM ĐẶC ĐIỂM --}}


<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm đặc điểm</h4>
      </div>
      <div class="modal-body">
           <form role="form" method="POST" action="" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-offset-0">
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
                      </div>
                    </div>
                  </div><!-- /.span -->
                </div>
              </div>
              <div class="box-footer" style ="padding-top: 25px">     
              </div>
            </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white btn-danger" data-dismiss="modal">Đóng lại</button>
        
        <input type="submit" name="_post_dacdiem" value="Lưu lại" class="btn btn-white btn-primary"></input>
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
<script>
  $('#click').on('click', function(e){
    $('#myModal').modal('show');
    e.preventDefault();
  });
</script>


@endsection








