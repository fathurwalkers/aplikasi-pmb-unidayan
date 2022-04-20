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
                            </div>
                            <h1>Index Page</h1>
                        </div>
                    </div>
                </div>
                @break
        @endswitch

    </section>

</div>
