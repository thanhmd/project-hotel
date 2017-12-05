@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách
                    <small>Loại Phòng</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã Loại Phòng</th>
                        <th>Loại Phòng</th>
                        {{-- <th>Đơn giá/đêm</th> --}}
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($typeroom as $tp )
                        <tr class="odd gradeX" align="center">
                            <td>{{ $tp->id }}</td>
                            <td >
                                {{ $tp->name }} <br>
                                <img src="upload/hinhloaiphong/{{ $tp->image }}" alt="" style="width: 50px; height: 50px;">

                            </td>
                            {{-- <td>{{ $tp->price }}</td> --}}
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/typeroom/delete/{{ $tp->id }}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/typeroom/edit/{{ $tp->id }}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-lg btn-info btnprovinceadd" href="admin/typeroom/add" role="button">Thêm Loại Phòng</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
