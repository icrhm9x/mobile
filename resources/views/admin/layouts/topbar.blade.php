<nav class="navbar navbar-expand navbar-light bg-while topbar mb-3 static-top shadow">
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('members')->user()->name }}</span>
        <img class="img-profile rounded-circle" src="{{ asset(isset(Auth::guard('members')->user()->avatar) ? Auth::guard('members')->user()->avatar : 'assets/admin/img/default-avatar.png') }}">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('get.admin.logout') }}">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
