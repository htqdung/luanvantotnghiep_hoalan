@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ>></a><a href="javascript:void(0)">Danh sách khuyến mại</a>
      </li>
    
    </ul><!-- /.breadcrumb -->  
  </div>
  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <div class="hr hr-18 hr-double dotted"></div>
      <div class="widget-box">
        <div class="widget-header widget-header-blue widget-header-flat" style="text-align: center;">
          <h4 class="widget-title lighter" >DANH SÁCH QUÀ TẶNG</h4>
          <div class="widget-toolbar">
            <button class="btn btn-white btn-info btn-bold"  ><i class="ace-icon fa fa-plus bigger-120 blue"></i> <a href="{{ route('THEM_QUA_TANG') }}">Thêm mới</a>  </button>
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
        <table class="table">
             <thead>
                  <tr style="margin: 0px">
                    <th style="width: 5%">Mã số</th>
                    <th style="width: 25%">Tên quà tặng</th>
                    <th style="width: 30%">Chương trình áp dụng</th>
                    <th style="width: 30%">Số lượng</th>
                    
                    <th style="width: 10%; text-align: center;">Chức năng</th>
                  </tr>
                  </thead>
                   <tbody>
                   <?php $i; $arr[][]="";?>
            @foreach ($data as $item) 
              <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->ten_qua_tang }}</td>
                    <td>{{ $item->ten_chuong_trinh }}</td>
                    <td>{{ $item->so_luong}}</td>  
                    <td>
                         <a style="margin-right: 0px; padding: 0px; width: 40px" class="btn btn-info" data-toggle="tooltip" title="Chỉnh sửa" href="{{ route('CHINH_SUA_QUA_TANG', $item->id) }}"><i class="fa fa fa-pencil fa-fw"></i></a>
                          {{-- <a style="margin: 0px; padding: 0px; width: 40px" data-toggle="tooltip" title="Xóa" id="btnDelete" class="btn btn-danger" href="{{ route('XOA_CHI', $item->id) }}"><i class="fa fa fa-trash-o fa-fw"></i></a> --}}
                        <a type="button" class="btn btn-danger" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal"   data-target="#removeUser{{ $item->id }}"><i class="fa fa fa-trash-o fa-fw"></i></a>
                     </td>
                     <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser{{ $item->id }}" role="dialog" tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Bạn có chắc chắn?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Sau khi nhấn đồng ý, Quà tặng {{ $item->id }} dữ liệu liên quan đến ưu đãi <?php $tmp; ?> sẽ bị xóa bỏ!</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
                                    <a class="btn btn-danger" href="{{ route('XOA_QUA_TANG', $item->id) }}" id="remove-button" type="submit">Đồng ý</a>
                                </div>
                            </div><!-- end modal-content -->
                        </div><!-- end modal-dialog -->
                    </div><!-- end modal -->
               
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
  $(document).ready(function() {

    $('#btnDelete').click(function() {
      bootbox.confirm("Are you sure want to delete?", function(result) {
        alert("Confirm result: " + result);
      });
    });
  });
</script>
@endsection