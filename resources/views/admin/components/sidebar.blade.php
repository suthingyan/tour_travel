<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="{{ Request::is('admin/dashboard') ? 'menu-title' : '' }}">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/packages*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.packages.index') }}">
                <span class="icon-bg"><i class="mdi mdi-package-variant-closed menu-icon"></i></span>
                <span class="{{ Request::is('admin/packages*') ? 'menu-title' : '' }}">Packages </span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/guides*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.guides.index') }}">
                <span class="icon-bg"><i class="mdi mdi-account-multiple-outline menu-icon"></i></span>
                <span class="{{ Request::is('admin/guides*') ? 'menu-title' : '' }}">Tour Guide</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.categories.index') }}">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="{{ Request::is('admin/categories*') ? 'menu-title' : '' }}">Destination </span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/tags*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.tags.index') }}">
                <span class="icon-bg"><i class="mdi mdi-tag-outline menu-icon"></i></span>
                <span class="{{ Request::is('admin/tags*') ? 'menu-title' : '' }}">Tags </span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/payments*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.payments.index') }}">
                <span class="icon-bg"><i class="mdi mdi-qrcode-scan menu-icon"></i></span>
                <span class="{{ Request::is('admin/payments*') ? 'menu-title' : '' }}">Payments </span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/orders*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.orders.index') }}">
                <span class="icon-bg"><i class="mdi mdi-bell-ring-outline menu-icon"></i></span>
                <span class="{{ Request::is('admin/orders*') ? 'menu-title' : '' }}">Orders </span>
            </a>
        </li>
        <li class="nav-item  {{ Request::is('admin/users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <span class="icon-bg"><i class="mdi mdi-account-circle menu-icon"></i></span>
                <span class="{{ Request::is('admin/users*') ? 'menu-title' : '' }}">Users </span>
            </a>
        </li>
        <li class="nav-item  {{ Request::is('admin/admins*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.admins.index') }}">
                <span class="icon-bg"><i class="mdi mdi-account-key menu-icon"></i></span>
                <span class="{{ Request::is('admin/admins*') ? 'menu-title' : '' }}">Admins </span>
            </a>
        </li>
    </ul>
</nav>
