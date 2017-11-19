@extends("layouts.index")
@section('title', 'đặt phòng khách sạn')
@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form action="" method="POST" role="form">
				<legend>Form title</legend>
			
				<div class="form-group">
					<label for="">Mhập tên</label>
					<input type="text" class="form-control" id="" placeholder="Nhập tên người đặt phòng">
				</div>
				<div class="form-group">
					<label for="">Nhập Số điện thoai</label>
					<input type="text" class="form-control" id="" placeholder="Nhập tên người đặt phòng">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" class="form-control" id="" placeholder="Nhập email người đặt phòng">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="col-md-6">
			<h2>Thông tin đặt phòng</h2>
		</div>
	</div>
</div>
@stop