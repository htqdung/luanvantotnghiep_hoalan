@extends('admin.layout.index')
@section('main-content')
		<!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
	    <ul class="breadcrumb">
	      <li>
	        <i class="ace-icon fa fa-home home-icon"></i>
	        <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ>></a><a href="javascript:void(0)">Chi tiết đơn hàng</a>
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

				<table class="table table-responsive" id="tblAccounts">
					<tbody class="">
						<tr > 
							<input type="hidden" id="donhang_id" value="{{ $data[0]->donhang_id }}">
							<td style="width: 20%"><b>Ngày đơn hàng:</b></td>
							<td class="form-value1" id="tdinputName"  >{{ $data[0]->ngay_dat_hang }}</td>
							
						</tr>
						<tr >
							<td style="width: 20%"><b>Người đặt hàng:</b></td>
							<td class="form-value1" id="tdinputName"> {{ $data[0]->ten_nguoi_nhan }}</td>
							
						</tr>
						<tr >
							<td style="width: 20%"><b>Địa chỉ giao hàng:</b></td>
							<td class="form-value1" id="tdinputName" >{{ $data[0]->so_nha }}, {{ $data[0]->ten_duong }}
								, {{ $data[0]->ten_phuong_xa }}, {{ $data[0]->ten_quan_huyen }} , {{ $data[0]->ten_tinh_thanhpho }}</td>
							
						</tr>
						<tr >
							<td style="width: 20%"><b>Tổng tiền:</b></td>
							<td class="form-value1" id="tdinputName" ><?=  
								number_format($data[0]->tong_tien,1,",",".");
								?> VND

							 </td>
							
						</tr>
						<tr >
							<td style="width: 20%"><b>Hình thức thanh toán:</b></td>
							<td class="form-value1" id="tdinputName" >{{ $data[0]->ten_hinh_thuc }}</td>
						</tr>

						<tr>
							<td style="width: 20%"><b>Trạng thái:</b></td>
							<td class="form-value1" id="tdinputDOB" >
								<form action="" method="POST" enctype="multipart/form-data" >
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<select name="trangthai" id="xuly">
										@foreach ($trangthai as $element)
											@if($data[0]->trangthai_id == $element->id)
												<option value="{{ $element->id }}" selected>{{ $data[0]->ten_trang_thai }}</option>	
											@else
												<option value="{{ $element->id }}" >{{ $element->ten_trang_thai }}</option>	
											@endif
										@endforeach
									</select>
									<button type="submit" class="btn btn-success" id="btn_xuly" style="
									    margin-top: -2px;
									    padding: 0px 10px;
									">Xử lý</button>
								</form>
								
							</td>
							
						</tr>
						
					</tbody>
				</table>
			

		</div>
	</div>
	 <div class="row">
			      <div class="col-md-12">
			        <table class="table">
			          <h3><b>DANH SÁCH SẢN PHẨM</b></h3>
			                  <thead>
			                  	<tr style="">
			                    <th style="width: 10%">Mã chi tiết</th>
			                    <th style="width: 80%">Tên sản phẩm</th>
			                    <th style="width: 15%">Số lượng </th>
			                  
			                  </tr>
			                  </thead>
			                   <tbody>
			                       @foreach ($sanpham as $element)
			                       <td>{{ $element->id }}</td>
			                       	<td>{{ $element->ten_san_pham }}</td>
			                       	<td>{{ $element->so_luong }}</td>
			                       @endforeach
				              </tbody>              
			          </table>
			      </div>
			    </div>
</div>
<script>
	
	


</script>
  
@endsection
