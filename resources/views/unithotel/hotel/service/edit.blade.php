@extends("unithotel.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin dịch vụ:
                    <small>{{ $hotel_service->id }}</small>
                </h1>
            </div>
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
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="unithotel/hotel/{{$hotel_service->hotel_id}}/detail/service/edit/{{$hotel_service->id}}" method="POST">
                    <label>Loại dịch vụ</label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <select class="form-control" name="service">
                        @foreach($services as $service)
                        <option
                        @if($hotel_service->service_id == $service->id)
                        {{ 'selected' }}
                        @endif
                        value="{{ $service->id }}" >
                        {{ $service->name }}
                    </option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label>Tên dịch vụ</label>
                    <input type="text" class="form-control" name="name" value="{{ $hotel_service->name }}" />
                </div>

                <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" type="number" min="0" name="price" placeholder="Nhập giá phòng" value="{{ $hotel_service->price }}"/>
                </div>

                <button type="submit" class="btn btn-default">Edit</button>
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
