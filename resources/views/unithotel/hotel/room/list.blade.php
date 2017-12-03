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
                        <th>Sức chứa (người)</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detail_typerooms as $detail_tr)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $detail_tr->id }}</td>
                        <td>{{ $detail_tr->name }}</td>
                            <td>
                                @if($detail_tr->status==1) {{ "Có khách" }}
                                @else {{ "Trống" }}
                                @endif
                            </td>
                        <td>{{ $detail_tr->price }} VNĐ</td>
                        <td>{{ $detail_tr->type_room->name }}</td>
                        <td>{{ $detail_tr->maxpeople }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="unithotel/hotel/{{$detail_tr->hotel_id}}/detail/room/edit/{{$detail_tr->id}}"> Edit</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="unithotel/hotel/{{$detail_tr->hotel_id}}/detail/room/delete/{{$detail_tr->id}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-lg btn-info" href="unithotel/hotel/{{$hotel->id}}/detail/room/add" role="button">Thêm Phòng</a>
            <a class="btn btn-lg btn-info" href="#" role="button">Download Danh Sách Phòng</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
