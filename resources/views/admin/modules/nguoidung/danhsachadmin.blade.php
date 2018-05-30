
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
  </div>

  <div class="page-content">
    <!-- /.page-header -->
     <div class="box box-primary">
        <div class="box-header with-border">
          <div class="widget-toolbar">
            <button class="btn btn-white btn-info btn-bold"  ><i class="ace-icon fa fa-plus bigger-120 blue"></i> <a href="{{ route('THEM_NGUOI_DUNG') }}">Thêm mới</a>  </button>
          </div>
        </div>
    <div class="row" >
    </div><!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <h3><b>DANH SÁCH QUẢN TRỊ VIÊN</b></h3>
                  <thead>
                  <tr style="margin: 0px">
                    <th style="width: 7%">Mã số</th>
                    <th style="width: 20%">Họ tên</th>
                    <th style="width: 15%">Số điện thoại</th>
                    <th style="width: 15%">Email</th>
                    <th style="width: 10%">Chức năng</th>                  
                  </tr>
                  </thead>
                   <tbody>
                    @foreach ($data as $item)
                      <tr>
                        <td>{{ $item->id_nguoidung }}</td>
                        <td>{{ $item->ten}}</td>
                        <td>{{ $item->so_dien_thoai}}</td>
                        <td>{{ $item->email}}</td>
                        <td>
                          <a style="margin-right: 0px; padding: 0px; width: 40px"" class="btn btn-warning"  data-toggle="modal" title="chi tiết" data-target="#myModal{{ $item->id_nguoidung }}"><i class="fa fa-eye fa-fw"></i></a>
                         
                          <!-- Modal -->
                          <div id="myModal{{ $item->id_nguoidung }}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">{{ $item->ten }}</h4>
                                </div>
                                <div class="modal-body">
                                <div class="col-xs-12 row">
                                  <table class="table  table-bordered table-hover">
                                    <tbody>
                                      <tr>
                                        <td colspan="8">
                                          <div class="table-detail">
                                            <div class="row">
                                            
                                              <div class="" style="padding-left:80px">
                                                <div class="space visible-xs"></div>

                                                <div class="profile-user-info profile-user-info-striped">
                                                  <div class="profile-info-row">
                                                    <div class="profile-info-name"> Họ tên </div>

                                                    <div class="profile-info-value">
                                                      <span>{{ $item->ten }}</span>
                                                    </div>
                                                  </div>

                                                  <div class="profile-info-row">
                                                    <div class="profile-info-name"> Số điện thoại </div>

                                                    <div class="profile-info-value">
                                                      
                                                      <span>{{ $item->so_dien_thoai }}</span>
                                                    </div>
                                                  </div>

                                                  <div class="profile-info-row">
                                                    <div class="profile-info-name"> Email </div>

                                                    <div class="profile-info-value">
                                                      <span>{{ $item->email }}</span>
                                                    </div>
                                                  </div>

                                                  <div class="profile-info-row">
                                                    <div class="profile-info-name"> Địa chỉ </div>

                                                    <div class="profile-info-value">
                                                      <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                      <span>{{ $item->so_nha}}, {{ $item->ten_duong }}, {{ $item->ten_phuong_xa }}, {{ $item->ten_quan_huyen}} , {{ $item->ten_tinh_thanhpho }}</span>
                                                    </div>
                                                  </div>                                                  
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                              
                                    </tbody>
                                  </table>
                                </div><!-- /.span -->

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                </div>
                              </div>

                            </div>
                          </div>
                          <a style="margin-right: 0px; padding: 0px; width: 40px" class="btn btn-info" data-toggle="tooltip" title="Chỉnh sửa" href="{{ route('CHINH_SUA_NGUOI_DUNG', $item->id_nguoidung)  }}"><i class="fa fa fa-pencil fa-fw"></i></a>

                        <a type="button" class="btn btn-danger" title="xóa" style=" margin: 0px; padding: 0px; width: 40px"   data-toggle="modal"   data-target="#removeUser{{ $item->id_nguoidung }}"><i class="fa fa fa-trash-o fa-fw"></i></a>
                     </td>
                           <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser{{ $item->id_nguoidung }}" role="dialog" tabindex="-1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bạn có chắc chắn?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Sau khi nhấn đồng ý. Dữ liệu liên quan đến sản phẩm {{ $item->ten }} sẽ bị xóa bỏ!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
                                        <a class="btn btn-danger" href="{{ route('XOA_NGUOI_DUNG', $item->id_nguoidung) }}" id="remove-button" type="submit">Đồng ý</a>
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
@endsection
