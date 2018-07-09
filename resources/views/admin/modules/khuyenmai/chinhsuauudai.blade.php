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
    <li><a href="javascript:void(0)">Chỉnh sửa ưu đãi</a></li>
    </ul><!-- /.breadcrumb -->
  </div>
  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <div class="hr hr-18 hr-double dotted"></div>
      <div class="widget-box">
        <div class="widget-header widget-header-blue widget-header-flat" >
          <h4 class="widget-title lighter" >CHỈNH SỬA ƯU ĐÃI </h4>
          
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
                  <h4 class="widget-title">Thông tin ưu đãi</h4>
                  <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                      <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                  </div>
                </div>

                <div class="widget-body" style="background-color: #f7fbff;">
                  <div class="widget-main">
                    <div>
                      <label>Tên ưu đãi</label>
                      <input type="hidden" value="{{ $uudai[0]->id_hinhthuc }}" name="id_hinhthuc">
                      <input type="text"  value="{{ $uudai[0]->ten_hinh_thuc }}" name="ten_hinh_thuc" class="form-control" id=uudai" placeholder="" required="">
                    </div>
                    <br>
                    <div>
                      <label>Chọn sản phẩm</label>
                      <select  id="framework"  name="ten_san_pham[]" class="select2 col-md-12" multiple="multiple" class="form-control" required="">
                        
                        @foreach ($danhsachsanpham as $item)
                          @if($uudai[0]->sanpham_id == $item->id_sanpham)
                            <option selected value="{{ $uudai[0]->sanpham_id }}">{{ $uudai[0]->ten_san_pham }}</option>
                          @else
                            <option value="{{ $item->id_sanpham }}">{{ $item->ten_san_pham }}</option>
                          @endif
                        @endforeach

                       </select>
                    </div>
                    <br>
                    <div>
                      <label for="form-field-11">Số lượng</label>
                      <input type="number" min="0"  name="so_luong_toi_thieu"  class="form-control" id="so_luong_toi_thieu" value="{{ $uudai[0]->so_luong_toi_thieu }}" placeholder="">
                    </div>
                    <br>
                    <div>
                      <label for="form-field-11">Tỉ lệ giảm giá (%)</label>
                      <input type="number"  name="ti_le_giam_gia"  class="form-control" id="chi" value="{{ $uudai[0]->ti_le_giam_gia }}" placeholder="">
                    </div>
                    <br>              
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
