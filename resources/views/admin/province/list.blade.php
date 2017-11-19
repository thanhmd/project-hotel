@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách
                    <small>Tỉnh/ Thành Phố</small>
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
                        <th>Tỉnh/Thành phố</th>
                        <th>Hình Ảnh</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($province as $p )
                        <tr class="odd gradeX" align="center">
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->name }}</td>
                            <td><img src="upload/hinhtinh/{{ $p->image }}" alt="" style="height: 100px; width: 100px"></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/province/delete/{{ $p->id }}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/province/edit/{{ $p->id }}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-lg btn-info btnprovinceadd" href="admin/province/add" role="button">Thêm Tỉnh/Thành Phố</a>
            <a class="btn btn-lg btn-info" href="" role="button">Download Danh Sách Tỉnh/ Thành Phố</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
