@extends('layouts.home-layout')

@section('title', 'Halaman Informasi')

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
            <div class="row">
                @foreach ($informasi as $item)
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="card border-success mb-3" style="max-width: 18rem;">
                        {{-- <div class="card-header bg-transparent border-success">Header</div> --}}
                            <div class="card-body text-success">
                                <h5 class="card-title">
                                    <span style="color:black;">{{ Str::limit($item->informasi_title, 34) }}</span>
                                </h5>
                                <p class="card-text">
                                    {{ Str::limit($item->informasi_body, 100) }}
                                    <br />
                                    <br />
                                    <span style="color:black;">{{ "Terbit Pada Tanggal" . date(" : d/m/Y", strtotime($item->informasi_waktu)) }}</span>
                                </p>
                            </div>
                        <div class="card-footer bg-transparent border-success">
                            <div class="row ml-auto d-flex justify-content-end">
                                <div class="col-sm-12 col-md-12 col-lg-12 ml-auto d-flex justify-content-end">
                                    <button class="btn btn-sm btn-info shadow text-light">
                                        Lihat Selengkapnya...
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row my-1 mt-4">
                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mt-3">
                    {{ $informasi->onEachSide(0)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </section>
@endsection

@push('js')
<script>

</script>
@endpush
