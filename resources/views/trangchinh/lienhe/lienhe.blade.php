@extends('trangchinh.layout.main')
@section('main-content')
<section class="contact-sec padding-top-40 padding-bottom-80">
      <div class="container"> 
        
        <!-- MAP -->
        <section class="map-block margin-bottom-40">
        	<iframe style="width:100%; height:500px; border: 0px" scrolling="no" src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;aq=0&amp;oq=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;sll=9.995811,105.7666827,18.27&amp;sspn=9.995811,105.7666827,18.27&amp;ie=UTF8&amp;hq=&amp;hnear=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;t=m&amp;ll=9.995811,105.7666827,18.27&amp;spn=9.995811,105.7666827,18.27&amp;z=14&amp;output=embed"></iframe><br />
        	<small><a href="https://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;aq=0&amp;oq=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;sll=9.995811,105.7666827,18.27&amp;sspn=9.995811,105.7666827,18.27&amp;ie=UTF8&amp;hq=&amp;hnear=Vườn+lan+Cái+Nai,+Hưng+Thành,+Cái+Răng,+Cần+Thơ,+Việt+Nam&amp;t=m&amp;ll=9.995811,105.7666827,18.27&amp;spn=9.995811,105.7666827,18.27&amp;z=14" style="color:#0000FF;text-align:left"></a></small>
        </section>
        
        
        <!-- Conatct -->
        <div class="contact">
          <div class="contact-form"> 
            <!-- FORM  -->
            <form role="form" id="contact_form" class="contact-form" action="{{ route('frontend.save.contact') }}" method="post" >
				<input type="hidden" value="{{ csrf_token() }}" name="_token">
              <div class="row">
                <div class="col-md-8"> 
                  
                  <!-- Payment information -->
                  <div class="heading">
                    <h2>ĐẶT CÂU HỎI</h2>
                  </div>
                  <ul class="row">
                    <li class="col-sm-12">
                      <label>Tiêu Đề:
                        <input type="text" class="form-control" name="tieu_de" id="name" required="" placeholder="">
                      </label>
                    </li>
                    <li class="col-sm-12">
                      <label>Nội Dung:
                        <textarea style="font-size: 14px" class="form-control" name="message" id="noi_dung" rows="5" required="" placeholder="Nhập nội dung tin nhắn vào đây..."></textarea>
                      </label>
                    </li>
                    <li class="col-sm-12 no-margin">
                      <button type="submit" value="Gửi" class="btn-round" id="btn_submit" onClick="proceed();">Gửi</button>
                    </li>
                  </ul>
                </div>
              

                <!-- Conatct Infomation -->
                <div class="col-md-4">
                  <div class="contact-info">
                    <h4>Near Shopping</h4>
                    <p>Vườn lan đa dạng và phổ biến!</p>
                    <hr>
                    <h6> Địa Chỉ:</h6>
                    <p>Khu vực 6, Phường Hưng Thạnh, Quận Cái Răng, TP. Cần Thơ</p>
                    <h6>Phone:</h6>
                    <p>(+84) 913 826 156</p>
                    <h6>Email:</h6>
                    <p>sales@near.vn</p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection<!-- Footer -->
