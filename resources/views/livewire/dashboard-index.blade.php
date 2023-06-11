<div>

    @section('css')
        <style>
            .btn.btn-sm {
                padding: 0.1rem 0.4rem;
                font-size: 12px !important;
            }
        </style>
    @endsection

    <section class="section">
        <div class="section-header">
            <h1>{{ $contentheader }}</h1>
        </div>

        @switch($users->login_status)
            @case('unverified')
                <div class="section-body">
                    <div class="card">
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
                                <div class="row">
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-lg-8">
                                        Akun anda belum diverifikasi, silahkan lakukan pengecekan ke email anda untuk melakukan
                                        proses verifikasi Akun agar dapat mengakses halaman ini.
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @break

            @case('verified')
                <div class="section-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">

                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <h5 style="color:black;">Log Aktifitas Aplikasi</h5>
                                        <hr />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        @if (session('status'))
                                            <div class="alert alert-success">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <table id="example1" class="table table-bordered border-1" style="width:100%">
                                            <thead class="thead-dark">
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Keterangan</th>
                                                    <th>Tipe</th>
                                                    <th>Waktu</th>
                                                    <th>Kelola</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($histori as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->histori_title }}</td>
                                                        <td>{{ $item->histori_tipe }}</td>
                                                        <td>{{ date('d-m-Y H:i:s', strtotime($item->histori_tanggal_waktu)) }}
                                                        </td>

                                                        <td>
                                                            <div
                                                                class="row btn-block btn-group d-flex mx-auto justify-content-center">
                                                                <div
                                                                    class="col-sm-12 col-md-12 col-lg-12 d-flex mx-auto justify-content-center">

                                                                    <a class="btn btn-sm btn-info mr-1 rounded" href="#"
                                                                        data-toggle="modal"
                                                                        data-target="#modallihat{{ $item->id }}">
                                                                        <i class="fas fa-info-circle"></i>
                                                                        Lihat
                                                                    </a>

                                                                    {{-- <a class="btn btn-sm btn-primary mr-1 rounded" href="#">
                                                                        <i class="fas fa-cog"></i>
                                                                        Ubah
                                                                    </a> --}}

                                                                    @if ($users->login_level == 'admin')
                                                                        <a href="#" class="btn btn-danger rounded btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#modaldelete{{ $item->id }}">
                                                                            <i class="fas fa-trash"></i>
                                                                            Hapus
                                                                        </a>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>

                                                    {{-- MODAL DELETE --}}
                                                    <div class="modal fade" id="modaldelete{{ $item->id }}" tabindex="1"
                                                        role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Konfirmasi Tindakan</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">Apakah anda yakin ingin menghapus Log
                                                                    Aktifitas ini? </div>
                                                                {{-- <form action="" method="POST" enctype="multipart/form-data"> --}}
                                                                {{-- @csrf --}}
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn gray btn-outline-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button
                                                                        wire:click="$emitSelf('hapusLogAktifitas', {{ $item->id }})"
                                                                        class="btn btn-outline-danger">
                                                                        Delete
                                                                    </button>
                                                                </div>
                                                                {{-- </form> --}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- End MODAL DELETE --}}
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr />

                            </div>
                        </div>
                    </div>
                </div>
            @break

        @endswitch

    </section>

    @section('js')
        <script>
            $(document).ready(function() {
                $('#example1').DataTable();
            });
        </script>
    @endsection

</div>
