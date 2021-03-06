@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách
                    <small>Loại Dịch Vụ</small>
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
                        <th>ID</th>
                        <th>Loại Dịch Vụ</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($typeservice as $ts )
                        <tr class="odd gradeX" align="center">
                            <td>{{ $ts->id }}</td>
                            <td>{{ $ts->service }}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/typeservice/delete/{{ $ts->id }}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/typeservice/edit/{{ $ts->id }}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-lg btn-info btnprovinceadd" href="admin/typeservice/add" role="button">Thêm Loại Dịch Vụ</a>
            <a class="btn btn-lg btn-info" href="" role="button">Download Danh Sách Loại Dịch Vụ</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
