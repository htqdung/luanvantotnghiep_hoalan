@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="#">Trang chủ</a>
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
	        <a style="float: right; padding: 0px; margin-left: 5px" class="btn btn-success" href="#"><i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Làm mới</a>
	        <a class="btn btn-success" style="float: right; padding: 0px" href="#"><i class="fa fa-plus-circle fa-spin fa-1x fa-fw"></i> Thêm hoa</a>
	      </div>
		<div class="row" >
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<h3><b>DANH MỤC HOA</b></h3>
				    <thead>
				      <tr>
				        <th style="width: 5%">Id</th>
				        <th style="width: 15%">Tên loài</th>
				         <th style="width: 15%">Tên khoa học</th>
				         <th style="width: 35%">Mô tả</th>  							   
				        <th style="width: 30%">Chức năng</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr>
				        <td>1</td>
				        <td>Lan vũ nữ</td>
				        <td>Arachnis annamensis</td>
				        <td> Thân dài, Chùm hoa dài 50–60 cm, số lượng khoảng từ 15-20 chiếc. Hoa to 4–5 cm, nở hoa vào mùa xuân, hoa không có mùi thơm, lá cứng dài từ 30 cm đến 40 cm.</td>
				        <td>
				        	<a style="margin-right: 0px; padding: 0px; width: 100px" class="btn btn-info" href="#"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>Chỉnh sửa</a>
	                    	<a style="padding-left:10px; padding: 0px; margin:0px; width: 100px" class="btn btn-warning" href="#"><i class="glyphicon glyphicon-folder-open"></i> Chi tiết</a>
	                    	<a style="margin: 0px; padding: 0px; width: 100px" class="btn btn-danger" href="#"><i class="fa fa-close fa-spin fa-1x fa-fw"></i>Xóa</a>
	                    </td>
				      </tr>	
				      <tr>
				        <td>1</td>
				        <td>Lan vũ nữ</td>
				        <td>Arachnis annamensis</td>
				        <td> Thân dài, Chùm hoa dài 50–60 cm, số lượng khoảng từ 15-20 chiếc. Hoa to 4–5 cm, nở hoa vào mùa xuân, hoa không có mùi thơm, lá cứng dài từ 30 cm đến 40 cm.</td>
				        <td>
				        	<a style="margin-right: 0px; padding: 0px; width: 100px" class="btn btn-info" href="#"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>Chỉnh sửa</a>
	                    	<a style="padding-left:10px; padding: 0px; margin:0px; width: 100px" class="btn btn-warning" href="#"><i class="glyphicon glyphicon-folder-open"></i> Chi tiết</a>
	                    	<a style="margin: 0px; padding: 0px; width: 100px" class="btn btn-danger" href="#"><i class="fa fa-close fa-spin fa-1x fa-fw"></i>Xóa</a>
	                    </td>
				      </tr>	
				      	
				      
	                  					      
				    </tbody>
				  </table>
			</div>
		</div>
	</div><!-- /.page-content -->
</div>
@endsection