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

	    
    </div>
    <div class="box-header with-border" style=" padding-top:10px">
        <a style="float: right; padding: 0px; margin-left: 5px" class="btn btn-warning" href="javascript:history.go(-1);"><i class="" ></i>Quay lại</a> 
    </div>
    <div class="box-header with-border">
       
    </div>
	<div style="color: #2B7DBC" >
		<h1 >
			
				<b>Thông tin chi tiết </b>
		</h1>
	</div>
	<div id="collapseOne" class="panel-collapse collapse in"
		role="tabpanel" aria-labelledby="headingOne">
		<div class="panel-body">
			<form class="profileForm" action="#">
				<table class="table table-responsive" id="tblAccounts">
					<tbody class="">
						<tr >
							<td style="width: 15%"><h3><b>Tên chi:</b></h3></td>
							<td class="form-value1" id="tdinputName" >{{ $data[0]->ten_chi}}</td>
							
						</tr>
						<tr >
							<td style="width: 15%"><h3><b>Tên khoa học:</b></h3></td>
							<td class="form-value1" id="tdinputName" >{{ $data[0]->ten_khoa_hoc_chi}}</td>
							
						</tr>
						<tr >
							<td style="width: 15%"><h3><b>Hoa:</b></h3></td>
							<td class="form-value1" id="tdinputName" >{{ $data[0]->chi_hoa}}</td>
							
						</tr>
						<tr >
							<td style="width: 15%"><h3><b>Lá:</b></h3></td>
							<td class="form-value1" id="tdinputName" >{{ $data[0]->chi_la}}</td>
							
						</tr>
						<tr >
							<td style="width: 15%"><h3><b>Thân:</b></h3></td>
							<td class="form-value1" id="tdinputName" >{{ $data[0]->chi_than}}</td>
							
						</tr>
						<tr>
							<td style="width: 15%"><h3><b>Rễ:</b></h3></td>
							<td class="form-value1" id="tdinputDOB" >{{ $data[0]->chi_re}}</td>
							
						</tr>
						<tr>
							<td style="width: 15%"><h3><b>Cành:</b></h3></td>
							<td class="form-value1" id="tdinputDOB" >{{ $data[0]->chi_canh}}</td>
							
						</tr>	
							
					
					</tbody>
				</table>
				
					<h1 style="color: #2B7DBC"><b>Mô tả:</b></h1>
					
							 <?= $data[0]->mo_ta;?>
			</form>

		</div>
	</div>
</div>

  
@endsection
