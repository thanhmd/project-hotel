@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm
                    <small>Quận/Huyện</small>
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

                <form action="admin/district/add" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tỉnh/ Thành Phố</label>
                        <select class="form-control" name="province">
                            @foreach($province as $pr )
                            <option value="{{ $pr->id }}">{{ $pr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Quận/Huyện</label>
                        <input class="form-control" name="name" placeholder="Nhập tên Quận/Huyện" />
                    </div>

                    <button type="submit" class="btn btn-default">Thêm Quận/Huyện</button>
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
