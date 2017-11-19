@extends("unithotel.layout.index")
@section("content")
	
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Xin chào {{  Auth::user()->name }} <br>
					<small>CẬP NHẬT LẠI THÔNG TIN CƠ BẢN KHÁCH SẠN CỦA QUÝ VỊ.</small>
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
            <form action="unithotel/hotel/edit/{{$hotel->id}}" method="POST" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div style="" class="infohotel">
                        <legend>Thông Tin Cơ Bản</legend>
                        <div class="form-group">
                            <label for="">Tên chỗ nghĩ</label>
                            <input name="name" type="text" class="form-control" id="" value="{{$hotel->name}}" required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Số sao</label>
                            <input name="star" type="number" class="form-control" id="" min="1" max="5" required="required" value="{{$hotel->star}}">
                        </div>
                        <div class="form-group">
                            <label for="textarea">Mô tả khách sạn</label>
                            <textarea name="description" id="textarea" class="form-control" rows="5" required="required" >{{$hotel->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control" name="image">
                        </div> <br>
                    </div>
                    <div class="addresshotel">
                        <legend>Địa chỉ Khách Sạn</legend>
                        <div class="form-group">
                            <label for="">Tỉnh/Thành Phố</label>
                            <select class="form-control" name="province" id="provinceopt">
                                @foreach($province as $pr )
                                <option
                                @if($pr->id == $hotel->province_id)
                                {{ 'selected' }}
                                @endif
                                value="{{ $pr->id }}" >
                                    {{ $pr->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Quận/Huyện</label>
                            <select class="form-control" name="district" id="districtopt">
                                @foreach($district as $dt )
                                <option
                                @if($dt->id == $hotel->district_id)
                                {{ 'selected' }}
                                @endif
                                value="{{ $dt->id }}" >
                                    {{ $dt->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ cho tiết</label>
                            <input name="address_detail" type="text" class="form-control" id="" value="{{$hotel->address_detail}}" required="required">
                        </div>
                         <!-- <div class="form-group">
                            <label for="">Dòng địa chỉ</label>
                            <input type="text" class="form-control" id="" placeholder="Số Nhà, Tầng, Tòa nhà,vv...">
                        </div>  -->
                    </div>
                    <center class="mycenter"><button type="submit" class="btn btn-primary tieptuc">Cập nhật </button></center>
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
                    select.append('<option value=' + value.id + '>' + value.name + '</option>');
                });
            });
        });
    });
</script>
@endsection