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

		<div class="nav-search" id="nav-search">
			<form class="form-search">
				<span class="input-icon">
					<input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
					<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- /.nav-search -->
	</div>
	<div class="page-content">
		<!-- /.page-header -->
		 <div class="box box-primary">
	      <div class="box-header with-border">
	         <a class="btn btn-primary" style="float: right; padding: 0px" href="{{ route('THEM_TAGS') }}"><i class="fa fa fa-plus  fa-1x fa-fw"></i> Thêm mới</a>
	 
	      </div>
		<div class="row" >
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<h3><b>DANH SÁCH TAGS</b></h3>
				    <thead>
				      <tr>
				        <th style="width: 10%">Mã số</th>
				        <th style="width: 80%">Tên tags</th>
				        
				        <th style="width: 10%">Chức năng</th>
				      </tr>
				    </thead>
				    <tbody>
				     	
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
				        <td>{{ $item->ten_tags }}</td>
						
						<td>
							
		                      <a style="margin-right: 0px; padding: 0px; width: 40px" class="btn btn-info" data-toggle="tooltip" title="Chỉnh sửa" href="{{ route('CHINH_SUA_TAGS', $item->id) }}"><i class="fa fa fa-pencil fa-fw"></i></a>
		                      <a style="margin: 0px; padding: 0px; width: 40px" data-toggle="tooltip" title="Xóa" class="btn btn-danger" href="{{ route('XOA_TAGS', $item->id) }}"><i class="fa fa fa-trash-o fa-fw"></i></a>
		                 </td>
				       
				      </tr>	
				      
					  @endforeach
				            				      
				    </tbody>
				  </table>
				  {{ $data->render() }}
				</div>
			</div>
		</div>
	</div><!-- /.page-content -->
</div>
@endsection