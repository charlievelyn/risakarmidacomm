@extends('layouts.layout')

@section('content')
    @include('sections.header')

    <style>
        .clients-section {
            background-color: #f9f9f9;
            padding: 60px 0;
        }

        .clients-section .section-header {
            font-size: 2.5rem;
            font-weight: 600;
            color: #333;
        }

        .clients-section .logo-container {
            background: #b17373; /* Subtle gray background for visibility */
            border: 1px solid #ddd; /* Thin border for contrast */
            border-radius: 8px;
            padding: 20px;
            height: 180px; /* Adjust the height of the logo container */
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .clients-section .logo-container img {
            max-height: 140px; /* Ensure the logo fits within the container */
            max-width: 100%;
            object-fit: contain; /* Keep the aspect ratio intact */
        }

        .clients-section .logo-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .clients-section .carousel-control-prev-icon,
        .clients-section .carousel-control-next-icon {
            background-color: #333;
            border-radius: 50%;
            padding: 10px;
        }

        .clients-section .carousel-indicators [data-bs-target] {
            background-color: #333;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .clients-section .carousel-indicators .active {
            background-color: #007bff;
        }
    </style>

    <section id="clients-section" class="clients-section">
        <div class="container">
            <div class="text-center mb-5">
                @include('layouts.components.skewc', [
                    'sectionheader' => 'Our Clients',
                    'sectionparagraph' => 'We are proud to work with these amazing brands.'
                ])
            </div>

            <div id="clientsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @php
                        // Divide the clients into slides with a max of 4 per slide
                        $slides = collect($clients)->pluck('image_path')->chunk(4);
                    @endphp

                    @foreach ($slides as $index => $slide)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="row justify-content-center g-4">
                                @foreach ($slide as $image)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center">
                                        <div class="logo-container">
                                            <img src="{{ asset($image) }}" class="img-fluid" alt="Client Logo">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#clientsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#clientsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

                <div class="carousel-indicators">
                    @foreach ($slides as $index => $slide)
                        <button type="button" data-bs-target="#clientsCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('sections.footer')
@endsection
