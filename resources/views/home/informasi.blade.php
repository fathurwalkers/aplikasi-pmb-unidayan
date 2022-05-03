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
                        <div class="card-header bg-transparent border-success">Header</div>
                            <div class="card-body text-success">
                                <h5 class="card-title">Success card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        <div class="card-footer bg-transparent border-success">Footer</div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    {{ $informasi->links() }}
                </div>
            </div>
        </div>

    </section>
@endsection

@push('js')
<script>

</script>
@endpush
