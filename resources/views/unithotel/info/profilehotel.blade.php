			@extends("unithotel.layout.index")
			@section("content")

			<!-- Page Content -->
			<div id="page-wrapper">
				<div class="container-fluid">

					<h1 style="text-align: center;">THÔNG TIN ĐĂNG KÝ CỦA QUÝ VỊ</h1>
					<div class="container">

						<!-- slider -->
						<div class="row carousel-holder">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<h4>THÔNG TIN CĂN BẢN</h4>
								HỌ Và Tên     : {{ $user->name }} <br>
								Email         : {{ $user->email }} <br>
								SĐT           : {{ $user->sdt }} <br>
								CMND-Passport : {{ $user->cmnd_passport }} <br>
								Địa Chỉ       : {{ $user->address }}
							</div>
							<div class="col-md-2"></div>
						</div>
						<a class="btn btn-lg btn-info btnprovinceadd" href="unithotel/info/edit-profile" role="button">Cập Nhật Lại Thông Tin</a>
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
