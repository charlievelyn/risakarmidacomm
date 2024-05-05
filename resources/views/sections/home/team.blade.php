<section id="team" class="section reveal-section">
    <div class="container">
        <div class="skew-cc">
            @include('layouts.components.skewc', [
                'sectionheader' => 'Our Team',
                'sectionparagraph' => ''
                ])
                
            <div class="row content">
                <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach (collect($teamMembers)->chunk(3) as $key => $chunk)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($chunk as $member)
                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/asset/teams/' . $member['image']) }}" class="d-block w-100" alt="{{ $member['name'] }}" />
                                            <div class="align-items-center p-3">
                                                <h5 class="mb-0">{{ $member['name'] }}</h5>
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
</section>
