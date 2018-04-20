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
          <i class="  fa fa-hand-o-left"></i>  Quay lại</a>
        
       </div>  
      </div>
      <!-- /.box-header -->
      <div class="box-body">
            <div class="row">
              <div class="col-md-6 form-group img-rounded" >
                  <div style="margin-left: 20%; padding-top: 10px">
                      <a href=""> 
                        <img src="#" class="img-rounded" alt="Hình đại diện" style="width: 286px; height: 370px"> 
                      </a>
                  </div>
                  
                 
                  <div class="img-rounded" style="margin-top: 20px; width: 100%">
                    <div class="form-group">
                        <a href="#""><img class="img-rounded"  style="float: left; width:95px; height: 133px; margin-left: 20%; " src="#" alt="chitiet1"> </a>  
                    </div>
                    <div class="form-group">
                        <a href="#" >
                        <img class="img-rounded"  style="float: left; width: 95px; height: 133px; margin-left:20px;" src="#" alt="chitiet2"> </a>
                        <a href="" >
                    </div>
                    <div class="form-group">
                        <a href="#"><img class="img-rounded" style="float: left; width: 95px; height: 133px; margin-left: 20px;" src="#" alt="chitiet3"> </a>  
                    </div>
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
                        <tr>
                          <th style="width: 30%">Thông tin chi tiết: </th>
                         <td>{{ $data->thong_tin_chi_tiet }}</td>
                        </tr>
                        <tr>
                          <th style="width: 30%">Điểm thưởng: </th>
                         <td>{{ $data->diem_thuong }}</td>
                        </tr>
                        <tr>
                          <th style="width: 30%">Tags: </th>
                         <td>{{ $data->tag }}</td>
                        </tr>
                        <tr>
                          <th style="width: 30%">Mô tả: </th>
                          <td>{{ $data->mo_ta }}</td>
                        </tr>
                        @endforeach
                        
                       
                    </thead>
                    <tbody>
                                  
                    </tbody> 
                  </table>  
                </div> 
              </div>
            </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!--/.col (right) -->
@endsection







