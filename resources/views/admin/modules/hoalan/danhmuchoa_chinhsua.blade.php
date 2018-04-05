@extends('admin.layout.index')
@section('main-content')


    <div class="col-xs-12">
        
        <div class="hr hr-18 hr-double dotted"></div>
        <div class="widget-box">
            <div class="widget-header widget-header-blue widget-header-flat">
                <h4 class="widget-title lighter">Chỉnh sửa loài hoa</h4>
                <div class="widget-toolbar">
                    <label>
                        <small class="green">
                            <b>ID: {{  $data->id }}</b>
                        </small>
                    </label>
                </div>
            </div>
            <div class="widget-body">
                
                <!-- /.widget-main -->
            </div>
            <!-- /.widget-body -->
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                
                    <label for="" class="form-controll">ID</label>
                    <input type="text" class="form-controll" value="{{ $data->id }}" readonly="true">
                
            </div>
            <div class="col-md-6">
                
                    <label for="" class="form-controll">Tên loài hoa: </label>
                    <input type="text" class="form-controll" value="{{ $data->ten_loai }}" readonly="true">

            </div>


        </div>
        <!-- PAGE CONTENT ENDS -->
    </div>
    <!-- /.col -->

@endsection
