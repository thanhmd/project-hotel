@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách
                    <small>Khách Hàng</small>
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
                        <th>Tên Khách Hàng</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer as $c)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->sdt }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/customer/delete/{{ $c->id }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/customer/edit/{{ $c->id }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-lg btn-info btnprovinceadd" href="admin/customer/add" role="button">Thêm Khách Hàng</a>
            <a class="btn btn-lg btn-info" href="" role="button">Download Danh Sách Khách Hàng</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
