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
					<table class="table" style="text-align: center;">
						<h3><b>DANH SÁCH SẢN PHẨM</b></h3>
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
	                    <td>{{ $item->gia }}</td>
	                  
	                    
	                    <td>{{ $item->diem_thuong}}</td>
	          
	                    
	                    
	                    <td>
	                      <a style="margin-right: 0px; padding: 0px; width: 40px" class="btn btn-info" data-toggle="tooltip" title="Chỉnh sửa" href="{{ route('CHINH_SUA_SAN_PHAM', $item->id_sanpham)  }}"><i class="fa fa fa-pencil fa-fw"></i></a>
	                                          
	                      <a style="padding-left:10px; padding: 0px; margin:0px; width: 40px" data-toggle="tooltip" title="Chi tiết" class="btn btn-success" href="{{ route('CHI_TIET_SAN_PHAM', $item->id_sanpham)  }}"><i class="	fa fa-info-circle"></i></a>
	                 
	                      <a style="margin: 0px; padding: 0px; width: 40px" data-toggle="tooltip" title="Xóa" class="btn btn-danger" href="{{ route('XOA_SAN_PHAM', $item->id_sanpham)}}"><i class="fa fa fa-trash-o fa-fw"></i></a>
	                   
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