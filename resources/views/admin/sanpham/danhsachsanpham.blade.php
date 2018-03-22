
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Danh sách sản phẩm</h3>
        <a style="float: right; margin-left: 5px" class="btn btn-success" href="{!! route('danhmucsach') !!}"><i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Làm mới</a>
        <a class="btn btn-success" style="float: right;" href="{!!route('themsach')!!}"><i class="fa fa-plus-circle fa-spin fa-1x fa-fw"></i> Thêm sản phẩm</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
              <table id="example2" class="table table-bordered table-hover" >
                <thead>
                <tr style="margin: 0px">
                  <th style="width: 3%">ID</th>
                  <th style="width: 20%">Tên sane phẩm</th>
                  <th style="width: 20%">Mô tả </th>
                  <th style="width: 13%">Hình thức</th>
                  <th style="width: 10%">Kích thước</th>
                  <th style="width: 7%">Điểm thưởng</th>
                  <th style="width: 7%">Tag</th>
                  <th colspan="3" style="width: 20%">Chức năng</th>
                  
                </tr>
                </thead>
                

              </table>
            
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <!-- /.box -->

  
  </div>
  <!--/.col (right) -->
</div>
@endsection
