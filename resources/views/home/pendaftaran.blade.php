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
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
