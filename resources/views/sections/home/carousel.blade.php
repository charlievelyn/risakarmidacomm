<section id="banner-section" class="section">
  <!-- carousel -->
  <div class="container banner-section">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        @foreach ($banners as $key => $banner)
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
        @endforeach
      </div>
      <div class="carousel-inner">

        @foreach ($banners as $key => $banner)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <div class="banner-container">
                <img src="{{ asset('storage/asset/banners/' . $banner['image']) }}" class="banner-image" alt="">
                <div class="carousel-caption">
                    <h1>{{$banner['title']}}</h1>
                    {{-- <p>{{$banner['description']}}</p> --}}
                    {{-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> --}}
                </div>
            </div>
        </div>
        @endforeach

        {{-- <div class="carousel-item">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Some representative placeholder content for the second slide of the carousel.</p>
              <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

          <div class="container">
            <div class="carousel-caption text-end">
              <h1>One more for good measure.</h1>
              <p>Some representative placeholder content for the third slide of this carousel.</p>
              <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
            </div>
          </div>
        </div> --}}
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </div>
</section>
