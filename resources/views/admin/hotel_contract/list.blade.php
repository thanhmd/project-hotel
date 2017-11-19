@extends("admin.layout.index")
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
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{ session('thongbao') }}
            </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã Khách sạn</th>
                        <th>Tên khách sạn</th>
                        <th>Người đại diện</th>
                        <td>Mô Tả</td>
                        <th>Số sao</th>
                        <th>Địa chỉ</th>
                        <th>Mã các dịch vụ</th>
                        <th>Mã các loại phòng</th>
                        <th>Hình ảnh chi tiết khách sạn</th>
                        <th>Duyệt khách sạn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotel as $h )
                    <tr class="odd gradeX" align="center">
                        <td>{{ $h->id }}</td>
                        <td>
                            {{ $h->name }} <br>
                            <img src="upload/hinhkhachsan/{{ $h->image }}" alt="" style="width: 100px; height: 100px;">
                            
                        </td>

                        <td>
                            <p>Người đại diện : {{ $h->user->name }}</p> 
                            <p>Số đt: {{ $h->user->sdt }}</p> 
                            <p>Email: {{ $h->user->email }}</p>
                        </td>
                        <td>
                            <p>
                                {{  mb_substr($h->description,0,100,'UTF-8')
                            }}...
                        </p>
                    </td>
                    <td>
                        {{ $h->start }} sao
                    </td>
                    <td>
                        {{ $h->address_detail }} - {{ $h->district->name }} - {{ $h->province->name }}
                    </td>
                    <td>
                        {{ $h->listservice }}
                    </td>
                    <td>
                        {{ $h->listtyperoom }}
                    </td>
                    <td>
                          @foreach($hotelimgs as $l)
                          <img src="upload/hinhkschitiet/{{ $l->image }}" style="width: 50px;height: 50px;"><br>
                          @endforeach

                    </td>
                  {{-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/admin/delete/{{ $a->id }}"> Delete</a></td> --}}
                    <td class="center">
                        @if($h->status == 0) <i class="fa fa-pencil fa-fw"></i> <a href="admin/hotel_contract/checkshowhotel/{{ $h->id }}">Duyệt khách sạn</a> 
                        @else 
                            Đã Duyệt
                        @endif
                    </td>
              </tr>
              @endforeach
          </tbody>
      </table>
      {{-- <a class="btn btn-lg btn-info btnprovinceadd" href="admin/admin/add" role="button">Thêm Nhân Viên</a>
      <a class="btn btn-lg btn-info" href="" role="button">Download Danh Sách Nhân Viên</a> --}}
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@section("css")

@stop
@section("scrip")

   @stop
   @endsection
