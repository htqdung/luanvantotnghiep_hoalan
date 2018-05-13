@extends('admin.layout.index')
@section('main-content')
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="box-header with-border">
        <h3 class="box-title">Chi tiết sản phẩm</h3>
        <a style="float: right; padding: 0px; margin-left: 5px" class="btn btn-success" href="{{ route('DANH_SACH_SAN_PHAM') }}">
          <i class="fa fa-hand-o-left"></i>  Quay lại</a>
        
       </div>  
      </div>
      <!-- /.box-header -->
      <div class="box-body">
            <div class="row">
              <div class="col-md-6 form-group img-rounded" >
                   <div class="col-md-4">
                     <img src="../public/sanpham/<?= $data_hinhanh[0]->ten_hinh; ?>" alt="">
                    <label for="image">Chọn hình ảnh</label>
                    <input type="file" multiple accept="image/*" class="" value="{{ $data_hinhanh[0]->ten_hinh }}" name="hinh_anh" id="image" placeholder="" style="margin-right: 0; " >
                  </div>
                  
                  
              </div>
              <div class="col-md-6" style = "padding-top: 25px">
                <div class="">
                  <table class="table">
                    <thead>
                        @foreach ($data_sp as $data)
                          <tr>
                          <th style="width: 10%">Id: </th>
                           <td>{{ $data->id_sanpham }}</td> 
                        </tr>
                        <tr>
                          <th style="width: 30%">Tên sản phẩm: </th>
                         <td>{{ $data->ten_san_pham }}</td>
                        </tr>
                        <tr>
                          <th style="width: 30%">Giá: </th>
                         <td>{{ $data->gia }}</td>
                        </tr>
                       {{--  <tr>
                          <th style="width: 30%">Số lượng: </th>
                         <td>{{ $data_hoa->so_luong }}</td>
                        </tr> --}}
                        <tr>
                          <th style="width: 30%">Điểm thưởng: </th>
                         <td>{{ $data->diem_thuong }}</td>
                        </tr>
                        
                       
                        @endforeach
                        
                       
                    </thead>
                    <tbody>
                                  
                    </tbody> 
                  </table>  
                </div> 
              </div>
            </div>
            <div class="row">

              <?= $data->mo_ta; ?>

            </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!--/.col (right) -->
@endsection







