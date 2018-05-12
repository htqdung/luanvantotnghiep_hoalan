@extends('admin.layout.index')
@section('main-content')
		<!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
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
    <div class="box-header with-border" style=" padding-top:10px">
        <a style="float: right; padding: 0px; margin-left: 5px" class="btn btn-warning" href="{{ route('DANH_SACH_CHi') }}"><i class="" ></i>Quay lại</a> 
    </div>
    <div class="box-header with-border">
       
    </div>
	<div class="panel-heading" role="tab" id="headingOne">
		<h1 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion"
				href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				<b>Thông tin chi tiết </b></a>
		</h1>
	</div>
	<div id="collapseOne" class="panel-collapse collapse in"
		role="tabpanel" aria-labelledby="headingOne">
		<div class="panel-body">
			<form class="profileForm" action="#">
				<table class="table table-responsive" id="tblAccounts">
					<tbody class="">
						<tr >
							<td style="width: 25%"><b>Tên chi:</b></td>
							<td class="form-value1" id="tdinputName" >{{ $data[0]->ten_chi}}</td>
							
						</tr>
						<tr >
							<td style="width: 15%"><b>Cánh hoa:</b></td>
							<td class="form-value1" id="tdinputName" >{{ $data[0]->canh_hoa}}</td>
							
						</tr>
						<tr>
							<td style="width: 15%"><b>Đài hoa:</b></td>
							<td class="form-value1" id="tdinputDOB" >{{ $data[0]->dai_hoa}}</td>
							
						</tr>
						<tr>
							<td style="width: 15%"><b>Bông hoa:</b></td>
							<td class="form-value1" id="tdinputDOB" >{{ $data[0]->bong_hoa}}</td>
							
						</tr>	
							
					
					</tbody>
				</table>
				
					<h4><b>Mô tả:</b></h4>
					
							 <?= $data[0]->mo_ta;?>
			</form>

		</div>
	</div>
</div>

  
@endsection
