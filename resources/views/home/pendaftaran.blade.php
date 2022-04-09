@extends('layouts.home-layout')

@section('title', 'Halaman Pendaftaran')

@section('header-content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
        <h1>Website Pendaftaraan Mahasiswa Baru</h1>
        <h2>Universitas Dayanu Ikhsanuddin</h2>
        {{-- <a href="#about" class="btn-get-started scrollto">Mulai Pendaftaran</a> --}}
        </div>
    </section>
    <!-- End Hero -->
@endsection

@section('main-content')
    <section id="counts" class="counts">

        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <div class="container">

                            <div class="row mb-2">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="data_jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" id="data_jenis_kelamin" name="data_jenis_kelamin">
                                            <option selected value="DEFAULT">Pilih jenis kelamin</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="data_nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="data_nama_lengkap" aria-describedby="emailHelp" placeholder="" name="data_nama_lengkap">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                      </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="data_email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                      </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="data_jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" id="data_jenis_kelamin" name="data_jenis_kelamin">
                                            <option selected value="DEFAULT">Pilih jenis kelamin</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="data_jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" id="data_jenis_kelamin" name="data_jenis_kelamin">
                                            <option selected value="DEFAULT">Pilih jenis kelamin</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
