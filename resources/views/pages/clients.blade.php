@extends ('layouts.layout')

@section ('content')
@include ('sections.header')
<section id="clients-section" class="clients-section">
    <div class="container">
        <div class="skew-c">
            @include('layouts.components.skewc', [
                'sectionheader' => 'Our Clients',
                'sectionparagraph' => ''
                ])
                
            {{-- <div class="logo-grid">
                @foreach ($clients as $client)
                <div class="logo-container">
                    <img src="{{ asset('images/' . $client['image']) }}" alt="{{ $client['name'] }}">
                </div>
                @endforeach
            </div> --}}

            <div class="carousel">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                        // Divide the clients into two slides
                        $slides = collect($clients)->pluck('image')->chunk(8);
                        @endphp
            
                        @foreach ($slides as $index => $slide)
                            <div class="carousel-item{{ $index === 0 ? ' active' : '' }}">
                                <div class="grid logo-grid">
                                    @foreach ($slide as $image)
                                        <div class="cell logo-container">
                                            <img src="{{ asset('images/' . $image) }}" alt="{{ $image }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</section>

@include ('sections.footer')
@endsection