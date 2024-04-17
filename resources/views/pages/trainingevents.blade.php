@extends('layouts.layout')

@section('content')
    @include('sections.header')

    <main id="training-events">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h2>Recent Training</h2>
                    <div id="event-cards">
                        @foreach ($events as $key => $event)
                            <div class="card mb-3">
                                <img src="{{ asset('images/' . $event['image']) }}" class="card-img-top" alt="{{ $event['name'] }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event['name'] }}</h5>
                                    <p class="card-text">{{ $event['brief'] }}</p>
                                    <a href="#" class="btn btn-primary learn-more" data-index="{{ $key }}">Learn More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-9">
                    <div id="additional-content-slider">
                        @foreach ($events as $event)
                            <div class="additional-content">
                                <h2>{{ $event['name'] }}</h2>
                                <p>Written by {{ $event['name'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('sections.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.learn-more').click(function() {
                var index = $(this).data('index');
                $('#additional-content-slider').slick('slickGoTo', index);
            });

            $('#additional-content-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '#event-cards'
            });
        });
    </script>
@endsection