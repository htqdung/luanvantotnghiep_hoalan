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
	         <a class="btn btn-primary" style="float: right; padding: 0px" href="{{ route('THEM_CHI') }}"><i class="fa fa fa-plus  fa-1x fa-fw"></i> Thêm mới</a>
	
	      </div>
		<div class="row" >

		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<h3><b>CHI</b></h3>
				    <thead>
				      <tr>
				        <th style="width: 7%">Mã số</th>
				        <th style="width: 15%">Tên chi</th>
				        <th style="width: 15%">Cánh hoa</th>
				        <th style="width: 15%">Đài hoa</th>
				        <th style="width: 15%">Bông hoa</th>
				         							   
				        <th style="width: 10%">Chức năng</th>
				      </tr>
				    </thead>
				    <tbody>
				     
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
				        <td>{{ $item->ten_chi }}</td>
						<td>{{ $item->canh_hoa }}</td>
						<td>{{ $item->dai_hoa }}</td>
						<td>{{ $item->bong_hoa }}</td>
				        
				        <?php $tmp = $item->ten_chi; 
				        		$id_chi = $item->id;
				        ?>
						<td>
							<a style=" margin: 0px; padding: 0px; width: 40px" class="btn btn-warning" data-toggle="tooltip" title="Chi tiết"  href="{{ route('CHI_TIET_CHI', $item->id) }}"><i class="glyphicon glyphicon-folder-open"></i></a>
		                      <a style="margin-right: 0px; padding: 0px; width: 40px" class="btn btn-info" data-toggle="tooltip" title="Chỉnh sửa" href="{{ route('CHINH_SUA_CHI', $item->id) }}"><i class="fa fa fa-pencil fa-fw"></i></a>
		                      {{-- <a style="margin: 0px; padding: 0px; width: 40px" data-toggle="tooltip" title="Xóa" id="btnDelete" class="btn btn-danger" href="{{ route('XOA_CHI', $item->id) }}"><i class="fa fa fa-trash-o fa-fw"></i></a> --}}
		                      <a type="button" class="btn btn-danger" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal" data-target="#removeUser"><i class="fa fa fa-trash-o fa-fw"></i></a>
		                 </td>
				       
				      </tr>	
				      
					  @endforeach
				            				      
				    </tbody>
				  </table>
			</div>
		</div>
	</div><!-- /.page-content -->
</div>

<div aria-labelledby="myModalLabel" class="modal fade" id="removeUser" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Bạn có chắc chắn?</h4>
            </div>
            <div class="modal-body">
                <p>Sau khi nhấn đồng ý, dữ liệu liên quan đến chi <?php $tmp; ?> sẽ bị xóa bỏ!</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
                <a class="btn btn-danger" href="{{ route('XOA_CHI', $id_chi) }}" id="remove-button" type="submit">Đồng ý</a>
            </div>
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div><!-- end modal -->




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