<div>

    <section class="section">
        <div class="section-header">
          <h1>{{ $contentheader }}</h1>
        </div>

        @switch($users->login_status)
            @case("unverified")
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
                                        Akun anda belum diverifikasi, silahkan lakukan pengecekan ke email anda untuk melakukan proses verifikasi Akun agar dapat mengakses halaman ini.
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @break
            @case("verified")
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
                                    <div class="col-sm-12 col-md-12 col-lg-12">
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

                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <h1>Index Page</h1>
                        </div>
                    </div>
                </div>
                @break
        @endswitch

    </section>

</div>
