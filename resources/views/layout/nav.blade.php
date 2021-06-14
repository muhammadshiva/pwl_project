<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item active">
        <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
    </li>
    @if (auth()->user()->level==1)
        <li class="nav-item">
            <a href="/admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}"><i class="nav-icon fas fa-users-cog"></i><p>Admin</p></a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Data User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/masterAdmin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Detail User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/mapel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Mapel</p>
                </a>
              </li>
            </ul>
        </li>
    @elseif (auth()->user()->level==2)
        <li class="nav-item">
            <a href="/guru" class="nav-link {{ request()->is('guru') ? 'active' : '' }}"><i class="nav-icon fas fa-chalkboard-teacher"></i><p>Buat Tugas</p></a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('guru') ? 'active' : '' }}"><i class="nav-icon fas fa-chalkboard-teacher"></i><p>Lihat Hasil Tugas</p></a>
        </li>
    @elseif (auth()->user()->level==3)
        <li class="nav-item">
            <a href="/tugas-siswas" class="nav-link {{ request()->is('guru') ? 'active' : '' }}"><i class="nav-icon fas fa-chalkboard-teacher"></i><p>Tugas Terbaru</p></a>
        </li>
    @endif
</ul>
