<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        {{-- Sidebar untuk Admin --}}
        @if (auth()->user()->ID_jenis_user == 1)
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/admin">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('role.index') }}">
                    <i class="fa-solid fa-user-plus me-3"></i>
                    <span class="menu-title">Create Role</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/index">
                    <i class="fa-solid fa-user-plus me-3"></i>
                    <span class="menu-title">Create User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('menu.index') }}">
                    <i class="fa-solid fa-user-plus me-3"></i>
                    <span class="menu-title">Create Menu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('Aksesmenu.index') }}">
                    <i class="fa-solid fa-user-plus me-3"></i>
                    <span class="menu-title">Setting Menu User</span>
                </a>
            </li>
        @endif

        {{-- Sidebar untuk Staff --}}
        @if (auth()->user()->ID_jenis_user == 2)
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/staff">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard Staff</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/kategori/index">
                    <i class="fa fa-book"></i>
                    <span class="menu-title">Data Kategori</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/buku/index">
                    <i class="fa fa-book"></i>
                    <span class="menu-title">Data Buku</span>
                </a>
            </li>
        @endif

        {{-- Sidebar untuk Pengguna --}}
        @if (auth()->user()->ID_jenis_user == 3)
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/pengguna">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="icon-book menu-icon"></i>
                    <span class="menu-title">Show Buku</span>
                </a>
            </li>
        @endif
        {{-- <li class="">
            <a class="nav-link">Menu</a>
        </li> --}}
        @foreach ($navbar as $item)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('menu.show', ['menu_link' => $item->menu->menu_link, 'id' => $item->menu->id]) }}">
                    <i class="icon-book menu-icon"></i>
                    <span class="menu-title">{{ $item->menu->menu_name }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
