<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ request()->is('Admin') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li
            class="sidebar-item has-sub {{ request()->is('Admin/categories*') || request()->is('Admin/products*') || request()->is('Admin/gallery*') ? 'active' : '' }} ">
            <a href="#" class="sidebar-link">
                <i class="bi bi-stack"></i>
                <span>Component</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->is('Admin/categories*') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}">Category</a>
                </li>

                <li class="submenu-item {{ request()->is('Admin/products*') ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}">Product</a>
                </li>

                <li class="submenu-item {{ request()->is('Admin/gallery*') ? 'active' : '' }}">
                    <a href="{{ route('gallery.index') }}">Product Gallery</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-title">History Transaction</li>

        <li
            class="sidebar-item has-sub {{ request()->is('Admin/transaction*') || request()->is('Admin/transactionUser*') ? 'active' : '' }}">
            <a href="#" class="sidebar-link">
                <i class="bi bi-cart"></i>
                <span>Transactions</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item">
                    <a href="{{ route('transactionUser.index') }}">Transaction</a>
                </li>

                <li class="submenu-item {{ request()->is('Admin/transaction*') ? 'active' : '' }}">
                    <a href="{{ route('transaction.index') }}">All Transaction</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-title ">Settings</li>

        <li class="sidebar-item has-sub {{ request()->is('Admin/setting*') ? 'active' : '' }}">
            <a href="#" class="sidebar-link">
                <i class="bi bi-gear-fill"></i>
                <span>Settings</span>
            </a>

            <ul class="submenu">
                <li class="submenu-item  {{ request()->is('Admin/user*') ? 'active' : '' }}">
                    <a href="{{ route('setting', Auth::user()->name) }}">Settings</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-title">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="sidebar-link bg-transparent border-0" type="submit">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Log Out</span>
                </button>

            </form>
        </li>
    </ul>
</div>
