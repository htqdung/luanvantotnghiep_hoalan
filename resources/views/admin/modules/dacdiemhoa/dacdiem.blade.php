@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
        			<a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ</a>
			</li
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
	        <a class="btn btn-success" style="float: right; padding: 0px" href="{{ route('THEM_DAC_DIEM') }}"><i class="fa fa-plus-circle  fa-1x fa-fw"></i> Thêm mới</a>
	      </div>
		<div class="row" >
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<h3><b>ĐẶC ĐIỂM HOA</b></h3>
				    <thead>
				      <tr>
				        <th style="width: 5%">STT</th>
				        <th style="width: 10%">Hoa</th>
				         <th style="width: 15%">Lá</th>
				         <th style="width: 15%">Thân</th>
				         <th style="width: 10%">Rể</th> 
			          	<th style="width: 10%">Thời gian nở</th> 
			           	<th style="width: 15%">Đặc điểm sinh trưởng</th>  
				        <th style="width: 10%" >Chức năng</th>
				      </tr>
				    </thead>
				        <tbody>
				        	<?php $i=1;?>
                @foreach ($data as $item)
                  <tr>
                    <td><?= $i++; ?></td>
                    <td>{{ $item->hoa }}</td>
                    <td>{{ $item->la}}</td>
                    <td>{{ $item->than}}</td>
                    <td>{{ $item->re}}</td>
                    <td>{{ $item->thoigianno}}</td>
                    <td>{{ $item->dac_diem_sinh_truong}}</td>
                    
                    <td>
	                  <a style="margin-right: 0px; padding: 0px; width: 40px" class="btn btn-info" data-toggle="tooltip" title="Chỉnh sửa" href="{{ route('CHINH_SUA_DAC_DIEM', $item->id)  }}"><i class="fa fa fa-pencil fa-fw"></i></a>
	                  <a style="margin: 0px; padding: 0px; width: 40px" data-toggle="tooltip" title="Xóa" class="btn btn-danger" href="{{ route('XOA_DAC_DIEM', $item->id)}}"><i class="fa fa fa-trash-o fa-fw"></i></a>
		                    </td>
                    
                   
                </tr> 
                @endforeach           
              </tbody>           
				  </table>
			</div>
		</div>
	</div><!-- /.page-content -->
</div>
@endsection