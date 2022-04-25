<div>

    @section('css')
    <style>
        .modal-backdrop.show {
            display: none !important;
        }

        table.dataTable tbody td {
            padding: 8px 2px!important;
        }

        table.dataTable {
            border-color: black!important;
        }

        .modal-title {
            font-size: 20px!important;
        }

        .fix-text {
            color: black!important;
        }
    </style>
    @endsection
    <section class="section">

        <div class="section-header">
          <h4 class="text-dark pl-2 mb-0">{{ $contentheader }}</h4>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-title">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            Log Aktifitas
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered border-1" style="width:100%">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pendaftaran</th>
                                    <th>Pembayaran</th>
                                    {{-- <th>Akun</th> --}}
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($mahasiswa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::limit($item->data_nama_lengkap, 15) }}</td>
                                        <td>{{ $item->data_email }}</td>
                                        <td class="text-center" style="width: 10% !important;">{{ $item->data_jenis_kelamin }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                    @switch($item->data_status_pendaftaran)
                                                        @case("BELUM DISETUJUI")
                                                            <button class="btn btn-sm btn-danger">
                                                                {{ $item->data_status_pendaftaran }}
                                                            </button>
                                                            @break
                                                        @case("DISETUJUI")
                                                            <button class="btn btn-sm btn-success">
                                                                {{ $item->data_status_pendaftaran }}
                                                            </button>
                                                            @break
                                                    @endswitch
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                                    @switch($item->data_status_pembayaran)
                                                        @case("DIPROSES")
                                                            <button class="btn btn-sm btn-info">
                                                                {{ $item->data_status_pembayaran }}
                                                            </button>
                                                            @break
                                                        @case("SELESAI")
                                                            <button class="btn btn-sm btn-success">
                                                                {{ $item->data_status_pembayaran }}
                                                            </button>
                                                            @break
                                                        @case("DIBATALKAN")
                                                            <button class="btn btn-sm btn-danger">
                                                                {{ $item->data_status_pembayaran }}
                                                            </button>
                                                            @break
                                                    @endswitch
                                                </div>
                                            </div>
                                        </td>

                                        {{-- <td>
                                            @foreach ($item->login as $item2)
                                                {{ $item2->login_username }}
                                            @endforeach
                                        </td> --}}

                                        <td>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex mx-auto justify-content-center">

                                                    <a class="btn btn-sm btn-info mr-1 rounded" href="#" data-toggle="modal" data-target="#modallihat{{ $item->id }}">
                                                        <i class="fas fa-info-circle"></i>
                                                        Lihat
                                                    </a>

                                                    {{-- <a class="btn btn-sm btn-primary mr-1 rounded" href="#">
                                                        <i class="fas fa-cog"></i>
                                                        Ubah
                                                    </a> --}}

                                                    <a href="#" class="btn btn-danger rounded btn-sm mr-2" data-toggle="modal" data-target="#modaldelete{{ $item->id }}">
                                                        <i class="fas fa-trash"></i>
                                                        Hapus
                                                    </a>

                                                </div>
                                            </div>
                                        </td>

                                    </tr>

                                    {{-- MODAL DELETE --}}
                                    <div class="modal fade" id="modaldelete{{ $item->id }}" tabindex="1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi Tindakan</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">Apakah anda yakin ingin menghapus item ini? </div>
                                                {{-- <form action="" method="POST" enctype="multipart/form-data"> --}}
                                                    {{-- @csrf --}}
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                                        <button wire:click="$emitSelf('hapus', {{ $item->id }})" class="btn btn-outline-danger" >
                                                            Delete
                                                        </button>
                                                        {{-- <button wire:click="hapusData({{ $item->id }})" class="btn btn-outline-danger" >
                                                            Delete
                                                        </button> --}}
                                                    </div>
                                                {{-- </form> --}}

                                            </div>
                                        </div>
                                    </div>
                                    {{-- End MODAL --}}

                                    {{-- MODAL LIHAT  --}}
                                    <div class="modal fade" id="modallihat{{ $item->id }}" tabindex="1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title fix-text">Data Mahasiswa {{ $item->data_nama_lengkap }}</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                                <p class="fix-text">
                                                                    <b> Data Diri </b> <br>
                                                                    Nama Lengkap <br>
                                                                    Jenis Kelamin <br>
                                                                    Email <br>
                                                                    No. HP / Telepon <br>
                                                                    Tempat Lahir <br>
                                                                    Tanggal Lahir <br>
                                                                    <br />
                                                                    <b> Informasi Sekolah </b><br>
                                                                    Asal Sekolah <br>
                                                                    Tahun Lulus <br>
                                                                    <br />
                                                                    <b> Informasi Akun </b> <br>
                                                                    Username <br>
                                                                    Password <br>
                                                                </p>
                                                            </div>
                                                            <div class="col-sm-8 col-md-8 col-lg-8">
                                                                <p class="fix-text">
                                                                    <br />
                                                                    Nama Lengkap <br>
                                                                    Jenis Kelamin <br>
                                                                    Email <br>
                                                                    No. HP / Telepon <br>
                                                                    Tempat Lahir <br>
                                                                    Tanggal Lahir <br>
                                                                    <br />
                                                                    <br />
                                                                    Asal Sekolah <br>
                                                                    Tahun Lulus <br>
                                                                    <br />
                                                                    <br />
                                                                    Username <br>
                                                                    Password <br>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <form action="" method="POST" enctype="multipart/form-data"> --}}
                                                    {{-- @csrf --}}
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Tutup</button>
                                                        {{-- <button wire:click="hapusData({{ $item->id }})" class="btn btn-outline-danger" >
                                                            Delete
                                                        </button> --}}
                                                    </div>
                                                {{-- </form> --}}

                                            </div>
                                        </div>
                                    </div>
                                    {{-- END MODAL LIHAT  --}}

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </section>

    @section('js')
        <script>
            $(document).ready(function() {
                $('#example1').DataTable();
            });
        </script>
    @endsection

</div>
