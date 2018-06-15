@extends('admin.layout.index')
@section('main-content')
		<!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
	    <ul class="breadcrumb">
	      <li>
	        <i class="ace-icon fa fa-home home-icon"></i>
	        <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ>Đơn hàng đang xử lý></a><a href="javascript:void(0)">Chi tiết đang xử lý</a>
	      </li>
	    
	    </ul><!-- /.breadcrumb -->

	    
    </div>
    <div class="box-header with-border" style=" padding-top:10px">
        <a style="float: right; padding: 0px; margin-left: 5px" class="btn btn-warning" href="javascript:history.go(-1);"><i class="" ></i>Quay lại</a> 
    </div>
    <div class="box-header with-border">
       
    </div>
	<div style="color: #2B7DBC" >
		<h3 >
			
				<b>Thông tin chi tiết </b>
		</h3>
	</div>
	<div id="collapseOne" class="panel-collapse collapse in"
		role="tabpanel" aria-labelledby="headingOne">
		<div class="panel-body">
			<form class="profileForm" action="#">
				<table class="table table-responsive" id="tblAccounts">
					<tbody class="">
						<tr >
							<td style="width: 15%"><b>Ngày đơn hàng:</b></td>
							<td class="form-value1" id="tdinputName" ></td>
							
						</tr>
						<tr >
							<td style="width: 15%"><b>Người đặt hàng:</b></td>
							<td class="form-value1" id="tdinputName" ></td>
							
						</tr>
						<tr >
							<td style="width: 15%"><b>Địa chỉ:</b></td>
							<td class="form-value1" id="tdinputName" ></td>
							
						</tr>
						<tr >
							<td style="width: 15%"><b>Tổng tiền:</b></td>
							<td class="form-value1" id="tdinputName" ></td>
							
						</tr>
						<tr >
							<td style="width: 15%"><b>Hình thức thanh toán:</b></td>
							<td class="form-value1" id="tdinputName" ></td>
							
						</tr>
						<tr>
							<td style="width: 15%"><b>Trạng thái:</b></td>
							<td class="form-value1" id="tdinputDOB" ></td>
							
						</tr>
						
					</tbody>
				</table>
			</form>

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
			                    <th style="width: 35%">Số lượng </th>
			                  
			                  </tr>
			                  </thead>
			                   <tbody>
			                       
			              </tbody>              
			          </table>
			      </div>
			    </div>
</div>

  
@endsection
