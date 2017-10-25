@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách
                    <small>Quận/ Huyện</small>
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
                        <th>Quận/Huyện</th>
                        <th>Tỉnh/Thành Phố</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($district as $t)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $t->id }}</td>
                        <td>{{ $t->name }}</td>
                        <td>{{ $t->province->name }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/district/delete/{{ $t->id }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/district/edit/{{ $t->id }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
