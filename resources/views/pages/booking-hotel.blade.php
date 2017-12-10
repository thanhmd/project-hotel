@extends("layouts.index")
@section('title', 'đặt phòng khách sạn')
@section("content")
<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-md-6">
			<form action="hotel/{{$hotel->id}}/room/{{$detail_room->id}}/booking-room" method="POST" role="form" style="border: 5px solid #86b817;padding: 10px; border-radius: 3px; ">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<legend style="color: #fff; background-color: #86b817!important;padding: 10px;">Thông Tin Liên Hệ</legend>

				<div class="form-group">
					<label for="" class="labelbooking">Nhập Họ Tên*</label>
					<input type="text" class="form-control" id="" placeholder="Nhập tên người đặt phòng" name="name">
				</div>
				<div>
					<label for="" class="labelbooking">Ngày Nhận*</label>
					<input type="date" class="form-control" id="" name="check_in_date" >
				</div>
				<div>
					<label for="" class="labelbooking">Ngày Trả*</label>
					<input type="date" class="form-control" id="" name="check_out_date">
				</div>
				<!-- <div class="form-group">
					<label for="" class="labelbooking">Số Người*</label>
					<input type="number" class="form-control" id="" placeholder="" min="1">
				</div> -->
				<!-- <div class="form-group">
					<label for="" class="labelbooking">Số Phòng*</label>
					<input type="number" class="form-control" id="" placeholder="" min="1">
				</div> -->
				<div class="form-group">
					<label for="" class="labelbooking">Nhập Số điện thoai*</label>
					<input type="text" class="form-control" id="" placeholder="" name="sdt">
				</div>
				<div class="form-group">
					<label for="" class="labelbooking">Email*</label>
					<input type="email" class="form-control" id="" placeholder="abc@gmail.com" name="email">
				</div>
				<div>
					<label for="" class="labelbooking">Ghi Chú</label>
					<textarea type="text" class="form-control" id="" placeholder="Nhập ghi chú " name="note"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">ĐẶT PHÒNG</button>
			</form>
		</div>
		<div class="col-md-6">
			<h2 style="color: #fff; background-color: #86b817!important;padding: 10px;">Thông Tin Khách Sạn</h2>
			<div class="row">

				<div class="col-md-8">
					<p class="tenksdatphong">{{$hotel->name}}</p>
					<div class="col-md-8 ">
						<img src="upload/hinhkhachsan/{{$hotel->image}}" class="img-responsive" alt="Image">
					</div>
					<br>
					<p> <strong>Chi tiết giá phòng: </strong><span>{{ $detail_room->price }}</span>  </p>
					<p> <strong>Loại Phòng: </strong> {{$detail_room->name}}</p>
					<p><strong>Chi Tiết Giá: </strong>Giá phòng sẽ được báo qua điện thoại hoặc email trong vòng 24h</p>
				</div>
			</div>
		</div>
	</div>
</div>
@section("css")
<link rel="stylesheet" href="front_assets/assets/css/mystyle.css">
@stop
@stop
