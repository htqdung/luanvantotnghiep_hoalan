
@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ</a>
      </li>
    
    </ul><!-- /.breadcrumb -->

   
  </div>

  <div class="page-content">
    <!-- /.page-header -->
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <h3><b>DANH SÁCH ĐƠN HÀNG</b> <button type="" name="in" style="float: right;" >   <i class="  fa fa-print" ></i></button></h3>
          
         {{--  <select name="" onchange="window.location=this.value" id="" style="float: right;" >
            <option value="{{ route('DANH_SACH_TONG') }} ">Tất cả</option>
            <option value="{{ route('DANH_SACH_THANG_MOT') }}">Tháng một</option>
            <option value="{{ route('DANH_SACH_THANG_HAI') }}">Tháng hai</option>
            <option value="{{ route('DANH_SACH_THANG_BA') }}">Tháng ba</option>
            <option value="{{ route('DANH_SACH_THANG_TU') }}">Tháng tư</option>
            <option value="{{ route('DANH_SACH_THANG_NAM') }}">Tháng năm</option>
            <option value="{{ route('DANH_SACH_THANG_SAU') }}">Tháng sáu</option>
            <option value="{{ route('DANH_SACH_THANG_BAY') }}">Tháng bảy</option>
            <option value="{{ route('DANH_SACH_THANG_TAM') }}">Tháng tám</option>
            <option value="{{ route('DANH_SACH_THANG_CHIN') }}">Tháng chín</option>
            <option value="{{ route('DANH_SACH_THANG_MUOI') }}">Tháng mười</option>
            <option value="{{ route('DANH_SACH_THANG_MUOI_MOT') }}">Tháng mười một</option>
            <option value="{{ route('DANH_SACH_THANG_MUOI_HAI') }}">Tháng mười hai</option>
          </select> --}}
                 {{--  <thead>
                  <tr style="margin: 0px">
                    <th style="width: 7%">Mã số</th>
                    <th style="width: 20%">Ngày đặt hàng</th>
                    <th style="width: 17%">Tổng tiền  </th>
                  </tr>
                  </thead>
                   <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->ngay_dat_hang)) }}</td>
                   
                    
                    <td>{{ $item->tong_tien}}</td>
                  
                    
                    
                </tr> 
                @endforeach           
              </tbody>  --}}             
          </table>
      </div>
      <div class="col-sm-12">
    <div class="widget-box">
      <div class="widget-header widget-header-flat widget-header-small">
        

       
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

    </div>
  </div><!-- /.page-content -->
</div>
<script type="text/javascript">
function goto_url(url)
{
if(url!='0')
window.open(''+url+'');
}

</script>
@endsection
