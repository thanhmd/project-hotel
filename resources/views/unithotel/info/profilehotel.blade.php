			@extends("unithotel.layout.index")
			@section("content")

			<!-- Page Content -->
			<div id="page-wrapper">
				<div class="container-fluid">

					<h1 style="text-align: center;">THÔNG TIN ĐĂNG KÝ CỦA QUÝ VỊ</h1>
					<div class="container">

						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="well well-sm">
										<div class="row">
											<div class="col-sm-6 col-md-4">
												<img src="upload/imageuser/{{ $user->image }}" alt="" class="img-rounded img-responsive" />
											</div>
											<div class="col-sm-6 col-md-8">
												<h4>THÔNG TIN TÀI KHOẢN</h4>
												<p>
													<i class="glyphicon glyphicon-user">&nbsp;</i>
													<b>Họ Và Tên :</b> {{ $user->name }}
												<p>
													<i class="glyphicon glyphicon-envelope">&nbsp;</i>
													<b> Email :</b>{{ $user->email }}
												</p>
												<p>
													<i class="glyphicon glyphicon-earphone">&nbsp;</i>
													<b> Số điện thoai :</b>{{ $user->sdt }}
												</p>
												<p>
													<i class="glyphicon glyphicon-sound-5-1">&nbsp;</i>
													<b> CMND-Hộ Chiếu :</b>{{ $user->cmnd_passport }}
												</p>
												<p>
													<i class="glyphicon glyphicon-globe">&nbsp;</i>
													<b> Địa chỉ :</b>{{ $user->address }}
												</p>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<a class="btn btn-lg btn-info btnprovinceadd" href="unithotel/info/edit-profile" role="button">Cập Nhật Lại Thông Tin</a>
						<a class="btn btn-lg btn-info btnprovinceadd" href="unithotel/info/changepassword" role="button"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>Thay đổi password</a>
						{{-- <a class="btn btn-lg btn-info btnprovinceadd" href="unithotel/info/delete" role="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Xóa tài khoản</a> --}}
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
