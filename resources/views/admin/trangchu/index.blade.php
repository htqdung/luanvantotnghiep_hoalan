@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i><a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ</a>
			</li>	
		</ul><!-- /.breadcrumb -->
		
	</div>
	<!-- PAGE CONTENT BEGINS -->
	<div class="row" >
	<div class="space-12"></div>
	<div class="infobox-container">
		<div class="infobox" style="background-color: #6fb3e0">
			<div class="infobox-data" style="width: 100%">		
				<div class="infobox-content"> <a style="color: #fff" href="{{ route('DANH_SACH_NGUOI_DUNG') }}">NGƯỜI DÙNG</a></div>
			</div>
			<br>
			<hr style="margin-bottom: 8px">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-user"></i>
			</div>
			<div class="infobox-data" style="padding-top: 7px; text-align: center; width: 100%; position: relative; top: -40px;">		
				<span class="infobox-data-number" style="color: #fff">{{ $data_nguoidung }}</span>
				
			</div>
		</div>
		<div class="infobox" style="background-color: #6fb3e0">
			<div class="infobox-data" style="width: 100%">		
				<div class="infobox-content"> <a style="color: #fff" href="{{ route('TAT_CA_DON_HANG') }}">ĐƠN HÀNG</a></div>
			</div>
			<br>
			<hr style="margin-bottom: 8px">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-shopping-cart"></i>
			</div>
			<div class="infobox-data" style="padding-top: 7px; text-align: center; width: 100%; position: relative; top: -40px;">		
				<span class="infobox-data-number" style="color: #fff">{{ $data_donhang }}</span>
				
			</div>
		</div>
		
		<div class="infobox" style="background-color: #6fb3e0">
			<div class="infobox-data" style="width: 100%">		
				<div class="infobox-content"   ><a style="color: #fff" href="#">DOANH THU</a></div>
			</div>
			<br>
			<hr style="margin-bottom: 8px">
			<div class="infobox-icon"  style="color: #fff">
				<i class="ace-icon fa fa-money"></i>
			</div>
			<div class="infobox-data" style="padding-top: 7px; color: #fff;  text-align: center;  position: relative; top: -40px; width: 100%">		
				<span class="infobox-data-number">
					@foreach ($data_tongdoanhthu as $element)
						<?= number_format($element->total_sales); ?>
					@endforeach
				</span>
				
			</div>
		</div>
	</div>	
	<div class="vspace-12-sm"></div>
	</div><!-- /.row -->
	<div class="hr hr32 hr-dotted"></div>

	<div class="col-sm-12">
		<div class="col-sm-6">	
			<div class="widget-box">
				<div class="widget-header widget-header-flat widget-header-small">
					<h5 class="widget-title">
					<h1>Doanh thu bán hàng</h1>
					</h5>
					<div id="piechart"></div>
				</div>
			</div>
		</div>			
		<div class="col-sm-6">
			<div class="widget-box">
				<div class="widget-header widget-header-flat widget-header-small">
					<h5 class="widget-title">
					<h1>TOP 5 SẢN PHẨM BÁN CHẠY</h1>
					</h5>
					<div id="piechart"></div>
				</div>
			</div>
		</div>	
	</div><!-- /.widget-box -->


	<div class="col-sm-12">
		<div class="col-sm-6">	
			<div class="widget-box">
				<div class="widget-header widget-header-flat widget-header-small">
					<h5 class="widget-title">
					<h1>Doanh thu bán hàng</h1>
					</h5>
					<div style="color:red" id="columnchart_material"></div>
				</div>
			</div>
		</div>			
		<div class="col-sm-6">
			<div class="widget-box">
				<div class="widget-header widget-header-flat widget-header-small">
					<h5 class="widget-title">
					<h1>TOP 5 SẢN PHẨM BÁN CHẠY</h1>
					</h5>
					<div id="piechart"></div>
				</div>
			</div>
		</div>	
	</div><!-- /.widget-box -->
	 <div class="row">
      <div class="col-md-12">
         
        <table class="table">
          <h3><b>DANH SÁCH ĐÁNH GIÁ</b>  <div  style="margin-left: 80%">
                   
                </div>
          </h3>
                  <thead>
                  <tr style="margin: 0px">
                    <th style="width: 5%">Mã số</th>
                    <th style="width: 20%">Tên người dùng</th>
                    <th style="width: 30%">Ngày liên hệ</th>
                    <th style="width: 15%">Tiêu đề</th> 
                    <th style="width: 15%">Nội dung</th>                 
                  </tr>
                  </thead>
                   <tbody>
                    
                @foreach ($data_lienhe as $item)
                  <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ date('d-m-Y', strtotime($item->ngay_lien_he)) }}</td>    
                    <td>{{ $item->ten}}</td>
                     <td>{{ $item->tieu_de}}</td>                     
                    <td>{{ $item->noi_dung}}</td>
                </tr> 
                @endforeach           
              </tbody>              
          </table>
      </div>
    </div>
<!-- PAGE CONTENT ENDS -->	
</div>
<?php
	$doanhthuthang[] =(explode(',', $data_doanhthunam));
	for ($i = 0; $i < 12; $i++) {
		echo '<input type="hidden" id="t',$i+1,'" value="',$doanhthuthang[0][$i],'">';
	}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
	var t1 = document.getElementById("t1").value*1;
	var t2 = document.getElementById("t2").value*1;
	var t3 = document.getElementById("t3").value*1;
	var t4 = document.getElementById("t4").value*1;
	var t5 = document.getElementById("t5").value*1;
	var t6 = document.getElementById("t6").value*1;
	var t7 = document.getElementById("t7").value*1;
	var t8 = document.getElementById("t8").value*1;
	var t9 = document.getElementById("t9").value*1;
	var t10 = document.getElementById("t10").value*1;
	var t11 = document.getElementById("t11").value*1;
	var t12 = document.getElementById("t12").value*1;

  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ["Tháng 1",t1],
  ["Tháng 2",t2],
  ["Tháng 3",t3],
  ["Tháng 4",t4],
  ["Tháng 5",t5],
  ["Tháng 6",t6],
  ["Tháng 7",t7],
  ["Tháng 8",t8],
  ["Tháng 9",t9],
  ["Tháng 10",t10],
  ["Tháng 11",t11],
  ["Tháng 12",t12],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'', 'width':450, 'height':300};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
<script type="text/javascript">
		


      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tháng', 'Doanh thu'],
          [' 1', 400],
          [' 2', 460],
          [' 3', 540],
          [' 4', 540],
          [' 5', 540],
          [' 6', 540],
          [' 7', 540],
          [' 8', 540],
          [' 9', 100],
          [' 10', 540],
          [' 11', 540],
          [' 12', 540],
        ]);

        var options = {
          chart: {
            title: 'Doanh thu hàng tháng (12 tháng)'
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
@endsection




