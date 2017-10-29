<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
	<title>Login and Register UnitHotel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ url('unithotel_assets/form.css') }}">
	<base href="{{ asset('') }}">
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #00bfff">
	<div class="container" >
		<div class="row" >
			<div class="col-md-6 col-md-offset-3">
				<h1 style="margin-bottom: 54px; width: 100% ;color: #ffffff">Đơn Vị Khách Sạn</h1>
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Đăng nhập</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Đăng kí</a>
							</div>
						</div>
						<hr>
					</div>
					@if(count($errors) >0 )
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						{{ $err }} <br>
						@endforeach
					</div>
					@endif
					@if(session('thongbao'))
					<div class="alert alert-danger">
						{{ session('thongbao') }}
					</div>
					@endif
					@if(session('thongbao1'))
					<div class="alert alert-success">
						{{ session('thongbao1') }}
					</div>
					@endif
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="unithotel/login" method="post" role="form" style="display: block;">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mật khẩu">
									</div>
									<!-- <div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Nhớ mật khẩu</label>
									</div> -->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Đăng nhập">
											</div>
										</div>
									</div>
									<!-- <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Quên mật khẩu?</a>
												</div>
											</div>
										</div>
									</div> -->
								</form>
								<form id="register-form" action="unithotel/register" method="post" role="form" style="display: none;">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<input type="text" name="name" id="username" tabindex="1" class="form-control" placeholder="Họ tên" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="text" name="sdt" id="email" tabindex="1" class="form-control" placeholder="Số điện thoại" value="">
									</div>
									<div class="form-group">
										<input type="text" name="cmnd_passport" id="email" tabindex="1" class="form-control" placeholder="CMND hoặc hộ chiếu" value="">
									</div>
									<div class="form-group">
										<input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="Địa chỉ" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mật khẩu">
									</div>
									<div class="form-group">
										<input type="password" name="re_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Xác nhận mật khẩu">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Tạo tài khoản">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(function() {

			$('#login-form-link').click(function(e) {
				$("#login-form").delay(100).fadeIn(100);
				$("#register-form").fadeOut(100);
				$('#register-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#register-form-link').click(function(e) {
				$("#register-form").delay(100).fadeIn(100);
				$("#login-form").fadeOut(100);
				$('#login-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});

		});

	</script>
</body>
</html>
