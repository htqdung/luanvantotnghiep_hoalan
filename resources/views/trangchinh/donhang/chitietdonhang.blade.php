
@extends('trangchinh.layout.index')

@section('content')
<div class="page-head_agile_info_w3l">
	<div class="container">
			<h3>ĐƠN HÀNG CỦA BẠN</h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="/">Trang Chủ</a><i>|</i></li>
								<li>Đơn Hàng</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

<!--/Typography-->
<div class="banner_bottom_agile_info">
	<div class="container">
		<div class="grid_3 grid_4 w3layouts">
		<h3 style="color: #7FB2F0" class="hdg">THÔNG TIN ĐƠN HÀNG</h3>
		<div class="bs-docs-example">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Mã đơn hàng: 1024454</th>
							<th style="text-align: right;">Ngày đặt hàng: 12/04//2018</th>
						</tr>
					</thead>
				</table>
		</div>
		<div class="grid_3 grid_5 agile">
			<div class="well">
				<b>
					<label>Người nhận:</label> Nguyễn Văn A
					<br><br>
					<label>Số điện thoại:</label> 0968234321
					<br><br>
					<label>Địa chỉ:</label>Số 12 đường Hai Bà Trưng, P. Hưng Thịnh, Q. Kế Thành, TP. Cà Mau
				</b>
			</div>
		</div>
		<div class="col-md-12">
		<div class="bs-docs-example">
			<table class="table table-striped">
				<thead>
					<tr>
						<th colspan="2">Sản Phẩm</th>
						<th style="width: 100px">Số Lượng</th>
						<th>Đơn Giá</th>
						<th>Giảm Giá</th>
						<th colspan="2">Thành Tiền</th>
					</tr>
				</thead>
				<tbody style="text-align: center; ">
					<tr>
						<td>
							<a href="#">
								<img style="height: 80px; width: 70px;" src="trangchinh_asset/images/m1.jpg" alt="hoa Lan">
							</a>
						</td>
						<td><a style="margin-left: 10px" href="#">Hoa Lan Hồ Điệp</a></td>
						<td>
							1
						</td>
						<td>300.000 VNĐ</td>
						<td>0</td>
						<td>300.000 VND</td>
					</tr>
					<tr>
						<td>
							<a href="#">
								<img style="height: 80px; width: 70px;" src="trangchinh_asset/images/m1.jpg" alt="hoa Lan">
							</a>
						</td>
						<td><a href="#">Hoa Lan Hồ Điệp</a></td>
						<td>
							1
						</td>
						<td>300.000 VNĐ</td>
						<td>0</td>
						<td>300.000 VND</td>
					</tr>
					<tr>
						<td>
							<a href="#">
								<img style="height: 80px; width: 70px;" src="trangchinh_asset/images/m1.jpg" alt="hoa Lan">
							</a>
						</td>
						<td><a href="#">Hoa Lan Hồ Điệp</a></td>
						<td>
							1
						</td>
						<td>300.000 VNĐ</td>
						<td>0</td>
						<td>300.000 VND</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th style="text-align: right;" colspan="5">Tổng Tiền Hàng</th>
						<th style="text-align: right;">900.000 VNĐ</th>
					</tr>
					<tr>
						<th style="text-align: right;" colspan="5">Phí Vận Chuyển</th>
						<th style="text-align: right;">20.000 VNĐ</th>
					</tr>
					<tr>
						<th style="text-align: right;" colspan="5">Tổng Thanh Toán</th>
						<th style="text-align: right;">920.000 VNĐ</th>
					</tr>
					<tr>
						<th style="text-align: right;" colspan="5">Phương Thức Thanh Toán</th>
						<th style="text-align: right;">THANH TOÁN KHI NHẬN HÀNG</th>
					</tr>
				</tfoot>
			</table>
		</div>
			<div class="grid_3 grid_5 agile">
				<div class="well">
					 <b>Lưu ý: Đơn hàng sẽ được giao trong vòng 5 - 7 ngày làm việc.</b>
				</div>
			</div>
		</div>
		

	</div>
</div>
<!--//Typography-->

@endsection
