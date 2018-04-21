@extends('admin.layout.index')
@section('main-content')
<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i><a href="{{ route('MO_GIAO_DIEN_ADMIN') }}">Trang chủ</a>
			</li>	
		</ul><!-- /.breadcrumb -->
		<div class="nav-search" id="nav-search">
			<form class="form-search">
				<span class="input-icon">
					<input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
					<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- /.nav-search -->
	</div>
<!-- PAGE CONTENT BEGINS -->
<div class="row" >
<div class="space-12"></div>
<div class="infobox-container" >

<div class="infobox infobox-blue" >
	<div class="infobox-icon">
		<i class="ace-icon fa fa-user"></i>
	</div>
	<div class="infobox-data">		
		<span class="infobox-data-number">11</span>
		<div class="infobox-content"> <a href="#">NGƯỜI DÙNG</a></div>
	</div>
</div>
<div class="infobox infobox-pink">
	<div class="infobox-icon">
		<i class="ace-icon fa fa-shopping-cart"></i>
	</div>
	<div class="infobox-data">
		<span class="infobox-data-number">8</span>
		<div class="infobox-content"> <a href="#">ĐƠN HÀNG</a></div>
	</div>
</div>
<div class="infobox infobox-red">
	<div class="infobox-icon">
		<i class="ace-icon fa fa-money"></i>
	</div>
	<div class="infobox-data">
		<span class="infobox-data-number">7</span>
		<div class="infobox-content"><a href="#">DOANH THU</a></div>
	</div>
</div>
</div>
<div class="vspace-12-sm"></div>
</div><!-- /.row -->
<div class="hr hr32 hr-dotted"></div>
<!-- PAGE CONTENT ENDS -->	
</div>
@endsection




