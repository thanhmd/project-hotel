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
                        <th>Tên Khách Sạn</th>
                        <th>Số Sao</th>
                        <th>Giới Thiệu</th>
                        <th>TP/Tỉnh</th>
                        <th>Quận/Huyện</th>
                        <th>Địa Chỉ</th>
                        <th>Hình Đại Diện</th>
                        <!-- <th>Slide Ảnh</th>
                        <th>Danh mục phòng</th>
                        <th>Danh mục dịch vụ</th> -->
                        <th>Tình trạng hợp đồng</th>
                        <th>Chi tiết</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotels as $h)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $h->id }}</td>
                        <td>{{ $h->name }}</td>
                        <td>{{ $h->star }}</td>
                        <td>{{ UnitHotel::readMoreHelper( $h->description) }}
                            <a href="#" data-toggle="modal" data-target="#descriptionModal">
                              ... Xem tiếp
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Giới thiệu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    {{$h->description}}
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                        <td>{{ $h->province->name }}</td>
                        <td>{{ $h->district->name }}</td>
                        <td>{{ $h->address_detail }}</td>
                        <td> <img style="width: 186px" src="upload/hinhkhachsan/{{ $h->image }}" class="img-responsive" alt="Image"></td>

                        <!-- <td class="center btnListImage"><i class="glyphicon glyphicon-list-alt"></i><a href="#"> Xem</a></td>

                        <td class="center btnListRoom"><i class="glyphicon glyphicon-list-alt"></i><a href="unithotel/hotel/{{ $h->id }}/detail/room/list"> Xem</a></td>

                        <td class="center btnListService"><i class="glyphicon glyphicon-list-alt"></i><a href="unithotel/hotel/{{ $h->id }}/detail/service/list"> Xem</a></td> -->

                        <td>
                          @if($h->status == 1) {{"Đã duyệt"}}
                          @else {{"Chưa duyệt"}}
                          @endif
                        </td>
                        <td class="center btnDetail"><i class="glyphicon glyphicon-list-alt"></i><a href="unithotel/hotel/{{$h->id}}/detail"> Xem chi tiết</a></td>
                        <td class="center btnDeleteKs"><i class="glyphicon glyphicon-remove"></i><a href="unithotel/hotel/delete/{{ $h->id }}"> Xóa</a></td>
                        <td class="center"><i class="glyphicon glyphicon-edit"></i><a href="unithotel/hotel/edit/{{ $h->id }}"> Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-lg btn-info btnHotelAdd" href="unithotel/hotel/add" role="button">Thêm Khách Sạn</a>
            <a class="btn btn-lg btn-info" href="" role="button">Download Danh Sách Khách Sạn</a>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
@section('script')
<script>
                $('.btnDeleteKs').on('click',function(e){
                    var answer=confirm('Bạn có muốn xóa khách sạn này không?');
                    if(answer){
                        window.location.href=($('.btnDeleteKs').attr('href'));
                    }
                    else{
                        e.preventDefault();
                    }
                });
            </script>
@endsection
