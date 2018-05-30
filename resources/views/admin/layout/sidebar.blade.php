  <div id="sidebar" class="sidebar responsive ace-save-state">
      <script type="text/javascript">
      try { ace.settings.loadState('sidebar') } catch (e) {}
      </script>
      
          
          <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
              <span class="btn btn-success"></span>
              <span class="btn btn-info"></span>
              <span class="btn btn-warning"></span>
              <span class="btn btn-danger"></span>
          </div>
      
      <!-- /.sidebar-shortcuts -->
      <ul class="nav nav-list">
          <li class="active">
              <a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">
  				<i class="menu-icon fa fa-tachometer"></i>
  				<span class="menu-text"> Trang chủ </span>
  			</a>
              <b class="arrow"></b>
          </li>
          <li class="">
              <a href="#" class="dropdown-toggle"><i class="menu-icon fa  fa-asterisk"></i><span class="menu-text">Hoa Lan</span><b class="arrow fa fa-angle-down"></b></a>
              <b class="arrow"></b>
              <ul class="submenu">
                <li class="">
                  <a href="{{ route('DANH_SACH_CHi') }}">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Danh mục chi hoa
                  </a>
                  <b class="arrow"></b>
                </li>
                 <li class="">
                      <a href="{{ route('DAC_DIEM_HOA') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Đặc điểm loài hoa
                      </a>
                      <b class="arrow"></b>
                  </li>
                  <li class="">
                      <a href="{{  route('DANH_MUC_HOA') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh mục loài hoa
                      </a>
                      <b class="arrow"></b>
                  </li>
                 
                  <li class="">
                      <a href="{{ route('DANH_SACH_SAN_PHAM') }}" >
            						<i class="menu-icon fa fa-caret-right"></i>
            						Danh mục sản phẩm
            					</a>
                  </li>
                   <li class="">
                    <a href="{{ route('DANH_SACH_TAGS') }}">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Danh mục Tags
                    </a>
                    <b class="arrow"></b>
                   </li>
              
                 
              </ul>
          </li>
          <li class="">
              <a href="#" class="dropdown-toggle">
  					<i class="menu-icon fa fa-list"></i>
  					<span class="menu-text"> Đơn hàng </span>
  					<b class="arrow fa fa-angle-down"></b>
  				</a>
              <b class="arrow"></b>
              <ul class="submenu">
                 <li class="">
                      <a href="{{ route('TAT_CA_DON_HANG') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Tất cả đơn hàng
              </a>
                      <b class="arrow"></b>
                  </li>
                  <li class="">
                      <a href="{{ route('DON_HANG_DANG_GIAO') }}">
  							<i class="menu-icon fa fa-caret-right"></i>
  							Đang giao
  						</a>
                      <b class="arrow"></b>
                  </li>
                  <li class="">
                      <a href="{{ route('DON_HANG_DA_GIAO') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Đã giao
              </a>
                      <b class="arrow"></b>
                  </li>
                  <li class="">
                      <a href="{{ route('DON_HANG_DANG_XU_LY') }}">
  							<i class="menu-icon fa fa-caret-right"></i>
  							Đang xử lý
  						</a>
                      <b class="arrow"></b>
                  </li>
                 
              </ul>
          </li>
          
          <li class="">
            <a href="javascript:void(0)" class="dropdown-toggle">
            <i class="menu-icon fa fa-users"></i>
            <span class="menu-text">  Người dùng </span>
            <b class="arrow fa fa-angle-down"></b>
          </a>
              <b class="arrow"></b>
              <ul class="submenu">
                  <li class="">
                      <a href="{{ route('DANH_SACH_NGUOI_DUNG') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Người dùng thường
                      </a>
                      <b class="arrow"></b>
                  </li>
                  <li class="">
                      <a href="{{ route('DANH_SACH_NGUOI_DUNG_ADMIN') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Quản trị
                      </a>
                      <b class="arrow"></b>
                  </li>
              </ul>
          </li>
          <li class="">
              <a href="{{ route('DANH_SACH_KHUYEN_MAI') }}" class="dropdown-toggle">
  					<i class="menu-icon fa fa-calendar"></i>
  					<span class="menu-text"> Khuyến mại </span>
  					<b class="arrow fa fa-angle-down"></b>
  				</a>
              <b class="arrow"></b>
              <ul class="submenu">
                  <li class="">
                      <a href="{{ route('DANH_SACH_KHUYEN_MAI') }}">
          							<i class="menu-icon fa fa-caret-right"></i>
          							Danh mục khuyến mại
        					   	</a>
                      <b class="arrow"></b>
                  </li>
                  <li class="">
                      <a href="{{ route('DANH_SACH_UU_DAI') }}">
          							<i class="menu-icon fa fa-caret-right"></i>
          							Danh mục ưu đãi
          						</a>
                      <b class="arrow"></b>
                  </li>
                   <li class="">
                      <a href="{{ route('DANH_SACH_QUA_TANG') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh mục quà tặng
                      </a>
                      <b class="arrow"></b>
                  </li>
                
              </ul>
          </li>
          <div hidden="hidden">
             <li class="">
              <a href="{{ route('DANH_SACH_TONG') }}" class="dropdown-toggle">
            <i class="menu-icon fa fa-calendar"></i>
            <span class="menu-text">Báo cáo </span>
            <b class="arrow fa fa-angle-down"></b>
          </a>
              <b class="arrow"></b>
              <ul class="submenu">
                  <li class="">
                      <a href="{{ route('DANH_SACH_TONG') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Danh sách
                      </a>
                      <b class="arrow"></b>
                  </li>
                  <li class="">
                      <a href="{{ route('DANH_SACH_BIEU_DO') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Biểu đồ
                      </a>
                      <b class="arrow"></b>
                  </li>
              </ul>
          </li>
          </div>

        <div hidden="hidden"><li class="">
              <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-cogs"></i>
  
            <span class="menu-text">
              Cài đặt
  
              <span class="badge badge-primary"></span>
            </span>
  
            <b class="arrow fa fa-angle-down"></b>
          </a>
              <b class="arrow"></b>
              <ul class="submenu">
                  <li class="">
                      <a href="faq.html">
                <i class="menu-icon fa fa-caret-right"></i>
                FAQ
              </a>
                      <b class="arrow"></b>
                  </li>
                  <li class="">
                      <a href="error-404.html">
                <i class="menu-icon fa fa-caret-right"></i>
                Error 404
              </a>
                      <b class="arrow"></b>
                  </li>
                  <li class="">
                      <a href="error-500.html">
                <i class="menu-icon fa fa-caret-right"></i>
                Error 500
              </a>
                      <b class="arrow"></b>
                  </li>
                  <li class="">
                      <a href="grid.html">
                <i class="menu-icon fa fa-caret-right"></i>
                Grid
              </a>
                      <b class="arrow"></b>
                  </li>
                  <li class="">
                      <a href="blank.html">
                <i class="menu-icon fa fa-caret-right"></i>
                Blank Page
              </a>
                      <b class="arrow"></b>
                  </li>
              </ul>
          </li>
        </div>  
          
      </ul>
      <!-- /.nav-list -->
      <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
      </div>
  </div> 