@extends('trangchinh.layout.index')

@section('content')

@include('trangchinh.dathang.banner')

<div id="all">

	<div id="content" class="banner_bottom_agile_info">
		<div class="container">

			<div class="col-md-9" id="checkout">

				<div class="box">
					<form method="post" action="">
						<h1>KIỂM TRA ĐƠN HÀNG</h1>
						<hr>
						<ul class="nav nav-pills nav-justified">
							<li><a href="trangchinh/dathang/dathang1"><i class="fa fa-map-marker"></i><br>ĐỊA CHỈ</a>
							</li>
							<li><a href="trangchinh/dathang/dathang2"><i class="fa fa-truck"></i><br>PHƯƠNG THỨC VẬN CHUYỂN</a>
							</li>
							<li><a href="trangchinh/dathang/dathang3"><i class="fa fa-money"></i><br>PHƯƠNG THỨC THANH TOÁN</a>
							</li>
							<li class="active"><a href="#"><i class="fa fa-eye"></i><br>KIỂM TRA ĐƠN HÀNG</a>
							</li>
							<br>
						</ul>

						<div class="content">
							<div class="bs-docs-example">
								<table class="table table-striped">
									<thead>
										<tr>
											<th colspan="2">Sản Phẩm</th>
											<th>Số Lượng</th>
											<th>Đơn Giá</th>
											<th>Giảm Giá</th>
											<th>Thành Tiền</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<a href="#">
													<img src="trangchinh_asset/images/b1.jpg" alt="White Blouse Armani">
												</a>
											</td>
											<td><a href="#">White Blouse Armani</a>
											</td>
											<td>2</td>
											<td>$123.00</td>
											<td>$0.00</td>
											<td>$246.00</td>
										</tr>
										<tr>
											<td>
												<a href="#">
													<img src="trangchinh_asset/images/b2.jpg" alt="Black Blouse Armani">
												</a>
											</td>
											<td><a href="#">Black Blouse Armani</a>
											</td>
											<td>1</td>
											<td>$200.00</td>
											<td>$0.00</td>
											<td>$200.00</td>
										</tr>
										<tr>
											<td>
												<a href="#">
													<img src="trangchinh_asset/images/b3.jpg" alt="Black Blouse Armani">
												</a>
											</td>
											<td><a href="#">Black Blouse Armani</a>
											</td>
											<td>1</td>
											<td>$200.00</td>
											<td>$0.00</td>
											<td>$200.00</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th colspan="5">Tổng Cộng:</th>
											<th>$446.00</th>
										</tr>
									</tfoot>
								</table>

							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.content -->

						<div class="box-footer">
							<div class="pull-left">
								<a href="trangchinh/dathang/dathang3" class="btn btn-default"><i class="fa fa-chevron-left"></i> Quay Lại</a>
							</div>
							<div class="pull-right">
								<button type="submit" class="btn btn-primary">Đặt Hàng 
								</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /.box -->


			</div>
			<!-- /.col-md-9 -->

			@include('trangchinh.dathang.thanhtoan')

			<!-- /.col-md-3 -->

		</div>
		<!-- /.container -->
	</div>
	<!-- /#content -->

@endsection