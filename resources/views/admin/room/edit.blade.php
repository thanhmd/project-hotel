@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin phòng:
                    <small>{{ $room->id }}</small>
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
                <form action="admin/room/edit/{{ $room->id }}" method="POST">
                    <label>Loại phòng</label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <select class="form-control" name="typeroom">
                        @foreach($typeroom as $tr)
                        <option 
                        @if($room->typeroom_id == $tr->id)
                        {{ 'selected' }}
                        @endif
                        value="{{ $tr->id }}" >
                        {{ $tr->name }}
                    </option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label>Tên phòng</label>
                    <input type="text" class="form-control" name="name" value="{{ $room->name }}" />
                </div>

                <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="price" placeholder="Nhập đơn giá phòng" value="{{ $room->price }}"/>
                </div>

                <div class="form-group">
                    <label>Tình trạng phòng</label>
                    <label class="radio-inline">
                        <input name="status" value="0" @if($room->status == 0)
                        {{ 'checked' }} @endif  type="radio">Trống
                    </label>
                    <label class="radio-inline">
                        <input name="status" value="1" @if($room->status == 1)
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