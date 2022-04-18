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

@push('css')
<style>

</style>
@endpush

@section('main-content')
    <section id="counts" class="counts">

        <div class="container">
            <div class="row">
                <div class="card py-2">
                    <div class="card-body">

                        <div class="container my-4">

                            <form action="{{ route('post-pendaftaran') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="data_foto">Pas Foto 3x4 (Format: .jpg, .jpeg / Maks: 2MB)
                                                <span style="color:red;">*</span>
                                            </label>
                                            <input type="file" class="form-control @error('data_foto') is-invalid @enderror" id="data_foto" aria-describedby="emailHelp" placeholder="" name="data_foto">
                                            @error('data_foto')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="data_kampus_pilihan">Kampus Pilihan
                                                <span style="color:red;">*</span>
                                            </label>
                                            <select class="form-control @error('data_kampus_pilihan') is-invalid @enderror" id="data_kampus_pilihan" name="data_kampus_pilihan">
                                                <option selected value="">Pilih Kampus Pilihan</option>
                                                <option value="KAMPUS PASARWAJO">Kampus Pasarwajo</option>
                                                <option value="KAMPUS PALAGIMATA">Kampus Palagimata</option>
                                            </select>
                                            @error('data_kampus_pilihan')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">Kampus pilihan harus dipilih.</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="data_nama_lengkap">Nama Lengkap
                                                <span style="color:red;">*</span>
                                            </label>
                                            <input type="text" class="form-control @error('data_nama_lengkap') is-invalid @enderror" id="data_nama_lengkap" aria-describedby="emailHelp" placeholder="" name="data_nama_lengkap" value="{{ old('data_nama_lengkap') }}">
                                            @error('data_nama_lengkap')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email
                                                <span style="color:red;">*</span>
                                            </label>
                                            <input type="email" class="form-control @error('data_email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="data_email" value="{{ old('data_email') }}">
                                            @error('data_email')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="data_telepon">Nomor Telepon / HP
                                                <span style="color:red;">*</span>
                                            </label>
                                            <input type="number" class="form-control @error('data_telepon') is-invalid @enderror" id="data_telepon" aria-describedby="emailHelp" placeholder="" name="data_telepon" value="{{ old('data_telepon') }}">
                                            @error('data_telepon')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="data_jenis_kelamin">Jenis Kelamin
                                                <span style="color:red;">*</span>
                                            </label>
                                            <select class="form-control @error('data_jenis_kelamin') is-invalid @enderror" id="data_jenis_kelamin" name="data_jenis_kelamin">
                                                <option selected value="">Pilih jenis kelamin</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            @error('data_jenis_kelamin')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">Jenis Kelamin harus dipilih.</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="data_tempat_lahir">Tempat Lahir
                                                <span style="color:red;">*</span>
                                            </label>
                                            <input type="text" class="form-control @error('data_tempat_lahir') is-invalid @enderror" id="data_tempat_lahir" aria-describedby="emailHelp" placeholder="" name="data_tempat_lahir" value="{{ old('data_tempat_lahir') }}">
                                            @error('data_tempat_lahir')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="data_tanggal_lahir">Tanggal Lahir
                                                <span style="color:red;">*</span>
                                            </label>
                                            <input type="date" class="form-control @error('data_tanggal_lahir') is-invalid @enderror" id="data_tanggal_lahir" aria-describedby="emailHelp" placeholder="" name="data_tanggal_lahir" value="{{ old('data_tanggal_lahir') }}">
                                            @error('data_tanggal_lahir')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="data_nama_ibu_kandung">Nama Gadis Ibu Kandung
                                                <span style="color:red;">*</span>
                                            </label>
                                            <input type="text" class="form-control @error('data_nama_ibu_kandung') is-invalid @enderror" id="data_nama_ibu_kandung" aria-describedby="emailHelp" placeholder="" name="data_nama_ibu_kandung" value="{{ old('data_nama_ibu_kandung') }}">
                                            @error('data_nama_ibu_kandung')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="data_asal_sekolah">Asal Sekolah
                                                <span style="color:red;">*</span>
                                            </label>
                                            <input type="text" class="form-control @error('data_asal_sekolah') is-invalid @enderror" id="data_asal_sekolah" aria-describedby="emailHelp" placeholder="" name="data_asal_sekolah" value="{{ old('data_asal_sekolah') }}">
                                            @error('data_asal_sekolah')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="data_tahun_lulus">Tahun Lulus
                                                <span style="color:red;">*</span>
                                            </label>
                                            <input type="number" class="form-control @error('data_tahun_lulus') is-invalid @enderror" id="data_tahun_lulus" aria-describedby="emailHelp" placeholder="" name="data_tahun_lulus" value="{{ old('data_tahun_lulus') }}">
                                            @error('data_tahun_lulus')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">{{ $message }}</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="data_pilihan_jurusan1">Pilihan Program Studi Pertama (Pilihan Utama)
                                                <span style="color:red;">*</span>
                                            </label>
                                            <select class="form-control @error('data_pilihan_jurusan1') is-invalid @enderror" id="data_pilihan_jurusan1" name="data_pilihan_jurusan1">
                                                <option selected value="">-- Pilihan Program Studi Pertama --</option>
                                                @foreach ($prodi as $prodi_item)
                                                    <option value="{{ $prodi_item->id }}">{{ $prodi_item->prodi_nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('data_pilihan_jurusan1')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">Pilihan jurusan pertama harus dipilih.</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="data_pilihan_jurusan2">Pilihan Program Studi Kedua (Alternatif)
                                                <span style="color:red;">*</span>
                                            </label>
                                            <select class="form-control @error('data_pilihan_jurusan2') is-invalid @enderror" id="data_pilihan_jurusan2" name="data_pilihan_jurusan2">
                                                <option selected value="">-- Pilihan Program Studi Kedua --</option>
                                                @foreach ($prodi as $prodi_item)
                                                    <option value="{{ $prodi_item->id }}">{{ $prodi_item->prodi_nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('data_pilihan_jurusan2')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">Pilihan jurusan kedua harus dipilih.</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="data_pilihan_jurusan3">Pilihan Program Studi Ketiga (Alternatif)
                                                <span style="color:red;">*</span>
                                            </label>
                                            <select class="form-control @error('data_pilihan_jurusan3') is-invalid @enderror" id="data_pilihan_jurusan3" name="data_pilihan_jurusan3">
                                                <option selected value="">-- Pilihan Program Studi Ketiga --</option>
                                                @foreach ($prodi as $prodi_item)
                                                    <option value="{{ $prodi_item->id }}">{{ $prodi_item->prodi_nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('data_pilihan_jurusan3')
                                                <small id="emailHelp" class="form-text text-muted"><span style="color:red;">Pilihan jurusan ketiga harus dipilih.</span></small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4 mx-auto d-flex justify-content-center">
                                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto d-flex justify-content-center">
                                        <div class="form-group mx-auto d-flex justify-content-center">
                                            <input type="checkbox" name="chekboxxx" onchange="document.getElementById('calculatebutton').disabled = !this.checked;" /> &nbsp; Saya menyetujui syarat diatas
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4 mx-auto d-flex justify-content-center">
                                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto d-flex justify-content-center">
                                        <div class="form-group mx-auto d-flex justify-content-center">
                                            <button class="btn btn-md btn-primary" type="submit" id="calculatebutton" disabled>DAFTAR SEKARANG</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 mx-auto d-flex justify-content-center">
                                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto d-flex justify-content-center">
                                        <div class="form-group mx-auto d-flex justify-content-center">
                                            <small id="emailHelp" class="form-text text-muted">Silahkan klik tombol "DAFTAR SEKARANG" untuk melanjutkan proses pendaftaran.</small>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('js')
<script>
    // $( document ).ready(function() {
    //     document.getElementById("calculatebutton").disabled = true;
    //     function goFurther(elem) {
    //         if (elem.checked == true)  {
    //             document.getElementById("calculatebutton").disabled = false;
    //         } else {
    //             document.getElementById("calculatebutton").disabled = true;
    //         }
    //     }
    // });

    // document.getElementById("calculatebutton").disabled = true;
    // function goFurther(elem) {
    //     if (elem.checked == true)
    //         document.getElementById("calculatebutton").disabled = false;
    //     else
    //         document.getElementById("calculatebutton").disabled = true;
    //     }
    // }
</script>
@endpush
