@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách
                    <small>Nhân Viên</small>
                </h1>

            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Họ Và Tên</th>
                        <th>Email</th>
                        <td>Số Điện Thoại</td>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admin as $a )
                        <tr class="odd gradeX" align="center">
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->name }}</td>
                            <td>{{ $a->email }}</td>
                            <td>{{ $a->sdt }}</td>
                            {{-- <td>
                                @if($a->level ==1) {{ "CEO" }}
                                @else {{ "Staff" }}
                                @endif
                            </td> --}}
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/admin/delete/{{ $a->id }}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/admin/edit/{{ $a->id }}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-lg btn-info btnprovinceadd" href="admin/admin/add" role="button">Thêm Nhân Viên</a>
            <a class="btn btn-lg btn-info" href="" role="button">Download Danh Sách Nhân Viên</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
