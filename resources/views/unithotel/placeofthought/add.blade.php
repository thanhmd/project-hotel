@extends("hotel.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Đặc điểm của khách sạn <br>
					<small>Tại đây Quý vị có thể nêu chi tiết về chỗ nghỉ như các tiện nghi tại chỗ và dịch vụ mà Quý vị cung cấp, hoặc chính sách về vật nuôi và chỗ đậu xe.</small>
				</h1>
			</div>
            <form action="" method="POST" role="form">
                <div class="row">
                    <div class="col-md-6">
                        <div style="" class="">
                            <legend>Nhận phòng</legend>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <legend>Từ</legend>
                                    <select class="form-control" id="checkin_start" name="checkin_start">
                                        <option value="">Vui lòng chọn</option>
                                        <option value="07:00">07:00</option>
                                        <option value="07:30" selected="">07:30</option>
                                        <option value="08:00">08:00</option>
                                        <option value="08:30">08:30</option>
                                        <option value="09:00">09:00</option>
                                        <option value="09:30">09:30</option>
                                        <option value="10:00">10:00</option>
                                        <option value="10:30">10:30</option>
                                        <option value="11:00">11:00</option>
                                        <option value="11:30">11:30</option>
                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>
                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>
                                        <option value="15:00">15:00</option>
                                        <option value="15:30">15:30</option>
                                        <option value="16:00">16:00</option>
                                        <option value="16:30">16:30</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>
                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <legend>Đến</legend>
                                    <select class="form-control" id="checkin_end" name="checkin_end">
                                        <option value="">Vui lòng chọn</option>
                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>
                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>
                                        <option value="15:00">15:00</option>
                                        <option value="15:30">15:30</option>
                                        <option value="16:00">16:00</option>
                                        <option value="16:30">16:30</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>
                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>
                                        <option value="20:00">20:00</option>
                                        <option value="20:30" selected="">20:30</option>
                                        <option value="21:00">21:00</option>
                                        <option value="21:30">21:30</option>
                                        <option value="22:00">22:00</option>
                                        <option value="22:30">22:30</option>
                                        <option value="23:00">23:00</option>
                                        <option value="23:30">23:30</option>
                                        <option value="00:00">00:00</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="" class="">
                            <legend>Trả phòng</legend>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Từ</label>
                                    <select class="form-control" id="checkout_start" name="checkout_start">
                                        <option value="">Vui lòng chọn</option>
                                        <option value="00:00" selected="">00:00</option>
                                        <option value="00:30">00:30</option>
                                        <option value="01:00">01:00</option>
                                        <option value="01:30">01:30</option>
                                        <option value="02:00">02:00</option>
                                        <option value="02:30">02:30</option>
                                        <option value="03:00">03:00</option>
                                        <option value="03:30">03:30</option>
                                        <option value="04:00">04:00</option>
                                        <option value="04:30">04:30</option>
                                        <option value="05:00">05:00</option>
                                        <option value="05:30">05:30</option>
                                        <option value="06:00">06:00</option>
                                        <option value="06:30">06:30</option>
                                        <option value="07:00">07:00</option>
                                        <option value="07:30">07:30</option>
                                        <option value="08:00">08:00</option>
                                        <option value="08:30">08:30</option>
                                        <option value="09:00">09:00</option>
                                        <option value="09:30">09:30</option>
                                        <option value="10:00">10:00</option>
                                        <option value="10:30">10:30</option>
                                        <option value="11:00">11:00</option>
                                        <option value="11:30">11:30</option>
                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>
                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:00">14:00</option>

                                    </select>
                                </div>
                            </div>

                            <di v class="col-md-6">
                                <div class="form-group">
                                    <label for="">Đến</label>
                                    <select class="form-control" id="checkout_end" name="checkout_end">
                                        <option value="">Vui lòng chọn</option>
                                        <option value="07:00">07:00</option>
                                        <option value="07:30">07:30</option>
                                        <option value="08:00">08:00</option>
                                        <option value="08:30" selected="">08:30</option>
                                        <option value="09:00">09:00</option>
                                        <option value="09:30">09:30</option>
                                        <option value="10:00">10:00</option>
                                        <option value="10:30">10:30</option>
                                        <option value="11:00">11:00</option>
                                        <option value="11:30">11:30</option>
                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>
                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>
                                        <option value="15:00">15:00</option>
                                        <option value="15:30">15:30</option>
                                        <option value="16:00">16:00</option>
                                        <option value="16:30">16:30</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>
                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>
                                        <option value="20:00">20:00</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="" class="infohotel">
                    <h2>Internet</h2>
                    <p>Có kết nối internet đối với đa số khách du lịch là khá quan trọng. WiFi miễn phí cũng là một điểm mạnh để bán được phòng!</p>
                    <div class="form-group">
                        <legend>Quý vị có internet cho khách sử dụng không?</legend>
                        <select id="type" class="form-control" name="option">
                            <option value="">Có, miễn phí</option>
                            <option value="value1">Có, trả tiền</option>
                            <option value="value2">Không</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <legend>Loại Internet</legend>
                        <select id="type" class="form-control" name="option">
                            <option value="">Wifi</option>
                            <option value="value1">Cáp</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <legend>Vị trí</legend>
                        <select id="type" class="form-control" name="option">
                            <option value="">Khu vực chung</option>
                            <option value="value1">Một số phòng</option>
                            <option value="value1">Tất cả các phòng</option>
                        </select>
                    </div>
                </div>


                <div id="facilities_section">
                    <fieldset id="top_facilities">
                        <legend>Các tiện nghi, hoạt động và dịch vụ được cung cấp tại chỗ nghỉ</legend>
                        <div class="block-facilities_change_opacity" id="top_facilities_content">
                            <div class="row form-group" data-validation-name="facilities">
                                <div class="describe-block">
                                    <p class="describe-text">
                                      Chúng tôi sẽ đăng những lựa chọn thường được khách chọn nhất tại các chỗ nghỉ tương tự như chỗ nghỉ của Quý vị. Quý vị luôn có thể thay đổi lựa chọn của mình hay thêm nhiều lựa chọn khác vào trang dashboard của chỗ nghỉ sau khi hoàn tất đăng ký.
                                  </p>
                                </div>
                                <span class="help-block"></span>
                            </div>
                            <div class="row">
                                <ul class="col-sm-6" style="list-style: none;">
                                    <li id="container_109" class="facility_items row" data-id="109" data-kind="free_or_paid">
                                        <div class="facility_items_body clearfix">
                                            <div class="checkbox col-sm-5">
                                                <label class="has_facility" for="facility_109">
                                                    <input data-message="" type="checkbox" class="cb facility_checkbox" id="facility_109">
                                                        Điều hòa nhiệt độ
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li id="container_109" class="facility_items row" data-id="109" data-kind="free_or_paid">
                                        <div class="facility_items_body clearfix">
                                            <div class="checkbox col-sm-5">
                                                <label class="has_facility" for="facility_109">
                                                    <input data-message="" type="checkbox" class="cb facility_checkbox" id="facility_109">
                                                        Massage
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li id="container_109" class="facility_items row" data-id="109" data-kind="free_or_paid">
                                        <div class="facility_items_body clearfix">
                                            <div class="checkbox col-sm-5">
                                                <label class="has_facility" for="facility_109">
                                                    <input data-message="" type="checkbox" class="cb facility_checkbox" id="facility_109">
                                                        BBQ
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </fieldset>
                </div>



                <center class="mycenter"><button type="submit" class="btn btn-primary tieptuc">Tiếp Tục</button></center>
                <div style="margin-top: 50px;"></div>
            </form>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->
@endsection
