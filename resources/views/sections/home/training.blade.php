<section id="training" class="section reveal-section">
    <div class="container training-section text-center">
        <div class="skew-c">
            @include('layouts.components.skewc', [
                'sectionheader' => 'Our Trainings',
                'sectionparagraph' => ''
                ])
                
            <div class="row">
                @foreach ($trainings as $training)
                    @if ($training['type'] === 'main')
                    <div class="col-lg-4 training-card">
                        <div class="bd-placeholder-img rounded-circle d-flex justify-content-center align-items-center training-icon">
                            <i class="fas {{ $training['icon'] }} fa-5x"></i>
                        </div>
                        <h2>{{$training['title']}}</h2>
                        <p>{{$training['description']}}</p>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="row collapse" id="collapseTraining">
                @foreach ($trainings as $training)
                    @if ($training['type'] === 'secondary')
                    <div class="col-lg-4 training-card">
                        <div class="bd-placeholder-img rounded-circle d-flex justify-content-center align-items-center training-icon">
                            <i class="fas {{ $training['icon'] }} fa-5x"></i>
                        </div>
                        <h2>{{$training['title']}}</h2>
                        <p>{{$training['description']}}</p>
                    </div>
                    @endif
                @endforeach
            </div>
            <button class="btn btn-secondary show-more-btn" data-bs-toggle="collapse" href="#collapseTraining" aria-expanded="false" aria-controls="collapseTraining">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
</section>
