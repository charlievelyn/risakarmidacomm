<div class="container training-section text-center">
    <div class="skew-c">
        @include('layouts.components.skewc', [
            'sectionheader' => 'Our Trainings',
            'sectionparagraph' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, doloribus!'
            ])
            
        <div class="row">
            @foreach ($trainings as $training)
                @if ($training['type'] === 'main')
                    <div class="col-lg-4">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                        <h2>{{$training['title']}}</h2>
                        <p>{{$training['description']}}</p>
                    </div>
                    
                @endif
            @endforeach
        </div>
        <div class="row collapse" id="collapseTraining">
            @foreach ($trainings as $training)
                @if ($training['type'] === 'secondary')
                    <div class="col-lg-4">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                        <h2>{{$training['title']}}</h2>
                        <p>{{$training['description']}}</p>
                    </div>
                @endif
            @endforeach
        </div>
        <button class="btn btn-secondary show-more-btn" data-bs-toggle="collapse" href="#collapseTraining" aria-expanded="false" aria-controls="collapseTraining">Show More</button>
    </div>
</div>