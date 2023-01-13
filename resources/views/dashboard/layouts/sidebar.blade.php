<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand">
      <a class="navbar-brand fs-5 fw-bold" href="/dashboard">
        <span class="merek">TANYO</span> MERUNOE
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      {{-- Dashboard --}}
      @if (auth()->user()->role == 1)
      <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard" class="menu-link">
          <i class="fa-duotone fa-grid-2 me-3"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('dashboard/materi') ? 'active' : '' }}">
        <a href="/dashboard/materi" class="menu-link">
          <i class="fa-duotone fa-newspaper me-3"></i>
          <div data-i18n="Materi">Materi</div>
        </a>
      </li>
      @elseif (auth()->user()->role == 2)
      <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard" class="menu-link">
          <i class="fa-duotone fa-grid-2 me-3"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('dashboard/matakuliah') ? 'active' : '' }}">
        <a href="{{ route("matakuliah.index") }}" class="menu-link">
          <i class="fa-duotone fa-laptop-file me-3"></i>
          <div data-i18n="Mata-Kuliah">Mata Kuliah</div>
        </a>
      </li>
     @elseif (auth()->user()->role == 3)
      <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard" class="menu-link">
          <i class="fa-duotone fa-grid-2 me-3"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('dashboard/prodi') ? 'active' : '' }}">
        <a href="/dashboard/prodi" class="menu-link">
          <i class="fa-duotone fa-building me-3"></i>
          <div data-i18n="Prodi">Prodi</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('dashboard/materi') ? 'active' : '' }}">
        <a href="/dashboard/materi" class="menu-link">
          <i class="fa-duotone fa-newspaper me-3"></i>
          <div data-i18n="Materi">Materi</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('dashboard/matakuliah') ? 'active' : '' }}">
        <a href="{{ route("matakuliah.index") }}" class="menu-link">
          <i class="fa-duotone fa-laptop-file me-3"></i>
          <div data-i18n="Mata-Kuliah">Mata Kuliah</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('dashboard/user') ? 'active' : '' }}">
        <a href="{{ route("user.index") }}" class="menu-link">
          <i class="fa-duotone fa-user me-3"></i>
          <div data-i18n="User">User</div>
        </a>
      </li>
      @endif


    </ul>
  </aside>
