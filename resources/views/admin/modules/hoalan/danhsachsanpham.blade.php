@extends('admin.layout.index')
@section('main-content')

<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href=" {{ route('MO_GIAO_DIEN_ADMIN') }} ">Trang chủ</a>
			</li><li><a href="javascript:void(0)">Danh mục sản phẩm</a></li>
		</ul><!-- /.breadcrumb -->
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="hr hr-18 hr-double dotted"></div>
			<div class="widget-box">
				<div class="widget-header widget-header-blue widget-header-flat" style="text-align: center;">
					<h4 class="widget-title lighter" >DANH MỤC SẢN PHẨM</h4>
					<div class="widget-toolbar">
						<a href="{{ route('THEM_SAN_PHAM') }}"><button class="btn btn-white btn-info btn-bold"  ><i class="ace-icon fa fa-plus bigger-120 blue"></i> Thêm mới  </button></a>
					</div>
				</div>
			</div>
		</div><!-- /.col -->
	</div>
	<div class="page-content">
		<!-- /.page-header -->
		<div class="box box-primary">

			<div class="row">
				<div class="col-md-12">
					<table class="table" id="myTable">
					    <thead>
					      <tr>
					        <th style="width: 7%">Mã số</th>
					        <th style="width: 30% ">Tên sản phẩm</th>
					        <th style="width: 10%">Đơn giá</th>				       						
					        <th style="width: 10% ">Điểm thưởng</th>
					        <th  style="width: 15%">Chức năng</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<?php $i=0 ?>
					      @foreach ($data as $item)
	                  <tr>
	                    <td>{{ $item->id_sanpham }}</td>
	                    <td><a href="{{ route('CHINH_SUA_SAN_PHAM', $item->id_sanpham)  }}">{{ $item->ten_san_pham }}</a></td>
	                    <td> <?= number_format($item->gia); ?> VND</td>
	                    <td>{{ $item->diem_thuong}}</td>

	                    <td>
	                   	
						            <a type="button" id="chitiet" class="btn btn-warning" title="XEM CHI TIẾT" style=" margin: 0px; padding: 0px; width: 40px" data-‌​id="{{ $item->id_sanpham }}" onclick="clickme<?= $i; ?>()" data-toggle="modal" data-target="#myModal{{ $item->id_sanpham }}"><i class="fa fa-eye fa-fw"></i>
                        </a>
          							<!-- Modal -->
          							<div id="myModal{{ $item->id_sanpham }}" class="modal fade" role="dialog">
          							  <div class="modal-dialog">
          							    <!-- Modal content-->
          							    <div class="modal-content modal_sanpham_width">
          							      <div class="modal-header">
          							        <button type="button" class="close" data-dismiss="modal">&times;</button>
          							        <h4 class="modal-title">{{ $item->ten_san_pham }}</h4>
          							        <p>Loài: <i id="loai<?= $i;  ?>"></i></p>
          							      </div>
          							      	<div class="modal-body">

          							        <div id="hinh_anh_slide<?= $i; $i++; ?>">
          				                      
  	                          	</div>
          			                       
          			                       
          			                 <div class="clearfix" ></div>
          							        <p style = "padding-top: 25px"><b>Giá: </b> <?= number_format($item->gia); ?>VND</p>
          							        
          							        <p><b>Điểm thưởng: </b>{{ $item->diem_thuong }}</p>
          							        <p><b>Kích thước: </b> <?= $item->kich_thuoc;?> </p>
                                <p><b>Mô tả: </b> <?= $item->mo_ta;?> </p>
                                
          							      </div>
          							      <div class="modal-footer">
          							        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          							      </div>
          							    </div>

          							  </div>
          							</div>

	                      <a style="margin-right: 0px; padding: 0px; width: 40px" class="btn btn-info" data-toggle="tooltip" title="Chỉnh sửa" href="{{ route('CHINH_SUA_SAN_PHAM', $item->id_sanpham)  }}"><i class="fa fa fa-pencil fa-fw"></i></a>

	                      <a type="button" class="btn btn-danger" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal"   data-target="#removeUser{{ $item->id_sanpham }}"><i class="fa fa fa-trash-o fa-fw"></i></a>
		                 </td>
		                  <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser{{ $item->id_sanpham }}" role="dialog" tabindex="-1">
        						    <div class="modal-dialog" role="document">
        						        <div class="modal-content">
        						            <div class="modal-header">
        						                <h4 class="modal-title">Bạn có chắc chắn?</h4>
        						            </div>
        						            <div class="modal-body">
        						                <p>Sau khi nhấn đồng ý. Dữ liệu liên quan đến sản phẩm {{ $item->ten_san_pham }} sẽ bị xóa bỏ!</p>
        						            </div>
        						            <div class="modal-footer">
        						                <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
        						                <a class="btn btn-danger" href="{{ route('XOA_SAN_PHAM', $item->id_sanpham) }}" id="remove-button" type="submit">Đồng ý</a>
        						            </div>
        						        </div><!-- end modal-content -->
        						    </div><!-- end modal-dialog -->
        						  </div><!-- end modal -->
	                 </tr> 
	                @endforeach    	      
					    </tbody>
					  </table>
					  {{ $data->render() }}
				</div>
			</div>
		</div><!-- /.page-content -->
	</div>
</div>

<script>
function clickme0() {
    var x = document.getElementById("myTable").rows[1].cells[0].innerHTML;
    var path = 'ajax-lay-danh-mua-loai-hoa/'+x;

    $.ajax({
        url: path,
        type: 'GET'
    })
   .done(function(argument) {
   		// console.log(argument);
        var dung = new String();
        var hinh  = new String();
        argument.forEach(function(data){
        	// console.log(data);
          // console.log(data);
          if(data.ten_loai == null)
          {
             
          }
          else
          {
            dung += data.ten_loai +'-';  
          }

          if(data.ten_hinh == null)
          {

          }
          else
          {
            hinh += '<ul class="ace-thumbnails clearfix"><li><a href="/public/sanpham/'+data.ten_hinh+'" title="Photo Title" data-rel="colorbox"><img width="150" height="150" alt="150x150" src="/public/sanpham/'+data.ten_hinh+'"></a></li></ul>';
          }
          
        })
        $("#loai0").html(dung);
        $("#hinh_anh_slide0").html(hinh);
        // console.log(dung);


    })


  }
function clickme1() {
    var x = document.getElementById("myTable").rows[2].cells[0].innerHTML;
    var path = 'ajax-lay-danh-mua-loai-hoa/'+x;

    $.ajax({
        url: path,
        type: 'GET'
    })
   .done(function(argument) {
   		// console.log(argument);
        var dung = new String();
        var hinh  = new String();
        argument.forEach(function(data){
          // console.log(data);
          // console.log(data);
          if(data.ten_loai == null)
          {
             
          }
          else
          {
            dung += data.ten_loai +'-';  
          }

          if(data.ten_hinh == null)
          {

          }
          else
          {
            hinh += '<ul class="ace-thumbnails clearfix"><li><a href="/public/sanpham/'+data.ten_hinh+'" title="Photo Title" data-rel="colorbox"><img width="150" height="150" alt="150x150" src="/public/sanpham/'+data.ten_hinh+'"></a></li></ul>';
          }
          
        })
        $("#loai1").html(dung);
        $("#hinh_anh_slide1").html(hinh);
    })
   
  }
  function clickme2() {
    var x = document.getElementById("myTable").rows[3].cells[0].innerHTML;
    var path = 'ajax-lay-danh-mua-loai-hoa/'+x;

    $.ajax({
        url: path,
        type: 'GET'
    })
   .done(function(argument) {
   		var dung = new String();
      var hinh  = new String();
      argument.forEach(function(data){
        // console.log(data);
        // console.log(data);
        if(data.ten_loai == null)
        {
           
        }
        else
        {
          dung += data.ten_loai +'-';  
        }

        if(data.ten_hinh == null)
        {

        }
        else
        {
          hinh += '<ul class="ace-thumbnails clearfix"><li><a href="/public/sanpham/'+data.ten_hinh+'" title="Photo Title" data-rel="colorbox"><img width="150" height="150" alt="150x150" src="/public/sanpham/'+data.ten_hinh+'"></a></li></ul>';
        }
        
      })
      $("#loai2").html(dung);
      $("#hinh_anh_slide2").html(hinh);
    })
   
  }
  function clickme3() {
    var x = document.getElementById("myTable").rows[4].cells[0].innerHTML;
    var path = 'ajax-lay-danh-mua-loai-hoa/'+x;

    $.ajax({
        url: path,
        type: 'GET'
    })
   .done(function(argument) {
   		var dung = new String();
        var hinh  = new String();
        argument.forEach(function(data){
          // console.log(data);
          // console.log(data);
          if(data.ten_loai == null)
          {
             
          }
          else
          {
            dung += data.ten_loai +'-';  
          }

          if(data.ten_hinh == null)
          {

          }
          else
          {
            hinh += '<ul class="ace-thumbnails clearfix"><li><a href="/public/sanpham/'+data.ten_hinh+'" title="Photo Title" data-rel="colorbox"><img width="150" height="150" alt="150x150" src="/public/sanpham/'+data.ten_hinh+'"></a></li></ul>';
          }
          
        })
        $("#loai3").html(dung);
        $("#hinh_anh_slide3").html(hinh);
    })
   
  }
  function clickme4() {
    var x = document.getElementById("myTable").rows[5].cells[0].innerHTML;
    var path = 'ajax-lay-danh-mua-loai-hoa/'+x;

    $.ajax({
        url: path,
        type: 'GET'
    })
   .done(function(argument) {
   		  var dung = new String();
        var hinh  = new String();
        argument.forEach(function(data){
          // console.log(data);
          // console.log(data);
          if(data.ten_loai == null)
          {
             
          }
          else
          {
            dung += data.ten_loai +'-';  
          }

          if(data.ten_hinh == null)
          {

          }
          else
          {
            hinh += '<ul class="ace-thumbnails clearfix"><li><a href="/public/sanpham/'+data.ten_hinh+'" title="Photo Title" data-rel="colorbox"><img width="150" height="150" alt="150x150" src="/public/sanpham/'+data.ten_hinh+'"></a></li></ul>';
          }
          
        })
        $("#loai4").html(dung);
        $("#hinh_anh_slide4").html(hinh);
    })
  }
</script>
@endsection