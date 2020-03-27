<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Admin</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (Request::is('admin') ? 'active' : '') }}">
      <a class="nav-link" href="/admin">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Trang chủ</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (Request::is('admin/category') ? 'active' : '') }}">
      <a class="nav-link" href="{{ route('category.index') }}">
      <i class="fas fa-fw fa-folder"></i>
      <span>Danh mục</span></a>
    </li>
    <li class="nav-item {{ (Request::is('admin/productType') ? 'active' : '') }}">
      <a class="nav-link" href="{{ route('productType.index') }}">
      <i class="far fa-folder-open"></i>
      <span>Loại sản phẩm</span></a>
    </li>
    <li class="nav-item {{ (Request::is('admin/product') ? 'active' : '') }}">
      <a class="nav-link" href="{{ route('product.index') }}">
      <i class="far fa-folder-open"></i>
      <span>Sản phẩm</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
      Addons
    </div>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  </ul>