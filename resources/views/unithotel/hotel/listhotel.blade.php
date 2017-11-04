@extends("unithotel.layout.index")
@section("content")
	
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách
                    <small>Khách Sạn</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            {{-- @if(count($errors) >0 )
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
            @endif --}}
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Khách Sạn</th>
                        <th>Địa Chỉ Khách Sạn</th>
                        <th>Loại Phòng</th>
                        <th>Số Lượng Phòng</th>
                        <th>Dịch Vụ</th>
                        <th>Loại Dịch Vụ</th>
                        <th>Sửa</th>
                        <td>Xóa</td>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($room as $r) --}}
                    <tr class="odd gradeX" align="center">
                        <td>1</td>
                        <td>White Hotel</td>
                        <td>12 Nguyễn Kiệm, Gò Vấp, TP HCM</td>
                        <td>Phòng Vip</td>
                        <td>10</td>
						<td>Massage</td>
						<td>Làm Đẹp</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/room/delete/"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/room/edit/">Edit</a></td>
                    </tr>
                    <tr class="odd gradeX" align="center">
                        <td>2</td>
                        <td>White Hotel54645</td>
                        <td>12 Nguyễn Kiệm, Gò Vấp, TP HCM</td>
                        <td>Phòng Vip</td>
                        <td>10</td>
						<td>Massage</td>
						<td>Làm Đẹp</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/room/delete/"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/room/edit/">Edit</a></td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
            <a class="btn btn-lg btn-info btnprovinceadd" href="admin/room/add" role="button">Thêm Khách Sạn</a>
            <a class="btn btn-lg btn-info" href="" role="button">Download Danh Sách Khách Sạn</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
