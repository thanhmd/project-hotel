@extends("admin.layout.index")
@section("content")

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DANH SÁCH HỢP ĐỒNG ĐÃ KÍ
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Contract</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>Mã Hợp Đồng</th>
                        <th>Tên Hợp Đồng</th>
                        <th>Khách Sạn</th>
                        <th>Người Đứng Tên</th>
                        <th>Tình Trạng Thanh Toán</th>
                        <th>Ngày Có Hiệu Lực</th>
                        <th>Ngày Hết Hiệu Lực</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($contract as $c)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $c->id}}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{$c->hotel->name}}</td>
                            <td>{{$c->hotel->user->name}}</td>
                            <td>
                                @if($c->pay ==1) 
                                <p>Đã Thanh Toán</p>
                                @else
                                <p>Chưa Thanh Toán</p>
                                @endif
                            <td>
                                {{$c->date_effective}}
                            </td>
                            <td>
                                {{$c->date_expired}}
                            </td>
                        </tr>
                        @endforeach
                </tbody>
              </table>
            </div>
            <a class="btn btn-lg btn-info btnprovinceadd" href="admin/contract/add" role="button">Thêm HỢP ĐỒNG</a>
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
