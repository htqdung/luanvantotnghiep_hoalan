 <html lang="en">
  @include('admin.script.script_head')
      <body class="no-skin">
          @include('admin.layout.header')
          <div class="main-container ace-save-state" id="main-container">
              <script type="text/javascript">
              try { ace.settings.loadState('main-container') } catch (e) {}
              </script>
              @include('admin.layout.sidebar')
              <div class="main-content">
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
 