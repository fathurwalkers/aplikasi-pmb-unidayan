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
                <div class="card-body">

                    <div class="container">
                        <table id="example1" class="table table-bordered border-1" style="width:100%">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Status</th>
                                    {{-- <th>Akun</th> --}}
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($akun_mahasiswa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->login_nama }}</td>
                                        <td>{{ $item->login_username }}</td>
                                        <td>{{ $item->login_email }}</td>
                                        <td>{{ $item->login_telepon }}</td>
                                        <td>{{ $item->login_status }}</td>

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
                                                    <h4 class="modal-title fix-text">Data Mahasiswa {{ $item->data->data_nama_lengkap }}</h4>
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
                                                                    : {{ $item->login_nama }}<br>
                                                                    : {{ $item->login_username }}<br>
                                                                    : {{ $item->login_email }}<br>
                                                                    : {{ $item->login_telepon }}<br>
                                                                    : {{ $item->login_status }}<br>
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
