@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ>></a><a href="javascript:void(0)">Email</a>
      </li>
    
    </ul><!-- /.breadcrumb -->  
  </div>
  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <div class="hr hr-18 hr-double dotted"></div>
      <div class="widget-box">
        <div class="widget-header widget-header-blue widget-header-flat" style="text-align: center;">
          <h4 class="widget-title lighter" >DANH SÁCH EMAIL ĐĂNG KÝ</h4>
          <div class="widget-toolbar">
          
          </div>
        </div>
      </div>
      <div class="hr hr-18 hr-double dotted"></div>

    </div><!-- /.col -->
  </div><!-- /.row -->
  <div class="page-content">
    <!-- /.page-header -->
    <div class="row">
      <div class="col-md-12">
      	<a href="#" class= "btn btn-info" id="guimail" style="float: right;"> Gửi mail</a>
        <table class="table" id="myTable">
           <thead>
              <tr style="margin: 0px">
                <th style="width: 8%; ">Mã số</th>
                <th style="width: 80% ">Email</th>
                <th style="width: 20%">Chức năng</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 0;  ?>
            @foreach ($data as $item) 
              	<tr>
	                <td>{{ $item->id }}</td>
	                <td>{{ $item->email}}</td>
                	<td>
					<label>
						<input name="form-field-checkbox" class="ace" type="checkbox">
						<span class="lbl"> </span>
					</label> </td>
           		</tr>					
              
            @endforeach
                                  
            </tbody>
          </table>
          {{ $data->render() }}
      </div>
    </div>
  </div><!-- /.page-content -->
</div> 
<script>
    



</script>




@endsection



