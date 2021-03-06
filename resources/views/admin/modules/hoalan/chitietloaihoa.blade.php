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
	    <li><a href="javascript:void(0)">Chi tiết loài hoa</a></li>
	    </ul><!-- /.breadcrumb -->


    </div>
    <div class="box-header with-border" style=" padding-top:10px">
        <a style="float: right; padding: 0px; margin-left: 5px" class="btn btn-warning" href="javascript:history.go(-1);"><i class="" ></i>Quay lại</a> 
    </div>
    <div class="box-header with-border">
       
    </div>
	<div class="panel-heading" role="tab" id="headingOne">
		<h1  style="color: #2B7DBC">
			
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
							<td style="width: 25%"><b>Tên loài:</b></td>
							<td class="form-value1" id="tdinputName" >{{ $data->ten_loai}}</td>
							
						</tr>
						<tr >
							<td style="width: 25%"><b>Tên khoa học:</b></td>
							<td class="form-value1" id="tdinputName" >{{ $data->ten_khoa_hoc}}</td>
							
						</tr>
						<tr>
							<td style="width: 25%"><b>Chi:</b></td>
							<td class="form-value1" id="tdinputDOB" >
							 @foreach ($chi as $item)
                                    <option value="">{{ $item->ten_chi, $item->id  }}</option>
                               @endforeach
                           </td>
							
						</tr>
						<tr>
							<td style="width: 25%"><b>Đặc điểm:</b></td>
							<td class="form-value1" id="tdinputDOB" >
								
                                      @foreach ($dacdiem as $item)
                                        <option value="{{ $item->id }}">Hoa: {{ $item->hoa }}, Lá: {{ $item->la }}, Thân: {{ $item->than }}, Rễ:{{ $item->re }} </option>
                                      @endforeach 
                          
							</td>
							
						</tr>	
							
					
					</tbody>
				</table>
				
					<h1 style="color:#2B7DBC"><b>Mô tả:</b></h1>
					
							 <?= $data->mo_ta;?>
			</form>

		</div>
	</div>
</div>

  
@endsection
