@extends("layouts.index")
@section('title', 'đặt phòng khách sạn')
@section("content")
<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-md-6">
			<form action="" method="POST" role="form">
				<legend style="color: #fff; background-color: #86b817!important;padding: 10px;">Thông tin liên hệ</legend>
			
				<div class="form-group">
					<label for="">Nhập tên</label>
					<input type="text" class="form-control" id="" placeholder="Nhập tên người đặt phòng">
				</div>
				<div>
					<label for="">Ngày Nhận</label>
					<input type="date" class="form-control" id="" >
				</div>
				<div>
					<label for="">Ngày Trả</label>
					<input type="date" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">Số Đêm</label>
					<input type="text" class="form-control" id="" placeholder="">
				</div>
				<div class="form-group">
					<label for="">Số Phòng</label>
					<input type="text" class="form-control" id="" placeholder="">
				</div>
				<div class="form-group">
					<label for="">Nhập Số điện thoai</label>
					<input type="text" class="form-control" id="" placeholder="Nhập Số điện thoai">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" class="form-control" id="" placeholder="Nhập email ">
				</div>
				<div>
					<label for="">Ghi Chú</label>
					<input type="text" class="form-control" id="" placeholder="Nhập ghi chú ">
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