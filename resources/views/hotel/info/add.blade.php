@extends("hotel.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Xin chào tranthihonghue! <br>
					<small>Để bắt đầu, chúng tôi chỉ cần một số thông tin cơ bản, Quý vị có thể chỉnh sửa hoặc cập nhật phần này sau đó, nếu muốn.</small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
            {{-- <div class="col-lg-7" style="padding-bottom:120px">
                
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

                <form action="admin/admin/add" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Họ Và Tên</label>
                        <input class="form-control" name="name" placeholder="Họ và Tên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"  class="form-control" name="email" placeholder="Nhập địa chỉ email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input type="password" class="form-control" name="re_password" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <label class="radio-inline">
                            <input name="level" value="0" checked="" type="radio">CEO
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1" type="radio">Staff
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm Admin</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
                </div> --}}
                <form action="" method="POST" role="form">
                	

                	<div style="" class="infohotel">
                		<legend>Thông Tin Cơ Bản</legend>
                		<div class="form-group">
                			<label for="">Tên chỗ nghĩ</label>
                			<input type="text" class="form-control" id="" placeholder="Jade Hotel">
                		</div>
                		<div class="form-group">
                			<label for="">Số sao</label>
                			<input type="text" class="form-control" id="" placeholder="5">
                		</div>
                		<div class="form-group">
                			<label for="">Tổng số phòng</label>
                			<input type="text" class="form-control" id="" placeholder="10">
                		</div>
                	</div>

                	

                	<div class="addresshotel">
                		<legend>Địa chỉ Khách Sạn</legend>
                		<div class="form-group">
                			<label for="">Tên người liên hệ</label>
                			<input type="text" class="form-control" id="" placeholder="Trần Thị Hồng Huệ">
                		</div>
                		<div class="form-group">
                			<label for="">Tỉnh/Thành Phố</label>
                			<select id="type" class="form-control" name="option">
                                <option value="">Hồ Chí Minh</option>
                                <option value="value1">Hà Nội</option>
                                <option value="value2">Quảng Ngãi</option>
                            </select>
                		</div>
                		<div class="form-group">
                			<label for="">Quận/Huyện</label>
                			<select id="type" class="form-control" name="option">
                                <option value="">Quận 1</option>
                                <option value="value1">Quận 2</option>
                                <option value="value2">Gò Vấp</option>
                            </select>
                		</div>
                		<div class="form-group">
                			<label for="">Địa chỉ cho tiết</label>
                			<input type="text" class="form-control" id="" placeholder="123 Điện Biên Phủ">
                		</div>
						<div class="form-group">
                			<label for="">Dòng địa chỉ</label>
                			<input type="text" class="form-control" id="" placeholder="Số Nhà, Tầng, Tòa nhà,vv...">
                		</div>
                		<div class="form-group">
                			<label for="">Số điện thoại liên lạc (để chúng tôi có thể hỗ trợ đăng ký của Quý vị khi cần)</label>
                			<input type="text" class="form-control" id="" placeholder="+8401694993576">
                		</div>
						<div class="form-group">
                			<label for="">Số điện thoại khác (không bắt buộc)</label>
                			<input type="text" class="form-control" id="" placeholder="+8401694993576">
                		</div>
                	</div>


                	<center class="mycenter"><button type="submit" class="btn btn-primary tieptuc">Tiếp Tục</button></center>
                	<div style="margin-top: 50px;"></div>
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    @endsection
