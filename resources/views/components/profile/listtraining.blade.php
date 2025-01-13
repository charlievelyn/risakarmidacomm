@extends('components.profile.dashboard')

@push('styles')

@endpush

@section('content')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('trainingevents.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="images">Choose Multiple Images</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>
        <div class="form-group">
            <label for="title">Enter Title for All Images</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>

<div id="articles">
    @foreach($trainingEvents as $training)
        <div class="article" data-id="{{ $training->id }}">
            <h2>{{ $training->title }}</h2>
        </div>
    @endforeach
</div>

<div id="images">
    <!-- Images will be loaded here -->
</div>
@endsection


@push('scripts')

<script>
    $(document).ready(function() {
        $('.article').on('click', function() {
            var articleId = $(this).data('id');
            $.ajax({
                url: '/article/' + articleId + '/image-paths',
                method: 'GET',
                success: function(data) {
                    var imagePaths = data;
                    console.log(imagePaths); // This will log the array of image paths
                    
                    // Optional: Display images
                    $('#images').empty();
                    imagePaths.forEach(function(path) {
                        $('#images').append('<img src="' + path + '" alt="Image">');
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error: ' + error);
                }
            });
        });
    });
</script>
@endpush
