@extends("unithotel.layout.index")
@section("content")

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
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
			<div class="col-lg-12">
				<h1 class="page-header">Xin chào {{  Auth::user()->name }} <br>
					<small>Để bắt đầu, chúng tôi chỉ cần một số thông tin cơ bản, Quý vị có thể chỉnh sửa hoặc cập nhật phần này sau đó, nếu muốn.</small>
				</h1>
			</div>
                <form action="unithotel/hotel/add" method="POST" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                	<div style="" class="infohotel">
                		<legend>Thông Tin Cơ Bản</legend>
                		<div class="form-group">
                			<label for="">Tên chỗ nghĩ</label>
                			<input name="name" type="text" class="form-control" id="" placeholder="Jade Hotel">
                		</div>
                		<div class="form-group">
                			<label for="">Số sao</label>
                			<input name="star" type="number" class="form-control" id="" min="1" max="5" required="required" value="1">
                		</div>
                        <div class="form-group">
                            <label for="textarea">Mô tả khách sạn</label>
                            <textarea name="description" id="textarea" class="form-control" rows="5" required="required">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control" name="image">
                        </div> <br>
                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" class="form-control" name="image_detail[]" multiple="">
                        </div> <br>
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
                			<select class="form-control" name="district" id="districtopt">

                            </select>
                		</div>
                		<div class="form-group">
                			<label for="">Địa chỉ chi tiết</label>
                			<input name="address_detail" type="text" class="form-control" id="" placeholder="123 Điện Biên Phủ">
                		</div>
						 <!-- <div class="form-group">
                			<label for="">Dòng địa chỉ</label>
                			<input type="text" class="form-control" id="" placeholder="Số Nhà, Tầng, Tòa nhà,vv...">
                		</div>  -->
                	</div>
                    <div style="" class="inforoom">
                        <legend>Thông Tin Phòng</legend>
                            @foreach($rooms as $r)
                            <div class="roomtype">
                                <input style="visibility: hidden" type="text" name="typeroomid[]" class="form-control" id="" value="{{$r->id}}" readonly="">

                                <div class="form-group">
                                <label for="">Loại Phòng</label>
                                <input type="text" name="typeroomname[]" class="form-control" id="" value="{{$r->name}}" readonly="">
                                </div>

                                <div class="form-group">
                                    <label for="">Số phòng</label>
                                    <input name="numbertyperoom[]" type="number" class="form-control" id="" min="0" required="required" value="0">
                                </div>

                                <div class="form-group">
                                    <label for="">Tiền phòng 1 Đêm</label>
                                    <input name="pricetyperoom[]" type="number" class="form-control" id="" min="0" required="required" value="0">
                                </div>

                            </div>
                            @endforeach
                            <br>
                            <legend>Chọn Dịch Vụ</legend>
                            <div class="form-group">
                                @foreach($service as $s)
                                <input type="checkbox" name="cat[]" value="{{ $s->id }}" id="cat_{{ $s->id }}">
                                <label for="cat_{{ $s->id }}">{{ $s->name }}</label><br/><br/>
                                @endforeach
                            </div>
                    </div>
                	<center class="mycenter"><button type="submit" class="btn btn-primary tieptuc">Thêm </button></center>
                	<div style="margin-top: 50px;"></div>
                </form>

            </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
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