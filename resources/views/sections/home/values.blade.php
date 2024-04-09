<section>

</section>
<div class="container values-section">
  <div class="skew-cc">
      @include('layouts.components.skewcc', [
          'sectionheader' => 'Our Values',
          'sectionparagraph' => ''
          ])
  
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      @foreach($values as $value)
      <div class="col">
        <div class="card mb-4 rounded-4 shadow-md custom-card">
          <div class="card-header py-3">
            <img src="{{ asset('storage/values/' . $value['image']) }}" class="card-image card-img-top" alt="Image 2">
          </div>
          <div class="card-body">
            <h3 class="card-title">{{ $value['title'] }}</h3>
            <p class="card-text">{{ $value['description'] }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    
  </div>
</div>