@extends('components.profile.dashboard')

@push('styles')
    <style>
        .thumbnail {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" style="position: absolute; top: 20px; right: 20px;" data-bs-toggle="modal" data-bs-target="#uploadModal">
        Upload Images
    </button>

    <!-- Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadForm" action="{{ route('trainingevents.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="images">Choose Multiple Images</label>
                            <input type="file" name="images[]" class="form-control" id="images" multiple required>
                        </div>
                        <div class="form-group">
                            <label for="title">Enter Title for All Images</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Enter Title for All Images</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Enter Description" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="uploadButton" disabled>Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    
    
    <!-- Articles Table -->
    <div id="articles">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trainingEvents as $training)
                    <tr class="article" data-id="{{ $training->id }}">
                        <td>{{ $training->title }}</td>
                        <td>{{ $training->description }}</td>
                        <td class="image-list" data-id="{{ $training->id }}"></td>
                        <td>
                            <form action="{{ route('trainingevents.delete', $training->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this training event?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Image Container -->
<div id="images" class="d-none">
    <!-- Images will be loaded here -->
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Enable/disable upload button based on input
        $('#images, #title').on('input change', function() {
            var images = $('#images').get(0).files.length;
            var title = $('#title').val().trim();
            if (images > 0 && title.length > 0) {
                $('#uploadButton').removeAttr('disabled');
            } else {
                $('#uploadButton').attr('disabled', 'disabled');
            }
        });

        // Load images for each article
        $('.article').each(function() {
            var articleId = $(this).data('id');
            var imageListElement = $('.image-list[data-id="' + articleId + '"]');
            $.ajax({
                url: '/article/' + articleId + '/image-paths',
                method: 'GET',
                success: function(data) {
                    var imagePaths = data;
                    console.log(imagePaths); // This will log the array of image paths
                    
                    // Display images in the corresponding table cell
                    imagePaths.forEach(function(path) {
                        imageListElement.append('<img src="' + path + '" class="thumbnail" alt="Image">');
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
