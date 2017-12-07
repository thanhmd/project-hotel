@extends("admin.layout.index")
@section("content")

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CÁC KHÁCH SẠN CHƯA DUYỆT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">DS Khách Sạn Chưa Duyệt</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              {{-- <h3 class="box-title">Hover Data Table</h3> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>Mã Khách Sạn</th>
                        <th>Thông Tin Người Đại Diện</th>
                        <th>Tên Khách Sạn/Số Sao/Địa Chỉ</th>
                        <th>Mô Tả</th>
                        <th>Dịch Vụ</th>
                        <th>Loại Phòng</th>
                        <th>Tùy Chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotel as $h )
                    @if($h ->status == 0 )
                    <tr class="odd gradeX" align="center">
                        <td>{{ $h->id }}</td>
                        <td>
                            <p>Người đại diện : {{ $h->user->name }}</p>
                            <p>Số đt: {{ $h->user->sdt }}</p>
                            <p>Email: {{ $h->user->email }}</p>
                        </td>
                        <td>
                            {{ $h->name }} <br>
                            <img src="upload/hinhkhachsan/{{ $h->image }}" alt="" style="width: 100px; height: 100px;"> <br>
                            @for ($i = 0; $i < $h->star ; $i++)
                            <img src="front_assets/image/christmas_star.png" alt="" class="imgstart" style="width: 20px; height: 20px;">
                            @endfor
                            <br>
                            <!-- Button trigger modal -->
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="color: red; background: #fff;border: none;">
                              Xem các hình ảnh khác của khách sạn
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="background-color: none">Các hình ảnh của khách sạn</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="carousel-id" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                @if(count($h->images()->get()) > 0)
                                									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                									@for($i = 1; $i < count($h->images()->get()); $i++)
                                										<li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                                									@endfor
                                								@endif
                                            </ol>
                                            <div class="carousel-inner">
                                                @if(count($h->images()->get()) > 0)
                                                  <div class="item active">
                                                    <img src="{{ 'upload/hinhkschitiet/' . $h->images()->get()[0]->name }}" >
                                                  </div>
                                                  @for($i = 1; $i < count($h->images()->get()); $i++)
                                                  <div class="item">
                                                    <img src="{{ 'upload/hinhkschitiet/' . $h->images()->get()[$i]->name }}" >
                                                  </div>
                                                  @endfor
                                                @endif
                                            </div>
                                            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>

                                </div>
                            </div>
                            <br>
                             {{ $h->address_detail }} - <br>{{ $h->district->name }} - {{ $h->province->name }}
                        </td>

                        <td>
                            <p>
                                {{  mb_substr($h->description,0,20,'UTF-8')
                            }}...
                            </p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            Xem Thêm
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Giới Thiệu về Khách Sạn {{$h->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                        <p>
                                            {{  $h->description
                                            }}
                                        </p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>

                        <td>
                            @foreach($service as $s)
                                @if($h->id == $s->hotel_id)
                                    <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>{{ $s->name }}- {{$s->price}}VNĐ</p>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($typeroom as $tp)
                                @if($h->id == $tp->hotel_id)
                                    <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>{{ $tp->name }}- {{$tp->price}}VNĐ</p>
                                @endif
                            @endforeach
                        </td>

                        <td><a href="admin/hotel_contract/checkshowhotel/{{ $h->id }}"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>Duyệt Khách sạn</a></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
              </table>
            </div>
            {{-- <a class="btn btn-lg btn-info btnprovinceadd" href="admin/province/add" role="button">Thêm Tỉnh/Thành Phố</a> --}}
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
