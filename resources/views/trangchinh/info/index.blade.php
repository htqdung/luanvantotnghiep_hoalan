@extends('trangchinh.layout.main')
@section('main-content')
    <div id="content">
        <!-- Linking -->
        <div class="linking">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Trang Chủ</a></li>
                    <li class="active">Đăng ký</li>
                </ol>
            </div>
        </div>
        <!-- Blog -->
        <section class="login-sec padding-top-30 padding-bottom-100">
            <div class="container">
                <div class="row">

                    <form action="{{ route('dangky') }}" method="POST">
                        <!-- Don’t have an Account? Register now -->
                        <div class="col-md-6">
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Tên
                                        <input type="text" class="form-control" name="ten" placeholder="Nguyễn Văn A" required value="{{ $users->tbl_thongtinlienhe->ten }}">
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>Số điện thoại
                                        <input type="text" class="form-control" name="so_dien_thoai" placeholder="0987654321" required value="{{ $users->tbl_thongtinlienhe->so_dien_thoai }}">
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>Email
                                        <input type="email" class="form-control" name="email" placeholder="email@gmail.com" required value="{{ $users->tbl_thongtinlienhe->email }}">
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>Địa chỉ
                                        <select name="address" id="" class="form-control" required>
                                            <option value=""> Mời bạn chọn địa chỉ </option>
                                            @foreach($address as $ad)
                                                <option value="{{ $ad->id }}">{{ $ad->so_nha }} - {{ $ad->ten_duong }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </li>
                            </ul>

                        </div>
                        <div class="col-md-6">
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Username
                                        <input type="text" class="form-control" name="username" placeholder="quynhnhi" required>
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>Password
                                        <input type="password" class="form-control" name="password" placeholder="******" required>
                                    </label>
                                </li>

                            </ul>
                        </div>
                        <div class="col-sm-12 text-center">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            <button type="submit" class="btn-round">Đăng Ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

@endsection<!-- Footer -->
