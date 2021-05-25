<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{BASE_URL}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Poly Shop</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{BASE_URL.'admin'}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý sản phẩm
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{BASE_URL. 'admin/danh-muc'}}"  aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-list-ol"></i>
            <span>Danh mục</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{BASE_URL . 'admin/san-pham'}}"  aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-truck-moving"></i>
            <span>Sản phẩm</span>
        </a>
    </li>

    
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{BASE_URL . 'admin/user'}}"  aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-truck-moving"></i>
            <span>Thành viên</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{BASE_URL . 'admin/order'}}"  aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-truck-moving"></i>
            <span>Đơn hàng</span>
        </a>
    </li>



</ul>