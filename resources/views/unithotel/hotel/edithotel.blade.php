@extends("unithotel.layout.index")
@section("content")
	
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Xin chào {{  Auth::user()->name }} <br>
					<small>CẬP NHẬT LẠI THÔNG TIN KHÁCH SẠN CỦA QUÝ VỊ.</small>
				</h1>
			</div>
                <form action="unithotel/hotel/post" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                	<div style="" class="infohotel">
                		<legend>Thông Tin Cơ Bản</legend>
                		<div class="form-group">
                			<label for="">Tên chỗ nghĩ</label>
                			<input type="text" class="form-control" id="" value="{{ $hotel->name }}">
                		</div>
                		<div class="form-group">
                			<label for="">Số sao</label>
                			<input type="text" class="form-control" id="" value="{{ $hotel->star }}">
                		</div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="" id="" class="form-control" rows="5" required="required" value="{{ $hotel->description }}"></textarea>
                        </div>
                		{{-- <div class="form-group">
                			<label for="">Loại Phòng</label>
                			<select class="form-control" name="province">
                            <option value="">Phòng Thường</option>
                            <option value="">Phòng Vip</option>
                        </select>
                		</div>
                		<div class="form-group">
                			<label for="">Tổng số phòng</label>
                			<input type="text" class="form-control" id="" placeholder="10">
                		</div> --}}
                	</div>
                	<div class="addresshotel">
                		<legend>Địa chỉ Khách Sạn</legend>
                		<div class="form-group">
                			<label for="">Tỉnh/Thành Phố</label>
                			<select class="form-control" name="province" id="provinceopt">
                                @foreach($province as $pr )
                                <option value="{{ $pr->id }}">{{ $pr->name }}</option>
                                @endforeach
                            </select>
                		</div>
                		<div class="form-group">
                			<label for="">Quận/Huyện</label>
                			<select class="form-control" name="option" id="districtopt">

                            </select>
                		</div>
                		<div class="form-group">
                			<label for="">Địa chỉ chi tiết</label>
                			<input type="text" class="form-control" id="" value="{{ $hotel->address_detail }}">
                		</div>
						{{-- <div class="form-group">
                			<label for="">Dòng địa chỉ</label>
                			<input type="text" class="form-control" id="" placeholder="Số Nhà, Tầng, Tòa nhà,vv...">
                		</div> --}}
                	</div>


                	<center class="mycenter"><button type="submit" class="btn btn-primary tieptuc">Thêm </button></center>
                	<div style="margin-top: 50px;"></div>
                </form>
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
                    // console.log(key);
                    // console.log(value.id);
                    // console.log(value.name);
                    select.append('<option value=' + value.id + '>' + value.name + '</option>');
                });
            });
        });
    });
</script>
@endsection