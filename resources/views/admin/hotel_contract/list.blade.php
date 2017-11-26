@extends("admin.layout.index")
@section("content")

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CÁC KHÁCH SẠN ĐÃ DUYỆT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">DS Khách Sạn Đã Duyệt</li>
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
            <p style="width: 50px; height: 50px; background-color: #dcc846d6"></p> Khách Sạn Đã Hết Hợp Đồng <br>
            <p style="width: 50px; height: 50px; background-color: #d5fdfcc9"></p> Khách Sạn Còn Hợp Đồng <br>
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
                    {{-- ks đã duyệt và đã thanh toán tiền --}}
                    @if($h ->status == 1 )
                        @foreach($contract as $c )
                            @if($c->hotel_id == $h->id && $c->expired < date("Y-m-d"))
                                    <tr class="odd gradeX" align="center" style="background-color: #dcc846d6">
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
                                                            {{-- <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                                                            <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                                                            <li data-target="#carousel-id" data-slide-to="2" class="active"></li> --}}
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <div class="item">
                                                                <img  src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzc3NyI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojN2E3YTdhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Rmlyc3Qgc2xpZGU8L3RleHQ+PC9zdmc+">
                                                                <div class="container">
                                                                    <div class="carousel-caption">
                                                                       hình 1
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item">
                                                                <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNmE2YTZhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+U2Vjb25kIHNsaWRlPC90ZXh0Pjwvc3ZnPg==">
                                                                <div class="container">
                                                                    <div class="carousel-caption">
                                                                       hình 2
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item active">
                                                                <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzU1NSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNWE1YTVhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+VGhpcmQgc2xpZGU8L3RleHQ+PC9zdmc+">
                                                                <div class="container">
                                                                    <div class="carousel-caption">
                                                                        hình 3
                                                                    </div>
                                                                </div>
                                                            </div>
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

                                    <td><a href=""><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>Tùy Chỉnh</a></td>
                                </tr>
                            @else
                                    <tr class="odd gradeX" align="center" style="background-color: #d5fdfcc9">
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
                                                            {{-- <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                                                            <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                                                            <li data-target="#carousel-id" data-slide-to="2" class="active"></li> --}}
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <div class="item">
                                                                <img  src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzc3NyI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojN2E3YTdhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Rmlyc3Qgc2xpZGU8L3RleHQ+PC9zdmc+">
                                                                <div class="container">
                                                                    <div class="carousel-caption">
                                                                       hình 1
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item">
                                                                <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNmE2YTZhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+U2Vjb25kIHNsaWRlPC90ZXh0Pjwvc3ZnPg==">
                                                                <div class="container">
                                                                    <div class="carousel-caption">
                                                                       hình 2
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item active">
                                                                <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzU1NSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNWE1YTVhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+VGhpcmQgc2xpZGU8L3RleHQ+PC9zdmc+">
                                                                <div class="container">
                                                                    <div class="carousel-caption">
                                                                        hình 3
                                                                    </div>
                                                                </div>
                                                            </div>
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

                                    <td><a href=""><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>Tùy Chỉnh</a></td>
                                </tr>
                            @endif
                        @endforeach
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
