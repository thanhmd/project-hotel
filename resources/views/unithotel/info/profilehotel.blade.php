@extends("unithotel.layout.index")
@section("content")

<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">

		<h1 style="text-align: center;">CẬP NHẬT THÔNG TIN ĐĂNG KÝ CỦA QUÝ VỊ</h1>
		<div class="container">

			<!-- slider -->
			<div class="row carousel-holder">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading">Thông tin tài khoản</div>
						<div class="panel-body">
							<form>
								<div>
									<label>Họ tên</label>
									<input type="text" class="form-control"  name="name" aria-describedby="basic-addon1" value="{{ $user->name }}">
								</div>
								<br>
								<div>
									<label>Email</label>
									<input type="email" class="form-control" name="email" aria-describedby="basic-addon1" readonly value="{{ $user->email }} " 
									>
								</div>
								<div>
									<label>SĐT</label>
									<input type="email" class="form-control" name="sdt" aria-describedby="basic-addon1"  value="{{  $user->sdt }} " 
									>
								</div>
								<br>
								<button type="submit" class="btn btn-default">Sửa</button>
								{{-- <div>
									<input type="checkbox" class="" name="password" id="changePassword">
									<label>Đổi mật khẩu</label>
									<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled>
								</div>
								<br>
								<div>
									<label>Nhập lại mật khẩu</label>
									<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
								</div>
								<br>
								 --}}

							</form>
						</div>
					</div>
				</div>
				<div class="col-md-2">
				</div>
			</div>
			<!-- end slide -->
		</div>
	</div>

</div>

@endsection
@section('script')
	<script>
		$(document).ready(function() {
			$("#changePassword").change(function(){
				if($(this).is(":checked")) {
					$(".password").removeAttr("disable");
				} else {
					$(".password").attr("disable", "");
				}

			});
		});
	</script>
@endsection
