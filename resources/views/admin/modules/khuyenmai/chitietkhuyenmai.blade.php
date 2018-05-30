@extends('admin.layout.index')
@section('main-content')

  <!-- left column -->
  <div class="col-md-12">
		<!-- general form elements -->
    <div class="box box-primary">
     
        <h3 class="box-title">Chi tiết khuyến mại</h3>
        
       
      </div>
      <!-- /.box-header -->

      <div class="box-body"> 

            <div class="row">
              <div class="col-md-12 form-group img-rounded" >
                <label for="">Hình quảng cáo</label>
                  <div style="margin-left: 20%; padding-top: 10px " >
                      <a href="/luanvantotnghiep_hoalan/public/khuyenmai/<?= $data[0]->ten_hinh_anh; ?>"> <img src="/luanvantotnghiep_hoalan/public/khuyenmai/<?= $data[0]->ten_hinh_anh; ?>" class="img-rounded" alt="Hình đại diện" style="height: 200px; width: 100%">  </a>
                  </div>
              </div>
              <div class="col-md-12"  style="padding-top: 10px">
                <div class="">
                  <table class="table table-condensed">
                    <tbody>
                    	 <tr>
                        <th style="width: 30%">Tên khuyến mãi: </th>
                        <td>{{ $data[0]->tenhuong_trinh }}</td>
                      </tr>
                      <tr>
                        <th style="width: 30%">Phần trăm: </th>
                        <td> {{ $data[0]->ti_le_giam_gia }}</td>
                      </tr>
                    
                      
                      <tr>
                        <th style="width: 30%">Ngày bắt đầu : </th>
                        <td>{{ $data[0]->ngay_bat_dau }}</td>
                      </tr>
                      <tr>
                        <th style="width: 30%">Ngày kết thúc: </th>
                        <td>{{ $data[0]->ngay_ket_thuc }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div> 
              </div>
            </div>
           <div class="row">
			      <div class="col-md-12">
			        <table class="table">
			          <h3><b>DANH SÁCH SẢN PHẨM</b></h3>
			                  <thead>
			                  <tr style="margin: 0px">
			                    <th style="width: 3%">Id</th>
			                    <th style="width: 30%">Tên sản phẩm</th>
			                    <th style="width: 35%">Mô tả </th>
			                    
			                  
			                   
			                    <th style="width: 7%; text-align: center;">Chức năng</th>
			                    
			                  </tr>
			                  </thead>
			                   <tbody>
			                @foreach ($data2 as $item)
			                  <tr>
			                    <td>{{ $item->id_sanpham }}</td>
			                    <td>{{ $item->ten_san_pham}}</td>
			                    <td><?= $item->mo_ta; ?></td>
			                    
			                                   
			                  
			                     <td>
			                     
			                            <a style="margin: 0px; padding: 0px; width: 100px" class="btn btn-danger" href="#"><i class="fa fa-close fa-1x fa-fw" ></i>Xóa</a>
			                    </td>
			                </tr> 
			                @endforeach           
			              </tbody>              
			          </table>
			      </div>
			    </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  
  </div>
  <!--/.col (right) -->
@endsection
