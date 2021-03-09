<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('assets_admin/images/logo/logo.png') }}" alt="Logo"
                            srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }} ">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title">Datas</li>
                <li class="sidebar-item {{ request()->routeIs('users') ? 'active' : '' }}">
                    <a href="{{ route('users') }}" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>Users Account</span>
                    </a>
                </li>
                <li
                    class="sidebar-item {{ request()->routeIs('drinks.index', 'foods.index', 'addProducts') ? 'active' : '' }}  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-box-seam"></i>
                        <span>Products</span>
                    </a>
                    <ul
                        class="submenu {{ request()->routeIs('drinks.index', 'foods.index', 'addProducts') ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->routeIs('addProducts') ? 'active' : '' }}">
                            <a href="{{ route('addProducts') }}">Add Products</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('foods.index') ? 'active' : '' }}">
                            <a href="{{ route('foods.index') }}">Foods List</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('drinks.index') ? 'active' : '' }}">
                            <a href="{{ route('drinks.index') }}">Drinks List</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-title">Transaction</li>
                <li class="sidebar-item  {{ request()->routeIs('transactions.index') ? 'active' : '' }}">
                    <a href="{{ route('transactions.index') }}" class='sidebar-link'>
                        <i class="bi bi-clock-history"></i>
                        <span>History Transaction</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                <li class="sidebar-item  {{ request()->routeIs('payments.index') ? 'active' : '' }}">
                    <a href="{{ route('payments.index') }}" class='sidebar-link'>
                        <i class="bi bi-check-all"></i>
                        <span>Confirm Transaction</span>
                    </a>
                </li>
                <li class="sidebar-item mt-3">
                    <a href="{{ route('logout') }}" class='sidebar-link text-danger'>
                        <i class="bi bi-chevron-left text-danger"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
