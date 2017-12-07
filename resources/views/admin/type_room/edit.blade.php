@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin
                    <small>{{ $typeroom->name }}</small>
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

                <form action="admin/typeroom/edit/{{ $typeroom->id }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                    <div class="form-group">
                        <label>Loại Phòng</label>
                        <input class="form-control" name="name" value="{{ $typeroom->name }}"  />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh phòng</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label>Sức chứa (số người):</label>
                        <input type="number" min="0" value="{{ $typeroom->maxpeople }}" class="form-control" name="capacity">
                    </div> <br>
                    <button type="submit" class="btn btn-default">Sửa Loại Phòng</button>
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
