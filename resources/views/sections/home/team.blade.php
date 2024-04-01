<div class="container">
    <div class="skew-c">
        @include('layouts.components.skewc', [
            'sectionheader' => 'OUR TEAM',
            'sectionparagraph' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, doloribus!'
            ])
            
        <div class="row content">
            <h2>Our Team</h2>
    <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach (collect($teamMembers)->chunk(3) as $key => $chunk)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($chunk as $member)
                            <div class="col-md-4">
                                <img src="{{ asset('images/' . $member['image']) }}" class="d-block w-100" alt="{{ $member['name'] }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="d-md-flex align-items-center">
                                        <h5 class="mb-0">{{ $member['name'] }}</h5>
                                        <p class="mb-0 ms-2">{{ $member['position'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
        </div>
    </div>
</div>