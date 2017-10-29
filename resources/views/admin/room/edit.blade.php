@extends("admin.layout.index")
@section("content")
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin quận/ huyện:
                    <small>{{ $district->name }}</small>
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
                <form action="admin/district/edit/{{ $district->id }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <select class="form-control" name="province">
                        @foreach($province as $pr)
                        <option 
                        @if($district->province_id == $pr->id)
                        {{ 'selected' }}
                        @endif
                        value="{{ $pr->id }}" >
                        {{ $pr->name }}
                    </option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label>Quận/Huyện</label>
                    <input type="text" class="form-control" name="name" value="{{ $district->name }}" />
                </div>

                <button type="submit" class="btn btn-default">User Edit</button>
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