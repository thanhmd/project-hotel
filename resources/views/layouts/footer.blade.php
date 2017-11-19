<section class="mbr-section form4 cid-qAyx45hOSW" id="form4-k" data-rv-view="886">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyB7LzB2P8cbkLR4XLgasacuOzX9PgF9ABw'></script><div style='overflow:hidden;height:429px;width:492px;'><div id='gmap_canvas' style='height:429px;width:592px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://embedmaps.org/'>google maps add to website</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=c95a6f014f83c18a097e185ed237bc7722dad111'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(10.7381151,106.67796069999997),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(10.7381151,106.67796069999997)});infowindow = new google.maps.InfoWindow({content:'<strong>BOOKING KHÁCH SẠN</strong><br>180 Cao lỗ Quận 8 TPHCM<br> Hồ Chí Minh<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
            <div class="col-md-6">
                <h2 class="pb-3 align-left mbr-fonts-style display-2">
                    GỬI THẮC MẮC
                </h2>
                <div>
                    <div class="icon-block pb-3">
                        <span class="icon-block__icon">
                            <span class="mbri-letter mbr-iconfont" media-simple="true"></span>
                        </span>
                        <h4 class="icon-block__title align-left mbr-fonts-style display-5">
                            Đừng ngần ngại liên hệ với chúng tôi
                        </h4>
                    </div>
                    <div class="icon-contacts pb-3">
                        <h5 class="align-left mbr-fonts-style display-7">
                            Sẵn sàng cung cấp và hợp tác
                        </h5>
                        <p class="mbr-text align-left mbr-fonts-style display-7">
                            Phone: +1 (0) 000 0000 001 <br>
                            Email: tranthihonghue19it@mail.com
                        </p>
                    </div>
                </div>
                <div data-form-type="formoid">
                    <div data-form-alert="" hidden="">
                        Thanks for filling out the form!
                    </div>
                   {{--  <form class="block mbr-form" action="mail/xuli" method="post" data-form-title="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-6 multi-horizontal" data-for="name">
                                <input type="text" class="form-control input" name="name" data-form-field="Name" placeholder="Your Name" required="" id="name-form4-k">
                            </div>
                            <div class="col-md-6 multi-horizontal" data-for="phone">
                                <input type="text" class="form-control input" name="phone" data-form-field="Phone" placeholder="Phone" required="" id="phone-form4-k">
                            </div>
                            <div class="col-md-12" data-for="email">
                                <input type="text" class="form-control input" name="email" data-form-field="Email" placeholder="Email" required="" id="email-form4-k" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" validate="required:true">
                            </div>
                            <div class="col-md-12" data-for="message">
                                <textarea class="form-control input" name="message" rows="3" data-form-field="Message" placeholder="Message" style="resize:none" id="message-form4-k"></textarea>
                            </div>
                            <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-primary btndkhune" name="send">ĐĂNG KÝ</button></center>
                            </div>
                        </div>
                    </form> --}}

                    <form action="{{ url('/mail/xuli') }}" method="post" class="form-connect">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="">Họ tên :</label>
                            <input type="text" class="form-control" id="" placeholder="" name="name" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="">Email :</label>
                            <input type="email" class="form-control" id="" placeholder="" name="email" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" validate="required:true">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Số điện thoại :</label>
                            <input type="text" class="form-control" id="" placeholder="" name="sdt" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Thành phố :</label>
                            <input type="text" class="form-control" id="" placeholder="" name="city" required>
                        </div>

                        <div class="form-group">
                            <label for="">Loại hình :</label>
                            <select id="type" class="form-control" name="option">
                                <option value="">Làm đẹp</option>
                                <option value="value1">Dịch vụ sự kiện</option>
                                <option value="value2">Việc làm nhanh</option>
                                <option value="value3">Việc bán thời gian</option>
                            </select>
                        </div>

                        <center><button type="submit" class="btn btn-primary btndkhune" name="send">ĐĂNG KÝ</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section once="" class="cid-qAyx7ffhXQ" id="footer7-l" data-rv-view="889">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu"> 
                <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="#" target="_blank">About us</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="#" target="_blank">Services</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="#" target="_blank">Get In Touch</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="#" target="_blank">Careers</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="#" target="_blank">Work</a>
                    </li></ul>
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2">
                    
                    
                    
                    
                    
                    
                <div class="soc-item">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.youtube.com/c/mobirise" target="_blank">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://instagram.com/mobirise" target="_blank">
                            <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                            <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.behance.net/Mobirise" target="_blank">
                            <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                        </a>
                    </div></div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © Copyright 2017 Mobirise - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>