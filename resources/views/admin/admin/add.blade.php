@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm
                    <small>Nhân Viên</small>
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

                <form action="admin/admin/add" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Họ Và Tên</label>
                        <input class="form-control" name="name" placeholder="Họ và Tên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"  class="form-control" name="email" placeholder="Nhập địa chỉ email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input type="password" class="form-control" name="re_password" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="sdt"  class="form-control" name="sdt" placeholder="Nhập số điện thoại" />
                    </div>
                    <!-- <div class="form-group">
                        <label>Chức Vụ</label>
                        <label class="radio-inline">
                            <input name="level" value="0" checked="" type="radio">CEO
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1" type="radio">Staff
                        </label>
                    </div> -->
                    <button type="submit" class="btn btn-default">Thêm Nhân Viên</button>
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