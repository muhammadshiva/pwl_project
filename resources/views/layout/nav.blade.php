<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item active">
        <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
    </li>
    @if (auth()->user()->level==1)
        <li class="nav-item">
            <a href="/admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}"><i class="nav-icon fas fa-users-cog"></i><p>Admin</p></a>
        </li>
        <li class="nav-item">
            <a href="/guru" class="nav-link {{ request()->is('guru') ? 'active' : '' }}"><i class="nav-icon fas fa-chalkboard-teacher"></i><p>Guru</p></a>
        </li>
        <li class="nav-item">
            <a href="/siswa" class="nav-link {{ request()->is('siswa') ? 'active' : '' }}"><i class="nav-icon fas fa-user-graduate"></i><p>Siswa</p></a>
        </li>
    @elseif (auth()->user()->level==2)
        <li class="nav-item">
            <a href="/guru" class="nav-link {{ request()->is('guru') ? 'active' : '' }}"><i class="nav-icon fas fa-chalkboard-teacher"></i><p>Guru</p></a>
        </li>
        <li class="nav-item">
            <a href="/siswa" class="nav-link {{ request()->is('siswa') ? 'active' : '' }}"><i class="nav-icon fas fa-user-graduate"></i><p>Siswa</p></a>
        </li>
    @elseif (auth()->user()->level==3)
        <li class="nav-item">
            <a href="/siswa" class="nav-link {{ request()->is('siswa') ? 'active' : '' }}"><i class="nav-icon fas fa-user-graduate"></i><p>Siswa</p></a>
        </li>
    @endif


</ul>
