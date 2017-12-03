@extends("unithotel.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm
                    <small>Dịch Vụ</small>
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
            <div class="col-lg-7" style="padding-bottom:120px">

                <form action="unithotel/hotel/{{$hotel->id}}/detail/service/add" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Loại Dịch Vụ</label>
                        <select class="form-control" name="service">
                            @foreach($services as $service )
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên dịch vụ</label>
                        <input class="form-control" name="name" placeholder="Nhập tên Dịch Vụ" />

                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" type="number" min="0" name="price" placeholder="Nhập giá dịch vụ" />
                    </div>


                    <button type="submit" class="btn btn-default">Thêm Dịch Vụ</button>
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
