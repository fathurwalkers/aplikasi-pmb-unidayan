<div>
    <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row g-0">

            @for ($i = 0; $i < 9; $i++)
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
