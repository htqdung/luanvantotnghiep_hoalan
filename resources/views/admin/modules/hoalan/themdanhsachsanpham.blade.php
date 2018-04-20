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
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">   
              <div style="clear:both"></div>
          
          <div class="form-group">
            <div class="col-md-12">
            	 
                 <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham" id="sanpham" placeholder="" style="margin-right: 0; " required>
                 </div>
                 <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Đơn giá</label>
                    <input type="number" class="form-control" name="don_gia" id="sanpham" placeholder="" style="margin-right: 0; " required>
                  </div>
                                 
            </div>
            <div  class="col-md-12">
            	     
                
                 <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Kích thước</label>
                    <input type="text" class="form-control" name="kich_thuoc" id="sanpham" placeholder="" style="margin-right: 0; " required>
           			 </div>
                  <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Tag</label>
                    <input type="text" class="form-control" name="tag" id="sanpham" placeholder="" style="margin-right: 0; " required>
                  </div>
            </div>
            <div  class="col-md-12">
                 
                <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Điểm thưởng</label>
                    <input type="number" class="form-control" name="diem_thuong" id="sanpham" placeholder="" style="margin-right: 0; " required>
                  </div>
                   <div class="col-md-6" style="margin-right: 0; ">
                    <label for="exampleInputEmail1">Chọn hình ảnh</label>
                    <input type="file" class="" name="hinh_anh" id="sanpham" placeholder="" style="margin-right: 0; " required>
                 </div>    
                 
               
            </div>  
            <div  class="col-md-12">
            	 <div   class="col-md-6">
                 <div class="form-group" style="margin-right: 0; ">
                     <label>Thêm các loài hoa</label>
                     <small>* Có thể chọn được nhiều loài</small>
                     <select id="framework" name="framework[]" multiple class="form-control" >
                      
                      @foreach ($data as $item)
                        <option value="{{ $item->id }}">{{ $item->ten_khoa_hoc }}</option>
                      @endforeach
                      
                      
                     </select>
                  </div>
                </div>
                  <div class="col-md-6" style="margin-right: 0; ">
                    <label for="sp_mota">Mô tả: *</label>
                    <textarea name="mo_ta" rows="5" cols="30" class="form-control" id="sp_mota" placeholder="Mô tả về sản phẩm này...."></textarea>
                 </div>
               </div>
                   
           </div>
			      
            </div>
          </div> 
               
        <div style="clear: both;"></div>
       
            
      
        <!-- /.box-body -->

        <div class="box-footer" style="padding-top: 25px">          
          <a class="btn btn-warning" href="{{ route('DANH_SACH_SAN_PHAM') }}">Quay lại</a>
          
          <button type="submit" class="btn btn-primary"><i class="fa fa-next faa-pulse animated "></i>Lưu lại</button>
          <button type="reset" class="btn btn-success"><i class=""></i> Làm mới</button>
        </div>
      </form>
    </div>
    <!-- /.box -->

  
  </div>
<script>
    

</script>
  <!--/.col (right) -->

<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>

@endsection