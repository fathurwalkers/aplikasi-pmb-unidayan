<div>
    @push('css')
    <style>
        /* .doctors .member {
            position: relative;
            box-shadow: 0px 2px 15px rgb(44 73 100 / 8%);
            padding: 15px!important;
            border-radius: 10px;
        } */
        .doctors .member .pic {
            overflow: hidden;
            width: 200px!important;
            border-radius: 80%!important;
            height: 200px!important;
        }

        .img-fix {
            width: 100%!important;
            height: 100%!important;
        }
    </style>
    @endpush
    <div class="container">

        <div class="section-title">
          <h2>Ketua Program Studi</h2>
          <p>
              Daftar masing-masing ketua Program Studi pada Universitas Dayanu Ikhsanuddin
          </p>
        </div>

        <div class="row">

            @foreach ($prodi as $item)
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="member d-flex align-items-start">
                    <div class="pic"><img src="{{ asset('default-img') }}/{{ $item->prodi_foto_pimpinan }}" class="img-fluid img-fix" alt="" width="440px" height="440px"></div>
                    <div class="member-info">
                        <h4>{{ $item->prodi_nama_pimpinan }}</h4>
                        <span>Ketua Program Studi {{ $item->prodi_nama }}</span>
                        {{-- <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p> --}}
                        {{-- <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endforeach

        </div>

      </div>
</div>
