 <div id="navbar" class="navbar navbar-default ace-save-state" style="height: 48px">
      <div class="navbar-container ace-save-state" id="navbar-container">
          <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
              <span class="sr-only">Toggle sidebar</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <div class="navbar-header pull-left">
              <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}" class="navbar-brand">
  				      <small> <img src="{{ asset('admin/assets/images/logo/logo4.png') }}" alt="" style="height: 28px;     padding-left: 25px;">
  					{{-- <i class="fa fa-leaf"></i>
  					Near Admin --}}</small>
  			     </a>
          </div>
          @if(Session::has('login'))
          <div class="navbar-buttons navbar-header pull-right" role="navigation">
              <ul class="nav ace-nav">
  
                        
                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                
                <span class="user-info">
                  <?php $value = session('login');
                      $id =  $value->id;
                      $ten =  $value->username;
                    ?>
                  <small>Xin chào,<br></small>
                  
                    <?= $ten; ?>
                 
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
              </a>
                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="{{ route('DOI_MAT_KHAU') }}">
                    <i class="ace-icon fa fa-user"></i>
                    Đổi mật khẩu
                  </a>
                            </li>
                             <li>
                              
                                <a href="{{ route('CHI_TIET_NGUOI_DUNG', $id ) }}">
                    <i class="ace-icon fa fa-user"></i>
                    Xem hồ sơ
                  </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('LogoutAdmin') }}">
                    <i class="ace-icon fa fa-power-off"></i>
                    Đăng xuất
                  </a>
                            </li>
                        </ul>
                    </li>
                </ul> 
          </div>
           @endif
          <div class="navbar-header pull-right" style="float: right;" >
              <a style="    padding-top: 2px;" href="." target="_blank" class="navbar-brand">
          <small>
           
           <h5> 
             <i class="glyphicon glyphicon-globe" ></i>
           Trang người dùng
         </h5>
          </small>
        </a>
          </div>
      </div>
      <!-- /.navbar-container -->
  </div>
