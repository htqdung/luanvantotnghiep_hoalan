@extends('trangchinh.layout.main')
@section('main-content')
    <div id="content">
        <!-- Linking -->
        <div class="linking">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Trang Chủ</a></li>
                    <li class="active">Thông tin</li>
                </ol>
            </div>
        </div>
        <!-- Blog -->
        
        <section class="login-sec padding-top-30 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <h3>THÔNG TIN TÀI KHOẢN</h3>
                    <form action="{{ route('dangky') }}" method="POST">
                        <!-- Don’t have an Account? Register now -->
                        <div class="col-md-6">
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Tên:
                                        <input type="text" class="form-control" name="ten" placeholder="Nguyễn Văn A" required value="{{ $users->tbl_thongtinlienhe->ten }}">
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>Số điện thoại:
                                        <input type="text" class="form-control" name="so_dien_thoai" placeholder="0987654321" required value="{{ $users->tbl_thongtinlienhe->so_dien_thoai }}">
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>Email:
                                        <input type="email" class="form-control" name="email" placeholder="email@gmail.com" required value="{{ $users->tbl_thongtinlienhe->email }}">
                                    </label>
                                </li>
                            </ul>

                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

@endsection<!-- Footer -->
