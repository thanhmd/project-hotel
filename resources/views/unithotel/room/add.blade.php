@extends("hotel.layout.index")
@section("content")
<!-- Page Content -->

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Chi Tiết Phòng <br>
					<small>Hãy cho chúng tôi biết về căn phòng đầu tiên của Quý vị. Sau khi hoàn tất, Quý vị sẽ có thể điền thêm chi tiết về các phòng khác của chỗ nghỉ</small>
				</h1>
			</div>
            <form action="" method="POST" role="form">
               
               <div style="" class="infohotel">
                  <legend>Vui lòng lựa chọn</legend>
                  <div class="form-group">
                     <label for="">Loại Phòng</label>
                     <select id="type" class="form-control" name="option">
                        <option value="">Phòng đơn</option>
                        <option value="value1">Phòng đôi</option>
                        <option value="value2">Phòng đơn đa người</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tên Phòng</label>
                    <select id="type" class="form-control" name="option">
                        <option value="">Phòng đơn nhìn ra hồ</option>
                        <option value="value1">Phòng đơn nhìn ra núi</option>
                        <option value="value2">Phòng đơn lớn</option>
                    </select>
                </div>
                <div class="form-group">
                 <label for="">Chính sách về hút thuốc</label>
                 <select id="type" class="form-control" name="option">
                    <option value="">Có hút thuốc</option>
                    <option value="value1">Không hút thuốc</option>
                </select>
            </div>
        </div>
        <div class="addresshotel">
          <legend>Giá cơ bản mỗi đêm.Đây là giá thấp nhất mà chúng tôi tự động áp dụng đối với phòng này cho tất cả các ngày</legend>
          <div class="form-group">
             <input type="text" class="form-control" id="" placeholder="200k">
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
