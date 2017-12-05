<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="unithotel/info/profile">Chào Bạn <span style="color: red;font-size: 20px; font-style: italic;font-weight: bold;">{{ Auth::user()->name }}</span>
        </a> <br>

    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                {{-- <li><a href="unithotel/info/profile"><i class="fa fa-user fa-fw"></i> Cập Nhật Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li> --}}
                <li class="divider"></li>
                <li><a href="unithotel/login"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    {{-- <img src="upload/imageuser/{{ Auth::user()->image }}" alt="" style="width: 100px; height:100px;border-radius: 50%; position: absolute;z-index: 99;margin-top: 20px;"> --}}
    @include("unithotel.layout.navar")
    <!-- /.navbar-static-side -->
</nav>
