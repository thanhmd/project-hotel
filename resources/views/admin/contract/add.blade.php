@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm
                    <small>Hợp Đồng</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

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

                <form action="admin/province/add" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên Hợp Đồng</label>
                        <input class="form-control" name="name" placeholder="Tên Hợp Đồng" />
                    </div>
                    <div>
                        <label>Khách Sạn</label>
                        <select class="form-control" name="province">
                            {{-- @foreach($province as $pr ) --}}
                            <option value="">Khách sạn Sheraton Saigon</option>
                            <option value="">Khách sạn Sheraton Saigon</option>
                            <option value="">Khách sạn Caravelle</option>
                            <option value="">Khu căn hộ cao cấp - Norfolk Mansion</option>
                           {{--  @endforeach --}}
                        </select>
                    </div> <br>
                    <div>
                        <label>Người Đại Diện</label>
                        <select class="form-control" name="province">
                            {{-- @foreach($province as $pr ) --}}
                            <option value="">Trần Thị Hồng Huệ</option>
                            <option value="">Trần Thị Hồng Cẩm</option>
                            <option value="">Sơn Tùng MTP</option>
                            <option value="">Hồ Ngọc Hà</option>
                           {{--  @endforeach --}}
                        </select>
                    </div> <br>
                    <div>
                        <label>Ngày Có Hiệu Lực</label>
                        <input type="date" class="form-control" name="image">
                    </div> <br>
                    <div>
                        <label>Ngày Hết Hiệu Lực</label>
                        <input type="date" class="form-control" name="image">
                    </div> <br>
                    <div>
                        <label>Tình Trạng Thanh Toán</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="" id="input" value="" checked="checked">
                                Đã Thanh Toán Thành Công <br>
                                <input type="radio" name="" id="input" value="">
                                Chưa Thanh Toán Thành Công
                            </label>
                        </div>
                    </div> <br>

                    <button type="submit" class="btn btn-default">Thêm </button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection