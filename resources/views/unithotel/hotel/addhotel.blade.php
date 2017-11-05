@extends("unithotel.layout.index")
@section("content")
	
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 >Xin chào <span class="page-header">{{  Auth::user()->name }}</span> <br>
					<small class="noidungchuy">Để bắt đầu, chúng tôi chỉ cần một số thông tin cơ bản, Quý vị có thể chỉnh sửa hoặc cập nhật phần này sau đó, nếu muốn.</small>
				</h1>
			</div>
                <form action="unithotel/hotel/add" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                	<div style="" class="infohotel">
                		<legend>Thông Tin Cơ Bản</legend>
                		<div class="form-group">
                			<label for="">Tên chỗ nghĩ</label>
                			<input type="text" class="form-control" id="" placeholder="Jade Hotel" name="name">
                		</div>
                		<div class="form-group">
                			<label for="">Số sao</label>
                			<input type="text" class="form-control" id="" placeholder="5" name="start">
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
                			<select class="form-control" name="province" id="province">
                                @foreach($province as $pr )
                                <option value="{{ $pr->id }}">{{ $pr->name }}</option>
                                @endforeach
                            </select>
                		</div>
                		<div class="form-group">
                			<label for="">Quận/Huyện</label>
                			<select class="form-control" name="district" id="district">
                                @foreach($district as $dt )
                                <option value="{{ $dt->id }}">{{ $dt->name }}</option>
                                @endforeach
                            </select>
                		</div>
                		<div class="form-group">
                			<label for="">Địa chỉ cho tiết</label>
                			<input type="text" class="form-control" id="" placeholder="123 Điện Biên Phủ" name=" address_detail">
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
        $(document).ready(function(){
            // alert("ok");
            $("#province").change(function() {
                /* Act on the event */
                var province_id = $(this).val();
                //alert(id_province);
                $.get("unithotel/ajax/district/"+province_id, function(data){
                    //alert(data);
                   $("#district").html(data);
                } );

            });
        });
    </script>
@endsection
