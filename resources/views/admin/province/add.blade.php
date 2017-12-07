@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm
                    <small>Tỉnh/Thành Phố</small>
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

                <form action="admin/province/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên Tỉnh/Thành Phố</label>
                        <input class="form-control" name="name" placeholder="Thêm Tỉnh/Thành phố" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="description" id="input" class="form-control" rows="5" value="" placeholder="Mô tả"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file" class="form-control" name="image">
                    </div> <br>

                    <button type="submit" class="btn btn-default">Thêm Tỉnh/Thành Phố</button>
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
