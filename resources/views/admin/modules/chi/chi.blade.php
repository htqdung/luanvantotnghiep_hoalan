@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
		        <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ>></a><a href="javascript:void(0)">Danh mục chi</a>
			</li>
		
		</ul><!-- /.breadcrumb -->	
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="hr hr-18 hr-double dotted"></div>
			<div class="widget-box">
				<div class="widget-header widget-header-blue widget-header-flat" style="text-align: center;">
					<h4 class="widget-title lighter" >DANH MỤC CHI</h4>
					<div class="widget-toolbar">
						<a href="{{ route('THEM_CHI') }}"><button class="btn btn-white btn-info btn-bold"  ><i class="ace-icon fa fa-plus bigger-120 blue"></i> Thêm mới  </button></a>
					</div>
				</div>
			</div>
			<div class="hr hr-18 hr-double dotted"></div>

		</div><!-- /.col -->
	</div><!-- /.row -->
	<div class="page-content">
		<!-- /.page-header -->
		<div class="row">
			<div class="col-md-12">
				<table class="table" >
				    <thead>
				      <tr>
				        <th style="width: 3%">Mã số</th>
				        <th style="width: 8%">Tên chi</th>
				        <th style="width: 8%">Tên khoa học</th>
				        <th style="width: 13%">Lá</th>
				        <th style="width: 13%">Thân</th>
				         <th style="width:12%">Rễ</th>
				        <th style="width: 12%">Cành</th>
				        <th style="width: 12%">Hoa</th>							   
				        <th style="width: 14%">Chức năng</th>
				      </tr>
				    </thead>
				    <tbody>
				<?php $i; $arr[][]="";?>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
				        <td>{{ $item->ten_chi }}</td>
						<td>{{ $item->ten_khoa_hoc_chi }}</td>
						<td> <?= substr($item->chi_la, 0, 100);  ?> <?php if(strlen($item->chi_la) > 100) echo  '.....'; ?></td>
						<td> <?= substr($item->chi_than, 0, 100);  ?> <?php if(strlen($item->chi_than) > 100) echo  '.....'; ?></td>
						<td> <?= substr($item->chi_re, 0, 100);  ?> <?php if(strlen($item->chi_re) > 100) echo  '.....'; ?></td>				     
						<td> <?= substr($item->chi_canh, 0, 100);  ?> <?php if(strlen($item->chi_canh) > 100) echo  '.....'; ?></td>
						<td> <?= substr($item->chi_hoa, 0, 100);  ?> <?php if(strlen($item->chi_hoa) > 100) echo  '.....'; ?></td>

						<td>
							
							<a type="button" class="btn btn-warning" title="XEM CHI TIẾT" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal" data-target="#myModal{{ $item->id }}"><i class="fa fa-eye fa-fw"></i></a>
							<!-- Modal -->
							
								<div id="myModal{{ $item->id }}" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">{{ $item->ten_chi }}</h4>
							       
							      </div>
								
							      <div class="modal-body">
							      	<p><b>Tên khoa học: </b>{{ $item->ten_khoa_hoc_chi }}</p>
							        <p><b>Hoa: </b>{{ $item->chi_hoa }}</p>
							        <p><b>Lá: </b>{{ $item->chi_la }}</p>
							        <p><b>Thân: </b>{{ $item->chi_than }}</p>
							        <p><b>Rễ: </b>{{ $item->chi_re }}</p>
							        <p><b>Cành: </b>{{ $item->chi_canh }}</p>
							        <p><b>Mô tả: </b> <?= $item->mo_ta;?> </p>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
							      </div>
							    </div>

							  </div>
							

							</div>
							
		                     <a style="margin-right: 0px; padding: 0px; width: 40px" class="btn btn-info" data-toggle="tooltip" title="Chỉnh sửa" href="{{ route('CHINH_SUA_CHI', $item->id) }}"><i class="fa fa fa-pencil fa-fw"></i></a>
		                      {{-- <a style="margin: 0px; padding: 0px; width: 40px" data-toggle="tooltip" title="Xóa" id="btnDelete" class="btn btn-danger" href="{{ route('XOA_CHI', $item->id) }}"><i class="fa fa fa-trash-o fa-fw"></i></a> --}}
		                    <a type="button" class="btn btn-danger" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal"   data-target="#removeUser{{ $item->id }}"><i class="fa fa fa-trash-o fa-fw"></i></a>
		                 </td>
		                 <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser{{ $item->id }}" role="dialog" tabindex="-1">
						    <div class="modal-dialog" role="document">
						        <div class="modal-content">
						            <div class="modal-header">
						                <h4 class="modal-title">Bạn có chắc chắn?</h4>
						            </div>
						            <div class="modal-body">
						                <p>Sau khi nhấn đồng ý, Chi {{ $item->ten_chi }} dữ liệu liên quan đến chi <?php $tmp; ?> sẽ bị xóa bỏ!</p>
						            </div>
						            <div class="modal-footer">
						                <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
						                <a class="btn btn-danger" href="{{ route('XOA_CHI', $item->id) }}" id="remove-button" type="submit">Đồng ý</a>
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



<script>
	$(document).ready(function() {

	  $('#btnDelete').click(function() {
	    bootbox.confirm("Are you sure want to delete?", function(result) {
	      alert("Confirm result: " + result);
	    });
	  });
	});
</script>
@endsection