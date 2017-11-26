
    <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="admin_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Hồng Huệ - WEB Developer</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        {{-- <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> --}}
        <li>
            {{-- Quản lí tỉnh/ thành phố --}}
            <a href="admin/province/list">
                <i class="fa fa-calendar"></i> <span>Quản lí Tỉnh/ Thành Phố</span>
                {{-- <span class="pull-right-container">
                  <small class="label pull-right bg-red">3</small>
                  <small class="label pull-right bg-blue">17</small>
                </span> --}}
            </a>
        </li>
        <li>
            {{-- Quản lí tỉnh/ thành phố --}}
            <a href="admin/district/list">
                <i class="fa fa-calendar"></i> <span>Quản lí Quận/ Huyện</span>
                {{-- <span class="pull-right-container">
                  <small class="label pull-right bg-red">3</small>
                  <small class="label pull-right bg-blue">17</small>
                </span> --}}
            </a>
        </li>
        <li>
            {{-- Quản lí tỉnh/ thành phố --}}
            <a href="admin/typeroom/list">
                <i class="fa fa-calendar"></i> <span>Quản lí Loại Phòng</span>
                {{-- <span class="pull-right-container">
                  <small class="label pull-right bg-red">3</small>
                  <small class="label pull-right bg-blue">17</small>
                </span> --}}
            </a>
        </li>
        <li>
            {{-- Quản lí tỉnh/ thành phố --}}
            <a href="admin/typeservice/list">
                <i class="fa fa-calendar"></i> <span>Quản lí Loại Dịch Vụ</span>
                {{-- <span class="pull-right-container">
                  <small class="label pull-right bg-red">3</small>
                  <small class="label pull-right bg-blue">17</small>
                </span> --}}
            </a>
        </li>
        <li>
            {{-- Quản lí tỉnh/ thành phố --}}
            <a href="admin/service/list">
                <i class="fa fa-calendar"></i> <span>Quản lí Dịch Vụ</span>
                {{-- <span class="pull-right-container">
                  <small class="label pull-right bg-red">3</small>
                  <small class="label pull-right bg-blue">17</small>
                </span> --}}
            </a>
        </li>
        <li>
            {{-- Quản lí tỉnh/ thành phố --}}
            <a href="admin/service/list">
                <i class="fa fa-calendar"></i> <span>Quản lí Khách Sạn</span>
                {{-- <span class="pull-right-container">
                  <small class="label pull-right bg-red">3</small>
                  <small class="label pull-right bg-blue">17</small>
                </span> --}}
            </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Quản Lí Khách Sạn</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/hotel_contract/list"><i class="fa fa-circle-o"></i> Khách Sạn Đã Duyệt</a></li>
            <li><a href="admin/hotel_contract/list-not-ckect"><i class="fa fa-circle-o"></i> Khách Sạn Chưa Duyệt
                <span class="pull-right-container">
                    <small class="label pull-right bg-yellow">12</small>
                </span>
            </a>
                
            </li>
          </ul>
        </li>
        
        
        
        <li><a href="admin/contract/list"><i class="fa fa-book"></i> <span>Quản Lí Hợp Đồng</span></a></li>
        {{-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
