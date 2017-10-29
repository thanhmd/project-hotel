@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh Sách
                    <small>Phòng</small>
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
                
                <form action="admin/room/add" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Loại Phòng</label>
                        <select class="form-control" name="typeroom">
                            @foreach($typeroom as $tr )
                            <option value="{{ $tr->id }}">{{ $tr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phòng</label>
                        <input class="form-control" name="name" placeholder="Nhập tên Phòng" />

                    </div>
                    <div class="form-group">
                        <label>Gía</label>
                        <input class="form-control" name="price" placeholder="Nhập tên giá phòng" />
                    </div>
                    <div class="form-group">
                        <label>Tình trạng phòng</label>
                        <label class="radio-inline">
                            <input name="status" value="0" checked="" type="radio">Trống
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="1" type="radio">Có Khách
                        </label>
                    </div>

                    <button type="submit" class="btn btn-default">Thêm Phòng</button>
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