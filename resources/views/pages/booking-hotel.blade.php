@extends("layouts.index")
@section('title', 'đặt phòng khách sạn')
@section("content")
<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-md-6">
			<form action="booking-room" method="POST" role="form" style="border: 5px solid #86b817;padding: 10px; border-radius: 3px; ">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<legend style="color: #fff; background-color: #86b817!important;padding: 10px;">Thông Tin Liên Hệ</legend>
			
				<div class="form-group">
					<label for="" class="labelbooking">Nhập Họ & Tên***</label>
					<input type="text" class="form-control" id="" placeholder="Nhập tên người đặt phòng">
				</div>
				<div>
					<label for="" class="labelbooking">Ngày Nhận***</label>
					<input type="date" class="form-control" id="" >
				</div>
				<div>
					<label for="" class="labelbooking">Ngày Trả***</label>
					<input type="date" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="" class="labelbooking">Số Người***</label>
					<input type="text" class="form-control" id="" placeholder="10">
				</div>
				<div class="form-group">
					<label for="" class="labelbooking">Số Phòng**</label>
					<input type="text" class="form-control" id="" placeholder="3">
				</div>
				<div class="form-group">
					<label for="" class="labelbooking">Nhập Số điện thoai*</label>
					<input type="text" class="form-control" id="" placeholder="01694993575">
				</div>
				<div class="form-group">
					<label for="" class="labelbooking">Email***</label>
					<input type="text" class="form-control" id="" placeholder="tranthihonghue19it@gmail.com">
				</div>
				<div>
					<label for="" class="labelbooking">Ghi Chú</label>
					<textarea type="text" class="form-control" id="" placeholder="Nhập ghi chú "></textarea>
				</div>
				<button type="submit" class="btn btn-primary">ĐẶT PHÒNG</button>
			</form>
		</div>
		<div class="col-md-6">
			<h2 style="color: #fff; background-color: #86b817!important;padding: 10px;">Thông Tin Khách Sạn</h2>
			<div class="row">
				<div class="col-md-4 ttdatphonghinh" >á</div>
				<div class="col-md-8">
					<p class="tenksdatphong">Khách sạn The Reverie Saigon</p>
					<p>Chi tiết giá phòng</p>
					<hr>
					<p>Loại Phòng : aaa</p>
					<p>Chi Tiết Giá : Giá phòng sẽ được báo qua điện thoại hoặc email trong vfong 24h</p>
				</div>
			</div>
		</div>
	</div>
</div>
@section("css")
<link rel="stylesheet" href="front_assets/assets/css/mystyle.css">
@stop
@stop