@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href=" {{ route('MO_GIAO_DIEN_ADMIN') }} ">Trang chủ</a>
			</li>
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
						<button class="btn btn-white btn-info btn-bold"  ><i class="ace-icon fa fa-plus bigger-120 blue"></i> <a href="{{ route('THEM_DANH_MUC_HOA') }}">Thêm mới</a>  </button>
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
						        <td>{{ $item->hoa }}, {{ $item->la }}</td>
						        
			                    <td>
			                      <a style="margin-right: 0px; padding: 0px; width: 40px" class="btn btn-info" data-toggle="tooltip" title="Chỉnh sửa" href="{{ route('CHINH_SUA_HOA', $item->id) }}"><i class="fa fa fa-pencil fa-fw"></i></a>
			                                          
			                      
			                      <a style="margin: 0px; padding: 0px; width: 40px" data-toggle="tooltip" title="Xóa" class="btn btn-danger" href="{{ route('XOA-LOAI-HOA', $item->id) }}"><i class="fa fa fa-trash-o fa-fw"></i></a>
			                    </td>
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