<div>
    <ul class="sidebar-menu">
        <li class="menu-header">Menus</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('dashboard') }}">Beranda</a></li>
                <li><a class="nav-link" href="{{ route('profile') }}">Profil Pengguna</a></li>
            </ul>
        </li>
        <li class="menu-header">Pengelolaan</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Pendaftaran</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('data-mahasiswa') }}">Data Mahasiswa</a></li>
                <li><a class="nav-link" href="layout-default.html">Data Akun Mahasiswa</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Laporan</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Informasi</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">Daftar Informasi</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Laporan</a></li>
            </ul>
        </li>
        <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Pengaturan</span></a></li>
    </ul>
</div>
