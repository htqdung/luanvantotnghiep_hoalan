@extends('trangchinh.layout.index')

@section('content')
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
	<div class="container">
			<h3><span><b>LIÊN HỆ</b> </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">TRANG CHỦ</a><i>|</i></li>
								<li>LIÊN HỆ</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
<!--/contact-->	
   <div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-6 address-grid">
						<h4>THÔNG TIN CỬA HÀNG</h4>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
								<div class="contact-right">
									<p>ĐIỆN THOẠI </p><span>0913­826-156</span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Mail </p><a href="mailto:sales@near.vn">sales@near.vn</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Vườn Lan Cái Nai - Bảy Khai</p>
									 <span> Khu vực 6, Phường Hưng Thạnh, Quận Cái Răng, TP. Cần Thơ.</span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<ul class="social-nav model-3d-0 footer-social w3_agile_social two contact">
							                              <li class="share">CHIA SẺ: </li>
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
					</div>
					<div style="background-color: #F2F2F2" class="col-md-6 contact-form" >
						<h4 class="white-w3ls" style="color: #111" >Liên hệ với chúng tôi</h4>
						<form action="{{ route('frontend.save.contact') }}" method="post" >
							<input type="hidden" value="{{ csrf_token() }}" name="_token">
							<div class="styled-input">
								<input type="text" name="tieu_de" required="">
								<label>Tiêu đề</label>
								<span></span>
							</div>
							<div class="styled-input">
								<textarea name="noi_dung" required=""></textarea>
								<label>Nội dung</label>
								<span></span>
							</div>	 
							<input style="background-color: #62bcfa" style="display: block !important" type="submit" value="Gửi">
						</form>
					</div>
				</div>
				<div class="clearfix"> </div>
				
				<div class="row" style="padding-top: 50px;">
				<div class="span12">
	   
			
					<iframe style="width:100%; height:500px; border: 0px" scrolling="no" src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;aq=0&amp;oq=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;sll=9.995811,105.7666827,18.27&amp;sspn=9.995811,105.7666827,18.27&amp;ie=UTF8&amp;hq=&amp;hnear=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;t=m&amp;ll=9.995811,105.7666827,18.27&amp;spn=9.995811,105.7666827,18.27&amp;z=14&amp;output=embed"></iframe><br />
					<small><a href="https://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;aq=0&amp;oq=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;sll=9.995811,105.7666827,18.27&amp;sspn=9.995811,105.7666827,18.27&amp;ie=UTF8&amp;hq=&amp;hnear=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;t=m&amp;ll=9.995811,105.7666827,18.27&amp;spn=9.995811,105.7666827,18.27&amp;z=14" style="color:#0000FF;text-align:left"></a></small>
				  
			   	</div>
			</div>
		</div>
	</div>
</div>
<!--//contact-->

@endsection