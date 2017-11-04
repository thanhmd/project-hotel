@extends("unithotel.layout.index")
@section("content")

<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">  
		@if(count($errors) >0 )
		<div class="alert alert-danger">
			@foreach($errors->all() as $err)
			{{ $err }} <br>
			@endforeach
		</div>
		@endif
		@if(session('thongbao'))
		<div class="alert alert-success">
			{{ session('thongbao') }}
		</div>
		@endif 
		<div class="container">
			<form action="unithotel/info/changepassword" method="POST" role="form" style="width: 50%">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<legend>THAY ĐỔI PASSWORD</legend>
				{{-- <span>Bạn nên sử dụng mật khẩu mạnh mà mình chưa sử dụng ở đâu khác</span> <br> --}}
				<div class="form-group">
					<label for="">Nhập lại mật khẩu</label>
					<input type="password" class="form-control" id="" placeholder="" name="cur_password">
				</div>
				<div class="form-group">
					<label for="">Nhập khẩu mới</label>
					<input type="password" class="form-control" id="" placeholder="" name="new_password">
				</div>
				<div class="form-group">
					<label for="">Nhập lại mật khẩu</label>
					<input type="password" class="form-control" id="" placeholder="" name="renew_password">
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection
