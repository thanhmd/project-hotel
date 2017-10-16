@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Tỉnh/ Thành Phố</label>
                        <select class="form-control" name="theloai">
                            <option value="">Thành Phố Hồ Chí Minh</option>
                            <option value="">Hà Nội</option>
                            <option value="">Quãng Ngãi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="txtUser" placeholder="Please Enter Username" />
                    </div>
                    
                    <button type="submit" class="btn btn-default">User Add</button>
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