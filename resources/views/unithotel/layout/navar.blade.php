<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        
        <ul class="nav" id="side-menu">
            {{-- <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li> --}}
            <div><img src="upload/imageuser/{{ Auth::user()->image }}" class="avatar" alt="" style=""></div>
            <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="unithotel/info/profile"><i class="fa fa-dashboard fa-fw"></i>QUẢN LÍ THÔNG TIN</a>
            </li>
            <li>
                <a href="unithotel/hotel/list"><i class="fa fa-dashboard fa-fw"></i>QUẢN LÍ KHÁCH SẠN</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Hợp đồng<span class="fa arrow"></span></a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>