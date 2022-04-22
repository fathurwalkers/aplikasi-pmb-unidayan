<div>
    <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Berikut Gambaran sekitaran Kampus Universitas Dayanu Ikhsanuddin</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row g-0">

            @for ($i = 1; $i < 9; $i++)
                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                    <a href="{{ asset('default-img') }}/foto-kampus{{$i}}.jpg" class="galelry-lightbox">
                        <img src="{{ asset('default-img') }}/foto-kampus{{$i}}.jpg" alt="" class="img-fluid fixedimg">
                    </a>
                    </div>
                </div>
            @endfor

        </div>

      </div>
</div>
