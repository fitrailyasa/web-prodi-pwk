<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link border-bottom">
        <img src="{{ asset('assets/img/logo-full-putih.png') }}" alt="Logo" class="brand-image d-inline-block"
            style="opacity: .8">
        {{-- <span class="brand-text text-white">PWK ITERA</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.dashboard') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-header text-white">MENU</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.user.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.berita.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.berita.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Berita
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.tag.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.tag.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Tag
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.jadwal.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.jadwal.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Jadwal Kuliah
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.matkul.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.matkul.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Mata Kuliah
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.alumni.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.alumni.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Alumni
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.kategori.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.kategori.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Kategori
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.layanan.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.layanan.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Layanan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.staff.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.staff.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Staff
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.link.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.link.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Media Sosial
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.medpart.index') }}"
                            class="nav-link text-white {{ Request::routeIs('admin.medpart.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Media Partner
                            </p>
                        </a>
                    </li>
                @elseif (auth()->user()->role == 'dosen')
                    <li class="nav-item">
                        <a href="{{ route('dosen.dashboard') }}"
                            class="nav-link text-white {{ Request::routeIs('dosen.dashboard') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-header text-white">MENU</li>
                    <li class="nav-item">
                        <a href="{{ route('dosen.jadwal.index') }}"
                            class="nav-link text-white {{ Request::routeIs('dosen.jadwal.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Jadwal Kuliah
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dosen.matkul.index') }}"
                            class="nav-link text-white {{ Request::routeIs('dosen.matkul.index') ? 'aktif' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Mata Kuliah
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-header text-white">KELUAR</li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                        @csrf
                    </form>
                    <a href="#" class="nav-link text-white @yield('')"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
