        @extends("admin.layout.index")
        @section("content")
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa thông tin dịch vụ:
                            <small>{{ $service->id }}</small>
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
                        <form action="admin/service/edit/{{ $service->id }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label>Loại Dịch Vụ</label>
                            <select class="form-control" name="typeservice">
                                @foreach($typeservice as $ts)
                                    <option 
                                    @if($service->typeservice_id == $ts->id)
                                    {{ 'selected' }}
                                    @endif
                                    value="{{ $ts->id }}" >
                                    {{ $ts->service }}
                                    </option>
                                @endforeach
                            </select>
                        <div class="form-group">
                            <label>Tên Dịch Vụ</label>
                            <input type="text" class="form-control" name="name" value="{{ $service->name }}" />
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
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