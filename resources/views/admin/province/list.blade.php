@extends("admin.layout.index")
@section("content")

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
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
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tỉnh/Thành phố</th>
                        <th>Mô tả</th>
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
                            <td>{{ $p->description }}</td>
                            <td><img src="upload/hinhtinh/{{ $p->image }}" alt="" style="height: 100px; width: 100px"></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/province/delete/{{ $p->id }}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/province/edit/{{ $p->id }}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> --}}
              </table>
            </div>
            <a class="btn btn-lg btn-info btnprovinceadd" href="admin/province/add" role="button">Thêm Tỉnh/Thành Phố</a>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
