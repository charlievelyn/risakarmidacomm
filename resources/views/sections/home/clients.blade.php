<section id="clients-section" class="section reveal-section">
    <div class="container">
        <div class="skew-c">
            @include('layouts.components.skewc', [
                'sectionheader' => 'Our Clients',
                'sectionparagraph' => ''
                ])
                
            <div class="carousel">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            // Divide the clients into two slides
                            $slides = collect($clients)->pluck('image_path')->chunk(8);
                        @endphp
                    
                        @foreach ($slides as $index => $slide)
                            <div class="carousel-item{{ $index === 0 ? ' active' : '' }}">
                                <div class="grid logo-grid">
                                    @foreach ($slide as $image)
                                        <div class="cell logo-container">
                                            <img src="{{ asset($image) }}" alt="Client Logo">
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

@push('styles')
<style>
    section#clients-section {
        padding: 40px 0;
    }
    .logo-grid {
        display: grid;
        justify-content: space-between;
        width: 100%;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(2, 1fr);
        grid-gap: 2vw;
        padding-bottom: 30px;
    }
    .logo-container {
        background-color: rgba(245, 245, 220, 0.3); /* Set your desired background color */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        border-radius: 20px; /* Adjust this value to make the corners more or less rounded */ 
        padding: 10px; /* Add some padding if needed */
    }
    .logo-container img {
        width: 100%;
        padding: 50px;
        object-fit: scale-down;
    }
    .carousel-control-prev, .carousel-control-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1;
    }
    .carousel-control-prev {
        left: -120px; /* Adjust this value to move the button more to the left */
    }
    .carousel-control-next {
        right: -120px; /* Adjust this value to move the button more to the right */
    }
</style>
@endpush
