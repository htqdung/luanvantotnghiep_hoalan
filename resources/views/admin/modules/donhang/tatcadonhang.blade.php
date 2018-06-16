@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="ace-icon fa fa-home home-icon"></i>
          <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ</a>
      </li>   
      <li><a href="javascript:void(0)">Tất cả đơn hàng</a></li>
    </ul><!-- /.breadcrumb -->
  </div>
  <div class="page-content">
    <!-- /.page-header -->
    <div class="row">
      <div class="col-md-12">
        <h3><b>DANH SÁCH ĐƠN HÀNG</b></h3>
          <div class="form-group">
              <select name="" id="thang"  class="form-controll f_right">
                <option value="0">Chọn tháng</option>
                <option value="1">Tháng 1</option>
                <option value="2">Tháng 2</option>
                <option value="3">Tháng 3</option>
                <option value="4">Tháng 4</option>
                <option value="5">Tháng 5</option>
                <option value="6">Tháng 6</option>
                <option value="7">Tháng 7</option>
                <option value="8">Tháng 8</option>
                <option value="9">Tháng 9</option>
                <option value="10">Tháng 10</option>
                <option value="11">Tháng 11</option>
                <option value="12">Tháng 12</option>

              </select>
              <select name="" id="trangthai"   class="form-controll f_right">
                <option  value="0">Trạng thái</option>
                @foreach ($trangthai as $element)
                  <option value="{{ $element->id }}">{{ $element->ten_trang_thai }}</option>
                @endforeach
              </select>
              
          </div>
        <table class="table" id="myTable">

                  <thead>
                  <tr style="margin: 0px">
                    <th style="width: 3%">Mã số</th>
                    <th style="width: 10%">Ngày đặt hàng</th>
                    <th style="width: 25%">Địa chỉ</th>
                    <th style="width: 10%">Hình thức thanh toán</th>
                    <th style="width: 10%">Tổng tiền  </th>
                    <th style="width: 10%">Trạng thái  </th>
                    <th style="width: 15%">Chức năng</th>
                  </tr>
                  </thead>
                   <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->donhang_id }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->ngay_dat_hang)) }}</td>                 
                    <td>{{ $item->so_nha}}, {{ $item->ten_duong }}, {{ $item->ten_phuong_xa }}, {{ $item->ten_quan_huyen}} , {{ $item->ten_tinh_thanhpho }}</td>
                     <td>{{ $item->ten_hinh_thuc}}</td>

                    <td><?= number_format($item->tong_tien) ?> VNĐ</td>
                    <td><span id="trangthai<?= $i; ?>"></span></td>
                    <td>
                        <a style=" margin: 0px; padding: 0px; width: 40px" class="btn btn-warning" data-toggle="tooltip" href="{{ route('CHI_TIET_DON_HANG',$item->donhang_id) }}" title="Chi tiết"  href=""><i class="fa fa-eye fa-fw"></i></a>
 
                     </td>
                </tr> 
                <?php $i++; ?>
                @endforeach           
              </tbody>              
          </table>
          {{ $data->render() }}
      </div>
    </div>
  </div><!-- /.page-content -->
</div>

<script>
    function Hang1() {
      var x = document.getElementById("myTable").rows[1].cells[0].innerHTML;
      
      var path = 'ajax-trang-thai-don-hang/'+x;
      $.ajax({
          url: path,
          type: 'GET'
      })
      .done(function(argument) {
          var _data = new String()
          argument.forEach(function(data){
            _data = data.ten_trang_thai;
            // console.log(_data);
            $('#trangthai1').html(_data);
            
          })
      })
    }


    function Hang2(argument) {
      var x = document.getElementById("myTable").rows[2].cells[0].innerHTML;
      
      var path = 'ajax-trang-thai-don-hang/'+x;
      $.ajax({
          url: path,
          type: 'GET'
      })
      .done(function(argument) {
          var _data = new String()
          argument.forEach(function(data){
            _data = data.ten_trang_thai;
            // console.log(_data);
            $('#trangthai2').html(_data);
            // if(_data == "Đang giao")
            // {
            //     $('#trangthai2').css({ 'color': '#3A87AD' });
            // }
            // else if(_data = "Đang xử lý") 
            // {
            //     $('#trangthai2').css({ 'color': '#82AF6F' });
            // }
            // else if(_data = "Đã giao") 
            // {
            //     $('#trangthai2').css({ 'color': '#ABBAC3' });
            // }
            // else
            // {
            //     $('#trangthai2').css({ 'color': '#F89406' });
            // }
            
          })
      })
    }

    function Hang3(argument) {
      var x = document.getElementById("myTable").rows[3].cells[0].innerHTML;
      
      var path = 'ajax-trang-thai-don-hang/'+x;
      $.ajax({
          url: path,
          type: 'GET'
      })
      .done(function(argument) {
          var _data = new String()
          argument.forEach(function(data){
            _data = data.ten_trang_thai;
            // console.log(_data);
            $('#trangthai3').html(_data);
            // if(_data == "Đang giao")
            // {
            //     $('#trangthai3').css({ 'color': '#3A87AD' });
            // }
            // else if(_data = "Đang xử lý") 
            // {
            //     $('#trangthai3').css({ 'color': '#82AF6F' });
            // }
            // else if(_data = "Đã giao") 
            // {
            //     $('#trangthai3').css({ 'color': '#ABBAC3' });
            // }
            // else
            // {
            //     $('#trangthai3').css({ 'color': '#F89406' });
            // }
            
          })
      })
    }

    function Hang4(argument) {
      var x = document.getElementById("myTable").rows[4].cells[0].innerHTML;
      
      var path = 'ajax-trang-thai-don-hang/'+x;
      $.ajax({
          url: path,
          type: 'GET'
      })
      .done(function(argument) {
          var _data = new String()
          argument.forEach(function(data){
            _data = data.ten_trang_thai;
            // console.log(_data);
            $('#trangthai4').html(_data);
           
          })
      })
    }

    function Hang5(argument) {
      var x = document.getElementById("myTable").rows[5].cells[0].innerHTML;
      
      var path = 'ajax-trang-thai-don-hang/'+x;
      $.ajax({
          url: path,
          type: 'GET'
      })
      .done(function(argument) {
          var _data = new String()
          argument.forEach(function(data){
            _data = data.ten_trang_thai;
            // console.log(_data);
            $('#trangthai5').html(_data);
           
          })
      })
    }

    $( document ).ready(function() {
      
        Hang1();
        Hang2();
        Hang3();
        Hang4();
        Hang5();
    });


    function SapXep() {
      var thang = $('#thang').val();
      var trangthai = $('#trangthai').val();
      var trangthai_text = $( "#trangthai option:selected" ).text();
      var path ='ajax-sap-xep/thang='+thang+'&trangthai='+trangthai;

      $.ajax({
          url: path,
          type: 'GET'
      })
      .done(function(argument) {
          var _data = new String();var _table = new String();
          argument.forEach(function(data){
            // console.log(data);
            _data +=  '<tr><td>'+ data.donhang_id +'</td><td>'+data.ngay_dat_hang+'</td><td>'+data.so_nha+', '+data.ten_duong+', '+data.ten_phuong_xa+','+data.ten_quan_huyen+','+data.ten_tinh_thanhpho+'</td><td>'+ data.ten_hinh_thuc +'</td>    <td>'+ data.tong_tien +'</td>    <td>'+trangthai_text +'</td>    <td><a style=" margin: 0px; padding: 0px; width: 40px" class="btn btn-warning" data-toggle="tooltip" href="qt-chi-tiet-don-hang/'+data.donhang_id+'" title="Chi tiết" href=""><i class="fa fa-eye fa-fw"></i></a></td></tr>';

          })
          // var elementDelete = $("#myTable").parent();

          _table = '<thead><tr style="margin: 0px"><th style="width: 3%">Mã số</th><th style="width: 10%">Ngày đặt hàng</th><th style="width: 25%">Địa chỉ</th><th style="width: 10%">Hình thức thanh toán</th><th style="width: 10%">Tổng tiền  </th><th style="width: 10%">Trạng thái  </th><th style="width: 15%">Chức năng</th></tr></thead>';

          $("#myTable").empty();
          $("#myTable").append(_table+_data);
      })
      

    }


    $('#thang').change(function(event) {
      SapXep();
    });
    $('#trangthai').change(function(event) {
      SapXep();
    });





</script>



@endsection
