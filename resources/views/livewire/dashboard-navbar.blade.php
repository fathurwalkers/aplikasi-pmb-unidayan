<div>

    @push('css')
        <style>
            .isDisabled {
                cursor: not-allowed;
                opacity: 0.5;
            }
            .isDisabled > a {
                color: currentColor;
                display: inline-block;  /* For IE11/ MS Edge bug */
                pointer-events: none;
                text-decoration: none;
            }
        </style>
    @endpush

    <ul class="sidebar-menu">
        <li class="menu-header">Menus</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('dashboard') }}">Beranda</a></li>
                <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modallihatprofile{{ $usersss->id }}">Profil Pengguna</a></li>
            </ul>
        </li>

        @if($usersss->login_level == 'admin')
        <li class="menu-header">Pengelolaan</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Pendaftaran</span></a>
            <ul class="dropdown-menu">
                @if($usersss->login_status == "verified")
                    <li><a class="nav-link" href="{{ route('data-mahasiswa') }}">Data Mahasiswa</a></li>
                    <li><a class="nav-link" href="{{ route('data-akun-mahasiswa') }}">Data Akun Mahasiswa</a></li>
                    {{-- <li><a class="nav-link" href="#">Laporan</a></li> --}}
                @endif
                @if($usersss->login_status == "unverified")
                    <li><a class="nav-link disabled" href="#">Data Mahasiswa</a></li>
                    <li><a class="nav-link disabled" href="#">Data Akun Mahasiswa</a></li>
                    {{-- <li><a class="nav-link disabled" href="#">Laporan</a></li> --}}
                @endif
            </ul>
        </li>
        @endif

        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Informasi</span></a>
            <ul class="dropdown-menu">
                @if($usersss->login_status == "verified")
                    <li><a class="nav-link" href="#">Daftar Informasi</a></li>
                    {{-- <li><a class="nav-link" href="#">Laporan</a></li> --}}
                @endif
                @if($usersss->login_status == "unverified")
                    <li><a class="nav-link disabled" href="#">Daftar Informasi</a></li>
                    {{-- <li><a class="nav-link disabled" href="#">Laporan</a></li> --}}
                @endif
            </ul>
        </li>
        {{-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Pengaturan</span></a></li> --}}
    </ul>

    {{-- MODAL LIHAT  --}}
    <div class="modal fade" id="modallihatprofile{{ $usersss->id }}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title fix-text">Profile Pengguna : {{ $usersss->login_nama }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <p class="fix-text">
                                    <b> Informasi Akun </b> <br>
                                    Nama Lengkap <br>
                                    Username <br>
                                    Email <br>
                                    Telepon <br>
                                    Status <br>
                                </p>
                            </div>
                            <div class="col-sm-8 col-md-8 col-lg-8">
                                <p class="fix-text">
                                    <br />
                                    : {{ $usersss->login_nama }}<br>
                                    : {{ $usersss->login_username }}<br>
                                    : {{ $usersss->login_email }}<br>
                                    : {{ $usersss->login_telepon }}<br>
                                    : {{ $usersss->login_status }}<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <form action="" method="POST" enctype="multipart/form-data"> --}}
                    {{-- @csrf --}}
                    <div class="modal-footer">
                        <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Tutup</button>
                        {{-- <button wire:click="hapusData({{ $usersss->id }})" class="btn btn-outline-danger" >
                            Delete
                        </button> --}}
                    </div>
                {{-- </form> --}}

            </div>
        </div>
    </div>
    {{-- END MODAL LIHAT  --}}

</div>
