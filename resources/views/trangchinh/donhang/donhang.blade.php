
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
		<div class="bs-docs-example">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>STT</th>
						<th>Mã đơn hàng</th>
						<th>Ngày đặt hàng</th>
						<th>Trạng Thái</th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
						<td>
							<h3 style="text-align: center;">
								<a href="#"><span class="label label-primary">Chi tiết đơn hàng</span></a>
							</h3>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Jacob</td>
						<td>Thornton</td>
						<td>@fat</td>
						<td>
							<h3 style="text-align: center;">
								<a href="#"><span class="label label-primary">Chi tiết đơn hàng</span></a>
							</h3>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Larry</td>
						<td>the Bird</td>
						<td>@twitter</td>
						<td>
							<h3 style="text-align: center;">
								<a href="#"><span class="label label-primary">Chi tiết đơn hàng</span></a>
							</h3>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		

	</div>
</div>
<!--//Typography-->

@endsection
