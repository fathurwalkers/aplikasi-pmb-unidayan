@extends('layouts.home-layout')

@section('title', 'Lihat Informasi')

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

@push('css')
<style>

</style>
@endpush

@section('main-content')
    <section id="counts" class="counts">

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                            <h5>
                                <b>{{ $informasi->informasi_title }}</b>
                            </h5>
                        </div>
                    </div>
                    <hr />
                    <div class="row mb-2">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            Diterbitkan pada : {{ date("d/M/Y", strtotime($informasi->informasi_waktu)) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            {!! $informasi->informasi_body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('js')
<script>

</script>
@endpush
