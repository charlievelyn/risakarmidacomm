@extends('layouts.layout')

@section('preload')
  @php
      $imageFolder = public_path('storage/asset/teams'); // Change 'images' to your folder name
      $imageFiles = glob($imageFolder . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
  @endphp

  @foreach ($imageFiles as $imageFile)
      <link rel="preload" href="{{ asset($imageFile) }}" as="image">
  @endforeach
@endsection

@section('content')
    @include('sections.header')

<main id="team" class="main-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="slider-nav">
          @foreach($teamMembers as $member)
            <div class="slider-image">
              <img src="{{ asset('storage/asset/teams/' . $member['image']) }}" class="d-block w-100" alt="{{ $member['name'] }}" />
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="slider-description">
          @foreach($teamMembers as $member)
          <div class="member" style="background-image: url('{{ asset('storage/asset/teams/' . $member['image']) }}'); background-color: rgba(255, 255, 255, 0.5); background-position: center top; background-size: 75%;">
            <div class="overlay">
              <div class="left-image">
                <img src="{{ asset('storage/asset/teams/' . $member['image']) }}" alt="{{ $member['name'] }}" />
              </div>
              <div class="content">
                <h1>{{ $member['name'] }}</h1>
                <h3>{{ $member['position'] }}</h3>
                {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil suscipit perspiciatis eligendi perferendis dolore nisi laborum expedita eum aspernatur odit assumenda tempora cupiditate beatae consectetur obcaecati sunt magnam natus, ducimus illum animi, iusto, asperiores nostrum ipsam vel. Officia atque quibusdam assumenda, tempore, inventore veniam ipsa optio voluptatem nostrum, doloremque eligendi.</p> --}}
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</main>

@include('sections.footer')
@endsection

@section('script')
<script>
  $(document).ready(function(){
    // Slick Slider
      $('.slider-description').slick({
        slidesToShow:1,
        slidesToScroll:1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
      });

      $('.slider-nav').slick({
          autoplay: true,
          autoplaySpeed: 2000,
          arrows: true,
          slidesToShow:5,
          centerMode: true,
          variableWidth: true,
          dots:true,
          focusOnSelect:true,
          asNavFor: '.slider-description',

          responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerMode: true,
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerMode: true,
                slidesToShow: 1,
              }
            }
          ]
      });
  });
</script>
@endsection