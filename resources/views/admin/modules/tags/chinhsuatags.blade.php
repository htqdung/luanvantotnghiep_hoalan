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
      <div class="box-header with-border">
        <h3 class="box-title">Chỉnh sửa tags</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

      <form role="form" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
             <div class="form-group">             
                <div class="col-md-6" style="padding-top: 14px">
                <label for="chi">Tên tags: *</label>
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
                <input type="text" value="{{ $data[0]->ten_tags}}"   name="ten_tags"  class="form-control" id="chi" placeholder="Điền tên tags: sinhnhat">
                </div>              
              <div style="clear:both"></div>
              <div class="form-group">             
                <div class="col-md-6" style="padding-top: 14px">
                <label for="sanpham_id"> San pham: *</label>
                <select name="sanpham_id" id="sanpham_id">
                  @foreach ($data_sp as $element)
                    <option value="{{ $element->id }}">{{ $element->ten_san_pham }}</option>
                  @endforeach
                  
                </select>
                </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <a class="btn btn-danger" style="float: right;" href="{{ route('DANH_SACH_TAGS') }}">Quay lại</a>
          <button type="submit" class="btn btn-primary" style="float: right;"> Lưu lại</button>
          
        </div>
      </form>
   
    <!-- /.box -->

  
  
  <!--/.col (right) -->
</div>
@endsection
