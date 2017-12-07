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

                <form action="admin/contract/add" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên Hợp Đồng</label>
                        <input class="form-control" name="contract_name" placeholder="Tên Hợp Đồng" />
                    </div>
                    <div>
                        <label>Khách Sạn</label>
                        <select class="form-control" name="hotel">
                           @foreach($hotels as $hotel)
                            <option value="{{$hotel->id}}">{{ $hotel->name }}</option>
                           @endforeach
                        </select>
                    </div> <br>
                    <div>
                        <label>Người Đại Diện</label>
                        <select class="form-control" name="owner">
                            @foreach($customers as $customer)
                             <option value="{{$customer->id}}"> {{$customer->name}} </option>
                            @endforeach
                        </select>
                    </div> <br>
                    <div>
                        <label>Ngày Có Hiệu Lực</label>
                        <input type="date" class="form-control" name="date_effective">
                    </div> <br>
                    <div>
                        <label>Ngày Hết Hiệu Lực</label>
                        <input type="date" class="form-control" name="out_date_effective">
                    </div> <br>
                    <div>
                        <label>Tình Trạng Thanh Toán</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="input" value="1" checked="checked">
                                Đã Thanh Toán <br>
                                <input type="radio" name="status" id="input" value="0">
                                Chưa Thanh Toán
                            </label>
                        </div>
                    </div> <br>

                    <button type="submit" class="btn btn-default">Thêm </button>
                    <button type="reset" class="btn btn-default">Reset</button>
                  </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection
