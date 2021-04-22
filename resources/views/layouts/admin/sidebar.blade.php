<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">
                <span class="align-self-center">DimsFood</span>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <span class="align-self-center">DF</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="mt-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="{{ request()->routeIs('users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users') }}"><i class="fas fa-user"></i>
                    <span>Users Account</span>
                </a>
            </li>
            <li
                class="nav-item dropdown {{ request()->routeIs('drinks.index', 'foods.index', 'addProducts', 'products', 'products.critical', 'products.sold') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cubes"></i>
                    <span>Product</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('addProducts') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('addProducts') }}"><i class="fas fa-clipboard"></i>Add Products</a></li>
                    <li class="{{ request()->routeIs('products', 'drinks.index', 'foods.index', 'products.critical', 'products.sold') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('products') }}"><i class="fas fa-dolly-flatbed"></i>Products List</a>
                    </li>
                    {{-- <li class="{{ request()->routeIs('drinks.index') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('drinks.index') }}"><i class="fas fa-dolly-flatbed"></i>Drinks List</a>
                    </li>
                    <li class="{{ request()->routeIs('foods.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('foods.index') }}"><i class="fas fa-boxes"></i>
                            Foods List
                        </a>
                    </li> --}}
                </ul>
            </li>
            <li class="menu-header">Transaction</li>
            <li class="{{ request()->routeIs('payments.index') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('payments.index') }}"><i class="fas fa-history"></i>
                <span>Confirm Transaction</span></a>
            </li>
            <li class="{{ request()->routeIs('transactions.index') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('transactions.index') }}"><i class="fas fa-history"></i>
                <span>History Transaction</span></a>
            </li>
        </ul>
    </aside>
</div>

