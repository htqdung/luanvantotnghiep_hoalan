@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i><a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ</a>
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
<!-- PAGE CONTENT BEGINS -->
<div class="row" >
<div class="space-12"></div>
<div class="infobox-container" >

<div class="infobox infobox-blue" >
	<div class="infobox-icon">
		<i class="ace-icon fa fa-user"></i>
	</div>
	<div class="infobox-data">		
		<span class="infobox-data-number">11</span>
		<div class="infobox-content"> <a href="{{ route('DANH_SACH_NGUOI_DUNG') }}">NGƯỜI DÙNG</a></div>
	</div>
</div>
<div class="infobox infobox-pink">
	<div class="infobox-icon">
		<i class="ace-icon fa fa-shopping-cart"></i>
	</div>
	<div class="infobox-data">
		<span class="infobox-data-number">8</span>
		<div class="infobox-content"> <a href="{{ route('TAT_CA_DON_HANG') }}">ĐƠN HÀNG</a></div>
	</div>
</div>
<div class="infobox infobox-red">
	<div class="infobox-icon">
		<i class="ace-icon fa fa-money"></i>
	</div>
	<div class="infobox-data">
		<span class="infobox-data-number">7</span>
		<div class="infobox-content"><a href="#">DOANH THU</a></div>
	</div>
</div>
</div>
<div class="vspace-12-sm"></div>
</div><!-- /.row -->
<div class="hr hr32 hr-dotted"></div>
<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header widget-header-flat widget-header-small">
				

				<div class="widget-toolbar no-border">
					<div class="inline dropdown-hover">
						<button class="btn btn-minier btn-primary">
							This Week
							<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
						</button>

						<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
							<li class="active">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
									This Week
								</a>
							</li>

							<li>
								<a href="#">
									<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
									Last Week
								</a>
							</li>

							<li>
								<a href="#">
									<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
									This Month
								</a>
							</li>

							<li>
								<a href="#">
									<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
									Last Month
								</a>
							</li>
						</ul>
					</div>
				</div>
				<h5 class="widget-title">
					<h1>DOANH SỐ </h1>
				</h5>
				<div id="piechart"></div>
			</div>

			
		</div><!-- /.widget-box -->
		
	</div><!-- /.col -->

</div><!-- /.row -->


<!-- PAGE CONTENT ENDS -->	
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['tháng 1', 8],
  ['Tháng 2', 2],
  ['Tháng 3', 2],
  ['Tháng 4', 3],
  ['Tháng 5', 2],
  ['Tháng 6', 7],
  ['Tháng 7', 7],
  ['Tháng 8', 7],
  ['Tháng 9', 7],
  ['Tháng 10', 7],
  ['Tháng 11', 7],
  ['Tháng 12', 7]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'', 'width':650, 'height':500};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

@endsection




