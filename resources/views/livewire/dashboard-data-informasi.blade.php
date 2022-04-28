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

        .cke {
            visibility: visible !important;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 8px 10px!important;
            border-color: #d8d8d8!important;
            border-top-color: #d8d8d8!important;
            border-right-color: #d8d8d8!important;
            border-bottom-color: #d8d8d8!important;
            border-left-color: #d8d8d8!important;
            table-layout:fixed!important;
            white-space: nowrap!important;
        }

        .button-text-fix {
            font-size: 11px!important;
        }

        table.dataTable {
            color: rgb(0, 0, 0)!important;
        }
    </style>
    @endsection
    <section class="section">

        <div class="section-header">
            <div class="container">
                <div class="row my-1">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h4 class="text-dark mb-0">{{ $contentheader }}</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                        <button class="btn btn-md btn-info d-flex justify-content-end" data-toggle="modal" data-target="#modaltambahinformasi">Tambah Informasi</button>
                    </div>
                </div>
                {{-- MODAL TAMBAH INFORMASI --}}
                <div class="modal fade" id="modaltambahinformasi" tabindex="1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title" style="color:black;">Tambah Informasi</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form wire:submit.prevent="tambah_informasi">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label style="color:black;">Judul Informasi : </label>
                                                <input type="text" class="form-control" wire:model="informasi_title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label style="color:black;">Konten : </label>
                                                <input type="text" class="form-control" wire:model="informasi_body">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-outline-danger" >
                                    Tambah
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End MODAL TAMBAH INFORMASI --}}
            </div>
        </div>
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

                        <table id="example1" class="table table-bordered border-1" style="width:100%">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Kode Informasi</th>
                                    <th>Title</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($informasi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->informasi_kode }}</td>
                                        <td>{{ Str::limit($item->informasi_title, 20) }}</td>
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
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <p class="fix-text">
                                                                    <b> Kode : </b> {{ $item->informasi_kode }} <br>
                                                                    <br>
                                                                    <b> Title : </b> <br>
                                                                    {{ $item->informasi_title }} <br>
                                                                    <br />
                                                                    <b> Body : </b> <br>
                                                                    <p class="text-justify">
                                                                        {!! $item->informasi_body !!}
                                                                    </p>
                                                                    <br />
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
