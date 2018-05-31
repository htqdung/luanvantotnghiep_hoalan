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
				<div class="infobox-content"   ><a style="color: #fff" href="#">TỔNG DOANH THU</a></div>
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
					<h3>DOANH THU/ĐƠN HÀNG TRONG NĂM</h3>
					</h5>
					<div id="piechart"></div>
				</div>
			</div>
		</div>			
		<div class="col-sm-6">	
			<div class="widget-box">
				<div class="widget-header widget-header-flat widget-header-small">
					<h5 class="widget-title">
					<h3>DOANH THU BÁN HÀNG</h3>
					</h5>
					<div style="color:red" id="columnchart_material"></div>
				</div>
			</div>
		</div>	
	</div><!-- /.widget-box -->
	<div class="col-sm-12">
		
		<div class="col-sm-6" >
			<div class="widget-box">
				<div class="widget-header widget-header-flat widget-header-small" style=" width: ; height: ">
					<h5 class="widget-title">
						<h3>ĐƯỢC XEM NHIỀU NHẤT</h3>
					</h5>
					<table class="table">
			          	<thead>
			              <tr style="margin: 0px">
			                <th style="width: 5%">Mã số</th>
			                <th style="width: 40%">Tên sản phẩm</th>
			                <th style="width: 10%">Giá</th>
			                <th style="width: 15%">Lượt xem</th>
			                <th style="width: 15%">Lượt mua</th> 
			                <th style="width: 15%">Ngày thêm</th>                 
			              </tr>
			          	</thead>
			           	<tbody>
			            	@foreach ($data_sanphamxemnhieu as $item)
			              	<tr>
			                    <td>{{ $item->id_sanpham}}</td>                        
			                    <td>{{ $item->ten_san_pham}}</td>
			                    <td>{{ $item->gia}}</td>
			                    <td>{{ $item->so_luot_xem}}</td>
			                    <td>{{ $item->so_luot_mua}}</td>
			                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>                   
			                </tr> 
			                @endforeach           
			          	</tbody>              
			      	</table>
			      	{{ $data_sanphamxemnhieu->render() }}
				</div>
			</div>
		</div>	
     	 <div class="col-md-6">
     	 	<div class="widget-box" >
				<div class="widget-header widget-header-flat widget-header-small" style=" width: ; height: ">
			        <table class="table">
			  			<h3>
			  				<b>DANH SÁCH LIÊN HỆ</b>
			  				<div  style="margin-left: 80%"></div>
			  			</h3>
			          	<thead>
			              <tr style="margin: 0px">
			                <th style="width: 5%">Mã số</th>
			                <th style="width: 25%">Tên người dùng</th>
			                <th style="width: 15%">Ngày liên hệ</th>
			                <th style="width: 33%">Tiêu đề</th> 
			                <th style="width: 15%%">Chức năng</th>                 
			              </tr>
			          	</thead>
			           	<tbody>
			            
			            	@foreach ($data_lienhe as $item)
			              	<tr>
			                    <td>{{ $item->id}}</td>                        
			                    <td>{{ $item->ten}}</td>
			                    <td>{{ date('d-m-Y', strtotime($item->ngay_lien_he)) }}</td>
			                    <td>{{ $item->tieu_de}}</td>                     
			                    <td>
			                    	<a type="button" class="btn btn-danger" title="XÓA LIÊN HỆ" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal"   data-target="#removeUser{{ $item->id }}"><i class="fa fa-trash-o fa-fw"></i></a>
			                     
				                     <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser{{ $item->id }}" role="dialog" tabindex="-1">
				                        <div class="modal-dialog" role="document">
				                            <div class="modal-content">
				                                <div class="modal-header">
				                                    <h4 class="modal-title">Bạn có chắc chắn?</h4>
				                                </div>
				                                <div class="modal-body">
				                                    <p>Sau khi nhấn đồng ý, Liên hệ {{ $item->tieu_de }} sẽ bị xóa bỏ!</p>
				                                </div>
				                                <div class="modal-footer">
				                                    <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
				                                    <a class="btn btn-danger" href="{{ route('XOA_LIEN_HE', $item->id) }}" id="remove-button" type="submit">Đồng ý</a>
				                                </div>
				                            </div><!-- end modal-content -->
				                        </div><!-- end modal-dialog -->
				                    </div><!-- end modal -->

			                    	<a type="button" class="btn btn-info" title="XEM CHI TIẾT" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal" data-target="#myModal{{ $item->id }}"><i class="fa fa-eye fa-fw"></i></a>
									<!-- Modal -->
									<div id="myModal{{ $item->id }}" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title">{{ $item->tieu_de }}</h4>
									      </div>
									      <div class="modal-body">
									        <p><b>Tên người dùng: </b>{{ $item->ten }}</p>
									        <p><b>Ngày liên hệ: </b> {{ date('d-m-Y', strtotime($item->ngay_lien_he)) }} </p>
											<p><b>Nội dung: </b>{{ $item->noi_dung }}</p>
											

									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
									      </div>
									    </div>

									  </div>
									</div>

			                    </td>
			                </tr> 
			                @endforeach           
			          	</tbody>              
			      	</table>
			      	{{ $data_lienhe->render() }}
			      </div>
			   </div>
			  
    </div>		
	</div><!-- /.widget-box -->
<!-- PAGE CONTENT ENDS -->	
</div>
<?php
	$doanhthuthang[] =(explode(',', $data_doanhthunam));
	for ($i = 0; $i < 12; $i++) {
		echo '<input type="hidden" id="t',$i+1,'" value="',$doanhthuthang[0][$i],'">';
	}

	$doanhthu12thang[] =(explode(',', $data_doanhthu12thang));
	for ($i = 0; $i < 12; $i++) {
		echo '<input type="hidden" id="d',$i+1,'" value="',$doanhthu12thang[0][$i],'">';
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
  var options = {'title':'', 'width':400, 'height':235};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
<canvas id="myChart" width="400" height="500"></canvas>
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
      	var d1 = document.getElementById("d1").value*1;
		var d2 = document.getElementById("d2").value*1;
		var d3 = document.getElementById("d3").value*1;
		var d4 = document.getElementById("d4").value*1;
		var d5 = document.getElementById("d5").value*1;
		var d6 = document.getElementById("d6").value*1;
		var d7 = document.getElementById("d7").value*1;
		var d8 = document.getElementById("d8").value*1;
		var d9 = document.getElementById("d9").value*1;
		var d10 = document.getElementById("d10").value*1;
		var d11 = document.getElementById("d11").value*1;
		var d12 = document.getElementById("d12").value*1;
		var array = [d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11,d12];
      function drawChart() {
      	var d = new Date();
	    var n = d.getMonth();
	    var x  = n+1;
	    var dem = new Array();
	    for(var i = 0; i < 13; i++){
	        if(x >= 0)
	        {
	        	if(x == 0)
	        	{
	        		x = 12;
        		 	continue;
	        	}
	        	else
	        	{
	        		dem[i] = x;
		         	x--;
	        	}
	        }
	    }
    	for (var i = 0; i < dem.length; i++) {
    		if(dem[i] == null)
    		{
    			dem.splice(i,1);
    		}
    	}
        var data = google.visualization.arrayToDataTable([
          ['Tháng', 'Doanh thu'],  
          ['Thg '+ (dem[11]), array[11]],
          ['Thg '+ (dem[10]), array[10]],
          ['Thg '+ (dem[9]), array[9]],
          ['Thg '+ (dem[8]), array[8]],
          ['Thg '+ (dem[7]), array[7]],
          ['Thg '+ (dem[6]), array[6]],
          ['Thg '+ (dem[5]), array[5]],
          ['Thg '+ (dem[4]), array[4]],
          ['Thg '+ (dem[3]), array[3]],
          ['Thg '+ (dem[2]), array[2]],
          ['Thg '+ (dem[1]), array[1]],
          ['Thg '+ (dem[0]), array[0]],
        ]);

        var options = {
          chart: {
            title: 'Doanh thu hàng tháng (12 tháng)','width':500, 'height':400
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <script>
	    
    </script>
@endsection




