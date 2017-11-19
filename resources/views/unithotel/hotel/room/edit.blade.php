@extends("unithotel.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin phòng:
                    <small>{{ $hotel_room->id }}</small>
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
                <form action="unithotel/hotel/{{$hotel_room->hotel_id}}/room/edit/{{$hotel_room->id}}" method="POST">
                    <label>Loại phòng</label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <select class="form-control" name="room">
                        @foreach($rooms as $room)
                        <option 
                        @if($hotel_room->room_id == $room->id)
                        {{ 'selected' }}
                        @endif
                        value="{{ $room->id }}" >
                        {{ $room->name }}
                    </option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label>Tên phòng</label>
                    <input type="text" class="form-control" name="name" value="{{ $hotel_room->name }}" />
                </div>

                <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" type="number" min="0" name="price" placeholder="Nhập giá phòng" value="{{ $hotel_room->price }}"/>
                </div>

                <div class="form-group">
                    <label>Tình trạng phòng</label>
                    <label class="radio-inline">
                        <input name="status" value="0" @if($hotel_room->status == 0)
                        {{ 'checked' }} @endif  type="radio">Trống
                    </label>
                    <label class="radio-inline">
                        <input name="status" value="1" @if($hotel_room->status == 1)
                        {{ 'checked' }} @endif type="radio">Có Khách
                    </label>
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