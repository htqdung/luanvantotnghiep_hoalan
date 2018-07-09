<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from event-theme.com/themes/html/smarttech/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 03:27:23 GMT -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="M_Adnan" />
    <!-- Document Title -->
    <title> Near Shopping </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

{{--    <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

<!-- Page Wrapper -->
<div id="wrap" class="layout-1">
    @foreach(['success','danger'] as $item)
        @if(session($item))
            <div class="flash-message">
                <div class="alert alert-{{ $item }}" role="alert" style="position: absolute;right: 10px;top: 20px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong class="font-weight-100 font-size-14">{{ session($item) }}  </strong>
                </div>
            </div>

    @endif
    @endforeach
    <!-- Top bar --> 
    <div class="top-bar">
        <div class="container">
            <p>Chào mừng đến với vườn hoa Near!</p>
            <div class="right-sec" id="info-user">
                <ul>
                    @if(\Session::has('user'))
                        @php  $user = \Session::get('user') @endphp
                        <li><span style="color: red" >Chào, {{ $user->username }}</span></li>

                        <li class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Thông tin tài khoản
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li style="display: block;border-right: none"><a href="{{ route('infoUser') }}"><i class="fa fa-info" style="width: 15px"></i>Thông tin cá nhân </a></li>
                                <li style="display: block;border-right: none"><a href="#"><i class="fa fa-database" style="width: 15px"></i>Quản lý đơn hàng</a></li>
                                <li style="display: block;border-right: none"><a href="{{ route('dang-xuat') }}"><i class="fa fa-key" style="width: 15px"></i> Thoát</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('showRegiter') }}">Đăng ký </a></li>
                        <li><a href="{{ route('showLogin') }}">Đăng nhập </a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo"> <a href="/"><img src="{{ asset('trangchinh_asset/images/logoshop5.png') }}" alt="" style="width: 260px;height: 55px;"></a> </div>
            <div class="search-cate">
                <form action="">
                    <input type="text" class="typeahead" name="keyword" placeholder="Tên sản phẩm ..." value="{{ Request::get('keyword') }}">
                    <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                </form>
                <div id="result" style="display: none"></div>
            </div>

            <!-- Cart Part -->
            <ul class="nav navbar-right cart-pop">
                <li class="dropdown"> <a href="{{ route('cart.index') }}"><i class="flaticon-shopping-bag"></i> <strong> Giỏ hàng </strong> <br>
                        <span> Có <b style="color: red">{{ \Cart::count() }}</b> sản phẩm</span></a>
                </li>
            </ul>
        </div>

        <!-- Nav -->
        <nav class="navbar ownmenu">
            <div class="container">

                <!-- Categories -->
                <div class="cate-lst"> <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Danh mục sản phẩm </a>
                    <div class="cate-bar-in">
                        <div id="cater" class="collapse">
                            <ul>

                                @foreach($loai_sp as $loai)
                                    <li><a href="{{ route('loaisp',[str_slug($loai->ten_loai),$loai->id]) }}"> {{$loai->ten_loai}} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Navbar Header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
                </div>
                <!-- NAV -->
                <div class="collapse navbar-collapse" id="nav-open-btn">
                    <ul class="nav">
                        <li class="active"> <a href="/">Trang chủ</a></li>
                        <li class="dropdown"> <a href="" class="dropdown-toggle" data-toggle="dropdown"> Sản phẩm  </a>
                            <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                                @foreach($loai_sp as $loai)
                                    <li><a href="{{ route('loaisp',[str_slug($loai->ten_loai),$loai->id]) }}"> {{$loai->ten_loai}} </a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('frontend.quatang') }}">Quà tặng</a></li>
                        <li><a href="{{ route('frontend.khuyenmai') }}">Khuyến mãi</a></li>
                        <li> <a href="{{ route('frontend.contact') }}">Liên Hệ</a></li>

                    </ul>
                </div>

                <!-- NAV RIGHT -->
                <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hotline:</strong> (+84) 913 826 156</span> </div>
            </div>
        </nav>
    </header>

    <!-- Slid Sec -->
    @yield('main-slide')
    <!-- Content -->
    @yield('main-content')
    <!-- End Content -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <!-- Footer Upside Links -->
            <div class="foot-link">
                <ul>
                    <li><a href="#."> Trang Chủ </a></li>
                    <li><a href="#."> Giới Thiệu </a></li>
                    <li><a href="#."> Sản Phẩm </a></li>
                    <li><a href="#."> Quà Tặng </a></li>
                    <li><a href="#."> Khuyến Mãi </a></li>
                    <li><a href="#."> Liên Hệ </a></li>
                </ul>
            </div>
            <div class="row">
                <!-- Contact -->
                <div class="col-md-6">
                    <div class="logo"> <a href="/"><img src="{{ asset('trangchinh_asset/images/logoshop5.png') }}" alt="" style="width: 205px;height: 47px;"></a> </div><br>
                    <div class="w3-address-grid">
                            <div class="w3-address-right">
                                <h6><i class="fa fa-phone" aria-hidden="true"> <b>Điện Thoại:</b> 0913 826 156</i></h6>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="w3-address-grid">
                            <div class="w3-address-right">
                                <h6><i class="fa fa-envelope" aria-hidden="true"> <b>Email:</b><a href="mailto:sales@near.vn"> sales@near.vn</a></i></h6>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="w3-address-grid">
                            <div class="w3-address-right">
                                <h6><i class="fa fa-map-marker" aria-hidden="true"> <b>Địa Chỉ:</b> Khu vực 6, Phường Hưng Thạnh, Quận Cái Răng, TP. Cần Thơ.</i></h6>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    <!--
                    <div class="social-links"> <a href="#."><i class="fa fa-facebook"></i></a> <a href="#."><i class="fa fa-twitter"></i></a> <a href="#."><i class="fa fa-linkedin"></i></a> <a href="#."><i class="fa fa-pinterest"></i></a> <a href="#."><i class="fa fa-instagram"></i></a> <a href="#."><i class="fa fa-google"></i></a> </div>
                    -->
                </div>
                <!-- Categories -->
                

                <!-- Categories -->
                <div class="col-md-3">
                    <h6>Chăm Sóc Khách Hàng</h6>
                    <ul class="links-footer">
                        <li><a href="#."> Hướng Dẫn Đặt Hàng</a></li>
                        <li><a href="#."> Chính Sách Vận Chuyển</a></li>
                        <li><a href="#."> Chính Sách Đổi Trả</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div class="col-md-3">
                    <h6>Fanpage Facebook</h6>
                    {{--<ul class="social-nav model-3d-0 footer-social w3_agile_social two">--}}
                       {{--<iframe--}}
                       {{--src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FV%C6%B0%E1%BB%9Dn-Lan-C%C3%A1i-Nai-1992538604093631&tabs&width=340&height=196&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"--}}
                       {{--width="340" --}}
                       {{--height="196"--}}
                       {{--style="border:none;overflow:hidden" --}}
                       {{--scrolling="no"--}}
                       {{--frameborder="0" --}}
                       {{--allowTransparency="true" --}}
                       {{--allow="encrypted-media"></iframe>--}}
                    {{--</ul>--}}
                </div>
            </div>
        </div>
    </footer>

    <!-- Rights -->
    <div class="rights">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p style="text-align: center;">Copyright © 2018 <a href="#." class="ri-li"> </a>All rights reserved | Design by KTPM2014</p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Footer -->

    <!-- GO TO TOP  -->
    <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a>
    <!-- GO TO TOP End -->
</div>
<!-- End Page Wrapper -->

<!-- JavaScripts -->
<script src="{{ asset('frontend/js/vendors/modernizr.js') }}"></script>
<script src="{{ asset('frontend/js/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/vendors/wow.min.js') }}"></script>
<script src="{{ asset('frontend/js/vendors/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/vendors/own-menu.js') }}"></script>
<script src="{{ asset('frontend/js/vendors/jquery.sticky.js') }}"></script>
<script src="{{ asset('frontend/js/vendors/owl.carousel.min.js') }}"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.tp.t.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.tp.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap3-typeahead.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

{{--<script src="{{ asset('frontend/js/all.min.js') }}"></script>--}}

</body>

</html>

<script>
    $(document).ready(function() {
        $(".price").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });
</script>
