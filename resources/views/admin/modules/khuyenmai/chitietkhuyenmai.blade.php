@extends('admin.layout.index')
@section('main-content')

  <!-- left column -->
  <div class="col-md-12">
			
    <!-- general form elements -->
    <div class="box box-primary">

		


      <div class="box-header with-border">
      	 <div class="nav-search" id="nav-search">
			      <form class="form-search">
			        <span class="input-icon">
			          <input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
			          <i class="ace-icon fa fa-search nav-search-icon"></i>
			        </span>
			      </form>
   		 </div><!-- /.nav-search -->
        <h3 class="box-title">Chi tiết khuyến mãi</h3>
        
       
      </div>
      <!-- /.box-header -->

      <div class="box-body">

            <div class="row">
              <div class="col-md-6 form-group img-rounded" >
                  <div style="margin-left: 20%; padding-top: 10px " >
                      <a href=""> <img src="#" class="img-rounded" alt="Hình đại diện" style="width: 286px; height: 370px">  </a>
                     
                      
                  </div>
              
                  
              </div>
              <div class="col-md-6"  style="padding-top: 10px">
                <div class="">
                  <table class="table table-condensed">
                
                    <tbody>
                    	 <tr>
                        <th style="width: 30%">Tên khuyến mãi: </th>
                        <td></td>
                      </tr>
                      <tr>
                        <th style="width: 30%">Phần trăm: </th>
                        <td></td>
                      </tr>
                    
                      <tr>
                        <th style="width: 30%">Số lượng quà tặng: </th>
                        <td></td>
                      </tr>
                      <tr>
                        <th style="width: 30%">Tên quà tặng: </th>
                        <td></td>
                        
                      </tr>
                      <tr>
                        <th style="width: 30%">Ngày bắt đầu : </th>
                        <td></td>
                        
                      </tr>
                      <tr>
                        <th style="width: 30%">Ngày kết thúc: </th>
                        <td></td>
                        
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
			                    <th style="width: 25%">Tag</th>
			                  
			                   
			                    <th style="width: 7%; text-align: center;">Chức năng</th>
			                    
			                  </tr>
			                  </thead>
			                   <tbody>
			                @foreach ($data2 as $item)
			                  <tr>
			                    <td>{{ $item->id_sanpham }}</td>
			                    <td>{{ $item->ten_san_pham}}</td>
			                    <td>{{ $item->mo_ta}}</td>
			                    <td>{{ $item->tag}}</td>
			                                   
			                  
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
