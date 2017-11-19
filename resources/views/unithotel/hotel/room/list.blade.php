@extends("unithotel.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách
                    <small>Phòng</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Phòng</th>
                        <th>Tình Trạng</th>
                        <th>Đơn Gía</th>
                        <th>Loại Phòng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $r)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->name }}</td>
                            <td>
                                @if($r->status==1) {{ "Có khách" }}
                                @else {{ "Trống" }}
                                @endif
                            </td>
                        <td>{{ $r->price }} VNĐ</td>
                        <td>{{ $r->room->name }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="unithotel/hotel/{{$r->hotel_id}}/room/edit/{{$r->id}}"> Edit</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="unithotel/hotel/{{$r->hotel_id}}/room/delete/{{$r->id}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-lg btn-info btnprovinceadd" href="unithotel/hotel/{{$hotel->id}}/room/add" role="button">Thêm Phòng</a>
            <a class="btn btn-lg btn-info" href="#" role="button">Download Danh Sách Phòng</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
