<?php ini_set('display_errors', 1);?>

 <html lang="en">
  @include('admin.script.script_head')
      <body class="no-skin" onload=" tach_chuoi() ">
          @include('admin.layout.header')
          <div class="main-container ace-save-state" id="main-container">
              <script type="text/javascript">
              try { ace.settings.loadState('main-container') } catch (e) {}
              </script>
              @include('admin.layout.sidebar')
              <div class="main-content">
                  @if(session()->has('message'))
                    <div class=" success row col-lg-12" >
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    </div>
                    @endif
                    <script >
                       $(document).ready(function () {          
                              setTimeout(function() {
                                  $('.success').slideUp("slow");
                              }, 2000);
                      });
                      </script>
                  @yield('main-content')
              </div>
              <!-- /.main-content -->
               @include('admin.layout.footer')
              <a href="#" id="btn-scroll-up" style="width: 50px" class="btn-scroll-up btn-warning  btn btn-sm btn-inverse"><i class="ace-icon fa fa-angle-double-up icon-only bigger-110 fa-4x"></i></a>
          </div>
          <!-- /.main-container -->
              @include('admin.script.script_last_page')
      </body>
  
  </html>
 