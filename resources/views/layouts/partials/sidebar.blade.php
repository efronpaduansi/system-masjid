<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('backend/images/avatar.png') }}" height="58" alt="User Image">
      <div>
        <p class="app-sidebar__user-name">John Doe</p>
        <p class="app-sidebar__user-designation">Frontend Developer</p>
      </div>
    </div>
    <ul class="app-menu">
      <li><a class="app-menu__item" href="{{ route('dashboard.index') }}"><i class="app-menu__icon fas fa-home"></i><span class="app-menu__label">Dashboard</span></a></li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-truck"></i><span class="app-menu__label">Material</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ route('material.index') }}"><i class="icon fas fa-circle"></i> Data Material</a></li>
          <li><a class="treeview-item" href="{{ route('material.create') }}"><i class="icon fas fa-circle"></i> Tambah Baru</a></li>
        </ul>
      </li>
      <li><a class="app-menu__item" href="{{ route('kas.index') }}"><i class="app-menu__icon fas fa-wallet"></i><span class="app-menu__label">Kas Masjid</span></a></li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-people-carry"></i><span class="app-menu__label">Pembangunan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ route('pembangunan.index') }}"><i class="icon fas fa-circle"></i> Data Pembangunan</a></li>
          <li><a class="treeview-item" href="{{ route('anggaran.index') }}"><i class="icon fas fa-circle"></i> Anggaran</a></li>
        </ul>
      </li>
      <li><a class="app-menu__item" href="{{ route('pengeluaran.index') }}"><i class="app-menu__icon fas fa-chart-line"></i><span class="app-menu__label">Analisa Pengeluaran</span></a></li>
      <li><a class="app-menu__item" href="{{ route('user.index') }}"><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label">Manajemen Users</span></a></li>
      <li><a class="app-menu__item" href="{{ route('setting.index') }}"><i class="app-menu__icon fas fa-cogs"></i><span class="app-menu__label">Pengaturan</span></a></li>
    </ul>
  </aside>
