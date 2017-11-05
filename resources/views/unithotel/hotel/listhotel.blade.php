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
                        <th>Địa Chỉ Cụ Thể</th>
                        <th>Huyện</th>
                        <th>Tỉnh</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotel as $h)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $h->id }}</td>
                        <td>{{ $h->name }}</td>
                        <td>{{ $h->address_detail }}</td>
                        <td>{{ $h->province->name }}</td>
                        <td>{{ $h->district->name }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/room/delete/"> Xóa </a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="unithotel/hotel/edit/{{ $h->id }}"> Sửa </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-lg btn-info btnprovinceadd" href="unithotel/hotel/add" role="button">Thêm Khách Sạn</a>
            <a class="btn btn-lg btn-info" href="" role="button">Download Danh Sách Khách Sạ</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
