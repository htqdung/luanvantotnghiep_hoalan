@extends('admin.layout.index')
@section('main-content')
<script>
	function clickme() {
		var id=document.getElementById('chitiet').getAttribute("data-‌​id");
		console.log(id)			;

		$.ajax({
	        url : "http://localhost:8080/luanvantotnghiep_hoalan/public/ajax-lay-danh-mua-loai-hoa/"+id,
	        type : "get", // chọn phương thức gửi là get
	        dateType:"text", // dữ liệu trả về dạng text
	       
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	            // đó vào thẻ div có id = result
	            $('#loai').html(result);
	            // alert(result[0][0]);
	            // console.log(result);
	        }
	    });

	}
	

</script>
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
						<button class="btn btn-white btn-info btn-bold"  ><i class="ace-icon fa fa-plus bigger-120 blue"></i> <a href="{{ route('THEM_SAN_PHAM') }}">Thêm mới</a>  </button>
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
					<table class="table" >
						
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
					    	
					      @foreach ($data as $item)
	                  <tr>
	                    <td>{{ $item->id_sanpham }}</td>
	                    <td><a href="{{ route('CHI_TIET_SAN_PHAM', $item->id_sanpham)  }}">{{ $item->ten_san_pham }}</a></td>
	                    <td> <?= number_format($item->gia); ?> VND</td>
	                    <td>{{ $item->diem_thuong}}</td>
	          
	                    
	                    
	                    <td>
	                   	
						<a type="button" id="chitiet" class="btn btn-warning" title="XEM CHI TIẾT" style=" margin: 0px; padding: 0px; width: 40px" data-‌​id="{{ $item->id_sanpham }}" onclick="clickme()" 
						data-toggle="modal" data-target="#myModal{{ $item->id_sanpham }}
						"><i class="fa fa-eye fa-fw"></i></a>
							<!-- Modal -->
							<div id="myModal{{ $item->id_sanpham }}" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">{{ $item->ten_san_pham }}</h4>
							        <p>Loài: <i id="loai"></i></p>
							      </div>
							      	<div class="modal-body">

							        @foreach($data_hinhanh as $item2)
			                        <div class="col-sm-4 col-xs-4 row center">
			                        	 <a href="../sanpham/<?php echo $item2->ten_hinh; ?>" title="Photo Title" style="margin-top: 0px" data-rel="colorbox">
				                            <img width="" height="150" alt="150x150" src="/luanvantotnghiep_hoalan/public/sanpham/<?= $item2->ten_hinh; ?>" />
				                          </a>
				                         
			                        </div>
			                       
			                         
			                       
			                        @endforeach
			                        <div class="clearfix" ></div>
							        <p style = "padding-top: 25px"><b>Giá: </b> <?=  $item->gia ;?></p>
							        <p><b>Điểm thưởng: </b>{{ $item->diem_thuong }}</p>
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

@endsection