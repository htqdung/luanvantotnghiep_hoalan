@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ>></a><a href="javascript:void(0)">Danh mục khuyến mại</a>
      </li>
    
    </ul><!-- /.breadcrumb -->  
  </div>
  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <div class="hr hr-18 hr-double dotted"></div>
      <div class="widget-box">
        <div class="widget-header widget-header-blue widget-header-flat" style="text-align: center;">
          <h4 class="widget-title lighter" >DANH MỤC KHUYẾN MẠI</h4>
          <div class="widget-toolbar">
            <a href="{{ route('THEM_KHUYEN_MAI') }}"><button class="btn btn-white btn-info btn-bold"  ><i class="ace-icon fa fa-plus bigger-120 blue"></i> Thêm mới  </button></a>
            
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
        <table class="table" id="myTable">
           <thead>
              <tr style="margin: 0px">
                <th style="width: 8%; text-align: center;">Mã số</th>
                <th style="width: 32% ">Tên chương trình</th>
                <th style="width: 15% ">Tỉ lệ giảm (%)</th>
                <th style="width: 15%">Ngày bắt đầu </th>
                <th style="width: 15% ">Ngày kết thúc</th>  
                <th style="width: 20%">Chức năng</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 0;  ?>
            @foreach ($data as $item) 
              <tr>
                <td>{{ $item->chuongtrinhkhuyenmai_id }}</td>
                <td>{{ $item->ten_chuong_trinh}}</td>
                <td>{{ date('d-m-Y', strtotime($item->ngay_bat_dau)) }}</td>
                <td>{{ date('d-m-Y', strtotime($item->ngay_ket_thuc)) }}</td> 
                <td>{{ $item->ti_le_giam_gia}}</td>
                {{-- <td>{{ $item->ten_san_pham}}</td>   --}}
                
            <td>
              <a type="button" onclick="<?php echo 'getTable'.$i.'()';  ?>
              " class="btn btn-warning" title="XEM CHI TIẾT" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal" data-target="#myModal{{ $item->chuongtrinhkhuyenmai_id }}"><i class="fa fa-eye fa-fw"></i></a>
              <!-- Modal -->
                  <div id="myModal{{ $item->chuongtrinhkhuyenmai_id }}" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">{{ $item->ten_chuong_trinh }}</h4>
                         <label for="">Hình quảng cáo</label>
                            <div style="margin-left: 20%; padding-top: 10px " >
                                <a href="/public/khuyenmai/<?= $item->ten_hinh_anh; ?>"> <img src="/public/khuyenmai/<?= $item->ten_hinh_anh; ?>" class="img-rounded" alt="<?= $item->ten_chuong_trinh;  ?>" style="height: 200px; width: 100%">  </a>
                            </div>
                        </div>
                        <div class="modal-body">
                          
                          <p><b>Tỉ lệ giảm giá: </b>  {{ $item->ti_le_giam_gia }}</p>
                          <p><b>Ngày bắt đầu: </b> <?= date('d-m-Y', strtotime($item->ngay_bat_dau)); ?></p>
                          <p><b>Ngày kết thúc: </b><?= date('d-m-Y', strtotime($item->ngay_ket_thuc)); ?></p>   
                          <div class="row">
                            <div class="col-md-12">
                              <table class="table" id="<?php echo 'newTable'.$i; $i++;  ?>">
                                <h3><b>DANH SÁCH SẢN PHẨM</b></h3>
                                        <thead>
                                        <tr style="margin: 0px">
                                          <th style="width: 3%">Mã số</th>
                                          <th style="width: 30%">Tên sản phẩm</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <tr>

                                          </tr>
                                        </tbody>              
                                </table>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                      </div>

                    </div>
                  </div>
                        <a style="margin-right: 0px; padding: 0px; width: 40px" class="btn btn-info" data-toggle="tooltip" title="Chỉnh sửa" href="{{ route('CHINH_SUA_KHUYEN_MAI', $item->chuongtrinhkhuyenmai_id) }}"><i class="fa fa fa-pencil fa-fw"></i></a>
                          {{-- <a style="margin: 0px; padding: 0px; width: 40px" data-toggle="tooltip" title="Xóa" id="btnDelete" class="btn btn-danger" href="{{ route('XOA_CHI', $item->id) }}"><i class="fa fa fa-trash-o fa-fw"></i></a> --}}
                        <a type="button" class="btn btn-danger" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal"  data-target="#removeUser{{ $item->chuongtrinhkhuyenmai_id }}"><i class="fa fa fa-trash-o fa-fw"></i></a>
                     </td>
                     <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser{{ $item->chuongtrinhkhuyenmai_id }}" role="dialog" tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Bạn có chắc chắn?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Sau khi nhấn đồng ý, Khuyến mãi {{ $item->chuongtrinhkhuyenmai_id }} dữ liệu liên quan đến khuyến mãi <?php $tmp; ?> sẽ bị xóa bỏ!</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
                                    <a class="btn btn-danger" href="{{ route('XOA_KHUYEN_MAI', $item->chuongtrinhkhuyenmai_id) }}" id="remove-button" type="submit">Đồng ý</a>
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
  function getTable0() {
    var x = document.getElementById("myTable").rows[1].cells[0].innerHTML;
    var path = 'ajax-lay-danh-sach-san-pham/'+x;
    $.ajax({
        url: path,
        type: 'GET'
    })
   .done(function(argument) { 
        var dung = new String()
        argument.forEach(function(data){
          dung = '<tr><td>'+ data.id_sanpham +'</td><td>'+data.ten_san_pham +'</td></tr>';
          $("#newTable0").append(dung);
        
        })
    })
    
    
   
    
  }
  function getTable1() {
    
    var y = document.getElementById("myTable").rows[2].cells[0].innerHTML;
    var path = 'ajax-lay-danh-sach-san-pham/'+y;
    $.ajax({
        url: path,
        type: 'GET'
    })
    .done(function(argument) {
        var dung = new String()
        argument.forEach(function(data){
          dung = '<tr><td>'+ data.id_sanpham +'</td><td>'+data.ten_san_pham +'</td></tr>';
          $("#newTable1").append(dung);
        
        })
    })
  }

  function getTable2() {
  
    var y = document.getElementById("myTable").rows[3].cells[0].innerHTML;
    var path = 'ajax-lay-danh-sach-san-pham/'+y;
    $.ajax({
        url: path,
        type: 'GET'
    })
    .done(function(argument) {
        var dung = new String()
        argument.forEach(function(data){
          dung = '<tr><td>'+ data.id_sanpham +'</td><td>'+data.ten_san_pham +'</td></tr>';
          $("#newTable2").append(dung);
        
        })
    })
  }

  function getTable3() {
  
    var y = document.getElementById("myTable").rows[4].cells[0].innerHTML;
    var path = 'ajax-lay-danh-sach-san-pham/'+y;
    $.ajax({
        url: path,
        type: 'GET'
    })
   .done(function(argument) {
        var dung = new String()
        argument.forEach(function(data){
          dung = '<tr><td>'+ data.id_sanpham +'</td><td>'+data.ten_san_pham +'</td></tr>';
          $("#newTable3").append(dung);
        
        })
    })
  }
  function getTable4() {
    var y = document.getElementById("myTable").rows[5].cells[0].innerHTML;
    var path = 'ajax-lay-danh-sach-san-pham/'+y;
    $.ajax({
        url: path,
        type: 'GET'
    })
    .done(function(argument) {
        var dung = new String()
        argument.forEach(function(data){
          dung = '<tr><td>'+ data.id_sanpham +'</td><td>'+data.ten_san_pham +'</td></tr>';
          $("#newTable4").append(dung);
        
        })
    })
  }





  $(document).ready(function() {

    $('#btnDelete').click(function() {
      bootbox.confirm("Are you sure want to delete?", function(result) {
        alert("Confirm result: " + result);
      });
    });
  });
</script>
@endsection



