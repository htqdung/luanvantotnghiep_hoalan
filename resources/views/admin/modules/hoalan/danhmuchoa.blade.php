@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href=" {{ route('MO_GIAO_DIEN_ADMIN') }} ">Trang chủ</a>
			</li>
			<li><a href="javascript:void(0)">Danh mục loài hoa</a></li>
		</ul><!-- /.breadcrumb -->
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="hr hr-18 hr-double dotted"></div>
			<div class="widget-box">
				<div class="widget-header widget-header-blue widget-header-flat" style="text-align: center;">
					<h4 class="widget-title lighter" >DANH MỤC LOÀI HOA</h4>
					<div class="widget-toolbar">
						<a href="{{ route('THEM_DANH_MUC_HOA') }}"><button class="btn btn-white btn-info btn-bold"  ><i class="ace-icon fa fa-plus bigger-120 blue"></i> Thêm mới  </button></a>
						
					</div>
				</div>
			</div>
		</div><!-- /.col -->
	</div>
	<div class="page-content">
		<div class="box box-primary">
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						
					    <thead>
					      <tr>
					        <th style="width: 5%">Mã số</th>
					        <th style="width: 15%">Tên loài</th>
					         <th style="width:15%">Tên khoa học</th>
					         <th style="width:15%">Chi</th>
					         <th style="width:15%">Đặc điểm</th>
					         
					         <th style="width:15%">Chức năng</th>
					      </tr>
					    </thead>
					    <tbody>
					    
					    	@foreach ($data as $item)
					        <tr>
					      		<td>{{ $item->id }}</td>
						        <td>{{ $item->ten_loai}}</td>
						        <td>{{ $item->ten_khoa_hoc }}</td>
						        <td>{{ $item->ten_chi }}</td>
						        <td> <?php
						        		$hoa = $item->hoa;
						        		$la = $item->la;
						        		$than = $item->than;
						        		$re = $item->re;
						        		$tmp = 'Hoa: '.$hoa.', Lá: '.$la.', Thân: '.$than.' ,Rễ: '.$re;
						         $tmp = substr( $tmp, 0, 20); echo $tmp; echo  '.....'; ?> <?php if(strlen( $tmp) > 20) echo  '.....'; ?></td>
						        {{-- <td>{{  }}, {{ $item->la }},{{ $item->than }},{{ $item->re }}</td> --}}
						        
			                    <td>
			                      	<a type="button" class="btn btn-warning" title="XEM CHI TIẾT" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal" data-target="#myModal{{ $item->id }}"><i class="fa fa-eye fa-fw"></i></a>
							<!-- Modal -->
									<div id="myModal{{ $item->id }}" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title">{{ $item->ten_loai }}</h4>
									       
									      </div>
									      <div class="modal-body">
									        
									        <p><b>Tên khoa học: </b>{{ $item->ten_khoa_hoc }}</p>
									        <p><b>Tên chi: </b>{{ $item->ten_chi }}</p>
									        <p><b>Đặc điểm: </b>

		                                      Hoa: {{ $item->hoa }}, Lá: {{ $item->la }}, Thân: {{ $item->than }}, Rễ:{{ $item->re }}
		                                      </p>
									        
									        <p><b>Mô tả: </b> <?= $item->mo_ta;?> </p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
									      </div>
									    </div>

									  </div>
									</div>
			                      <a style="margin-right: 0px; padding: 0px; width: 40px" class="btn btn-info" data-toggle="tooltip" title="Chỉnh sửa" href="{{ route('CHINH_SUA_HOA', $item->id) }}"><i class="fa fa fa-pencil fa-fw"></i></a>
			                                          
			                      
			                      <a type="button" class="btn btn-danger" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal"   data-target="#removeUser{{ $item->id }}"><i class="fa fa fa-trash-o fa-fw"></i></a>
				                 </td>
				                 <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser{{ $item->id }}" role="dialog" tabindex="-1">
								    <div class="modal-dialog" role="document">
								        <div class="modal-content">
								            <div class="modal-header">
								                <h4 class="modal-title">Bạn có chắc chắn?</h4>
								            </div>
								            <div class="modal-body">
								                <p>Sau khi nhấn đồng ý. Dữ liệu liên quan đến chi {{ $item->ten_loai }} sẽ bị xóa bỏ!</p>
								            </div>
								            <div class="modal-footer">
								                <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
								                <a class="btn btn-danger" href="{{ route('XOA_LOAI_HOA', $item->id) }}" id="remove-button" type="submit">Đồng ý</a>
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