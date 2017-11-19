@extends("unithotel.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách
                    <small>Dịch Vụ</small>
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
                        <th>Tên Dịch Vụ</th>
                        <th>Giá</th>
                        <th>Loại Dịch Vụ</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotel_services as $hotel_service)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $hotel_service->id }}</td>
                        <td>{{ $hotel_service->name }}</td>
                        <td>{{ $hotel_service->price }} VNĐ</td>
                        <td>{{ $hotel_service->service->name }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="unithotel/hotel/{{$hotel_service->hotel_id}}/service/edit/{{$hotel_service->id}}"> Edit</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="unithotel/hotel/{{$hotel_service->hotel_id}}/service/delete/{{$hotel_service->id}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-lg btn-info btnprovinceadd" href="unithotel/hotel/{{$hotel->id}}/service/add" role="button">Thêm Dịch Vụ</a>
            <a class="btn btn-lg btn-info" href="#" role="button">Download Danh Sách Dịch Vụ</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
