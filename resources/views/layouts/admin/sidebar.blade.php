<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('/tampilan-admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="color : white;" >
            {{ Auth::guard('admin')->user()->name }}
        </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                Dashboard
                </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('admin.pengguna') }}" class="nav-link {{ request()->routeIs('admin.pengguna') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                Akun Pengguna
                </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/admin/barang/index') }}" class="nav-link {{ request()->routeIs('admin.makanan', 'admin.makanan.tambah', 'admin.makanan.edit') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cubes"></i>
                <p>
                Daftar Makanan
                </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ url('/admin/transaksi/index') }}" class="nav-link {{ request()->routeIs('admin.transaksi', 'admin.transaksiDetail') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cash-register"></i>
                <p>
                Laporan Transaksi
                </p>
            </a>
            </li>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
