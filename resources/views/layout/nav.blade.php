<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item active">
        <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
    </li>
    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a href="/admin" class="nav-link"><i class="nav-icon fas fa-users-cog"></i><p>Admin</p></a>
    </li>
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a href="/guru" class="nav-link"><i class="nav-icon fas fa-chalkboard-teacher"></i><p>Guru</p></a>
    </li>
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a href="/siswa" class="nav-link"><i class="nav-icon fas fa-user-graduate"></i><p>Siswa</p></a>
    </li>
</ul>
