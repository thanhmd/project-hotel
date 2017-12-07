@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm
                    <small>Loại Phòng</small>
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

                <form action="admin/typeroom/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên Phòng</label>
                        <input class="form-control" name="name" placeholder="Nhập tên phòng" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh phòng</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label>Sức chứa (số người):</label>
                        <input type="number" min="0" value="0" class="form-control" name="capacity">
                    </div> <br>
                    <button type="submit" class="btn btn-default">Thêm Phòng</button>
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
