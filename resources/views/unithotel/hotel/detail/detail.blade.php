	@extends("unithotel.layout.index")
	@section("content")

	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">{{ $hotel->name }} <br>
						<div style="margin:24px auto 24px auto" class="image-block">
							<img style="width: 258px" src="upload/hinhkhachsan/{{ $hotel->image }}" class="img-responsive" alt="Image">
						</div>
						<!-- <small>THÔNG TIN CHI TIẾT KHÁCH SẠN</small> -->
						<h4>Thông tin chi tiết khách sạn:</h4>
					</h1>
				</div>
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
				<div class="col-lg-8 offset-md-2">
					<div class="table-responsive">
						<table class="table" id="dataTables">
							<!-- <thead>
								<tr >
								</tr>
							</thead> -->
							<tbody>
								<tr class="" style="margin-bottom:24px" >
									<td width="25%"><strong>{{ "Tên khách sạn" }}</strong></td>
									<td>{{ $hotel->name }}</td>
								</tr>
								<!-- <tr class="" >
									<td>{{ "Hình" }}</td>
									<td><img style="width: 186px" src="upload/hinhkhachsan/{{ $hotel->image }}" class="img-responsive" alt="Image"></td>
								</tr> -->
								<tr class="" >
									<td><strong>{{ "Số sao" }}</strong></td>
									<td>{{ $hotel->star }}</td>
								</tr>
								<tr class="">
									<td><strong>{{ "Giới thiệu" }}</strong></td>
									<td>{{ $hotel->description }}</td>
								</tr>
								<tr class="">
									<td><strong>{{ "Tỉnh/TP" }}</strong></td>
									<td>{{ $hotel->province->name }}</td>
								</tr>
								<tr class="">
									<td><strong>{{ "Quận/Huyện" }}</strong></td>
									<td>{{ $hotel->district->name }}</td>
								</tr>
								<tr class="">
									<td><strong>{{ "Địa chỉ chi tiết" }}</strong></td>
									<td>{{ $hotel->address_detail }}</td>
								</tr>
							</tbody>
						</table>

						<a class="btn btn-md btn-primary btnHotelEditInfo" href="unithotel/hotel/edit/{{ $hotel->id }}" role="button">Chỉnh sửa thông tin</a>
						<a class="btn btn-md btn-primary btnHotelRoom" href="unithotel/hotel/{{ $hotel->id }}/detail/room/list" role="button">Danh mục phòng</a>
						<a class="btn btn-md btn-primary btnHotelService" href="unithotel/hotel/{{ $hotel->id }}/detail/service/list" role="button">Danh mục dịch vụ</a>
						<br>
						<br>
					</div>
				</div>
	</div>
	<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
	@endsection
	@section('script')
	<script>
	$(function() {
		$('#provinceopt').change(function() {
			var url = 'admin/province/' + $(this).val() + '/districts/';
			$.get(url, function(data) {
				var select = $('#districtopt');
				select.empty();
				$.each(data,function(key, value) {
					select.append('<option value=' + value.id + '>' + value.name + '</option>');
				});
			});
		});
	});
	</script>
	@endsection
