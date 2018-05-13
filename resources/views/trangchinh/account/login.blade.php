@extends('trangchinh.layout.main')
@section('main-content')
    <div id="content">
        <!-- Linking -->
        <div class="linking">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Trang Chủ</a></li>
                    <li class="active">Đăng nhập</li>
                </ol>
            </div>
        </div>
        <!-- Blog -->
        <section class="login-sec padding-top-30 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <!-- Login Your Account -->
                        <h5> Đăng Nhập </h5>
                        <!-- FORM -->
                        <form action="{{ route('login_nguoidung') }}" method="POST">
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Tài Khoản:
                                        <input type="text" class="form-control" name="username" placeholder="admin..." required>
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>Mật Khẩu:
                                        <input type="password" class="form-control" name="password" placeholder="******" required>
                                    </label>
                                </li>
                                <li class="col-sm-12 text-left">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    <button type="submit" class="btn-round">Đăng Nhập</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection<!-- Footer -->
