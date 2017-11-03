			@extends("unithotel.layout.index")
			@section("content")

			<!-- Page Content -->
			<div id="page-wrapper">
				<div class="container-fluid">

					<h1 style="text-align: center;">CẬP NHẬT THÔNG TIN TÀI KHOẢN CỦA QUÝ VỊ</h1>
					<div class="container">
						<!-- slider -->
						<div class="row carousel-holder">
							<div class="col-md-2"></div>
							<div class="col-md-8">
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
								<form action="unithotel/info/edit-profile" method="post" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="panel panel-default">
										<div class="panel-heading">Thông tin tài khoản</div>
										<div class="panel-body">

											<div>
												<label>Họ tên</label>
												<input type="text" class="form-control"  name="name" aria-describedby="basic-addon1" value="{{ $user->name }}">
											</div>
											<br>
											<div>
												<label>Email</label>
												<input type="text" class="form-control"  name="email" aria-describedby="basic-addon1" value="{{ $user->email }}" readonly>
											</div>
											<br>
											<div>
												<label>SĐT</label>
												<input type="text" class="form-control" name="sdt" aria-describedby="basic-addon1"  value="{{  $user->sdt }} "
												>
											</div>
											{{-- <div>
												<label>Giới tính</label>
												<div class="radio">
													<label>
														<input type="radio" name="rd" id="input" value="nam" checked="checked">
														Nam
													</label>
													<label>
														<input type="radio" name="rd" id="input" value="nu">
														Nữ
													</label>
												</div>
											</div> --}}
											<br>
											<div>
												<label>CMND-PASSPORT</label>
												<input type="text" class="form-control" name="cmnd" aria-describedby="basic-addon1"  value="{{ $user->cmnd_passport }}" readonly
												>
											</div>
											<br>
											<div>
												<label>Địa chỉ</label>
												<input type="text" class="form-control" name="address" aria-describedby="basic-addon1"  value="{{ $user->address }}" 
												>
											</div><br>
											<div>
												<label>Ảnh đại diện</label>
												<input type="file" class="form-control" name="image">
											</div> <br>
											{{-- <div class="panel-heading">Đổi mật khẩu</div> --}}
											{{-- <div class="panel-body">
												<div>
													<input type="checkbox" class="" name="changePassword" id="changePassword">
													<label>Đổi mật khẩu</label>
													<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled="">
												</div>
												<div>
													<label>Nhập lại mật khẩu</label>
													<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled="">
												</div>
											</div> --}}
											<button style="" type="submit" class="btn btn-primary">Cập Nhật</button>
										</div>
									</form>
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
								$(".password").removeAttr("disabled");
							} else {
								$(".password").attr("disabled", "");
							}

						});
					});
				</script>
				@endsection
