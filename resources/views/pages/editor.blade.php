@extends('layouts.layout')

@section('content')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('save') }}" method="post">
            @csrf
            <div id="editor"></div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
@endsection


// dropzone and cropper

<form action="/upload" class="dropzone" id="my-dropzone">
    @csrf
</form>

<script>
    Dropzone.options.myDropzone = {
        url: '/post',
    transformFile: function(file, done) {

        var myDropZone = this;

        // Create the image editor overlay
        var editor = document.createElement('div');
        editor.style.position = 'fixed';
        editor.style.left = 0;
        editor.style.right = 0;
        editor.style.top = 0;
        editor.style.bottom = 0;
        editor.style.zIndex = 9999;
        editor.style.backgroundColor = '#000';

        // Create the confirm button
        var confirm = document.createElement('button');
        confirm.style.position = 'absolute';
        confirm.style.left = '10px';
        confirm.style.top = '10px';
        confirm.style.zIndex = 9999;
        confirm.textContent = 'Confirm';
        confirm.addEventListener('click', function() {

            // Get the canvas with image data from Cropper.js
            var canvas = cropper.getCroppedCanvas({
                width: 256,
                height: 256
            });

            // Turn the canvas into a Blob (file object without a name)
            canvas.toBlob(function(blob) {

                // Update the image thumbnail with the new image data
                myDropZone.createThumbnail(
                    blob,
                    myDropZone.options.thumbnailWidth,
                    myDropZone.options.thumbnailHeight,
                    myDropZone.options.thumbnailMethod,
                    false, 
                    function(dataURL) {

                        // Update the Dropzone file thumbnail
                        myDropZone.emit('thumbnail', file, dataURL);

                        // Return modified file to dropzone
                        done(blob);
                    }
                );

            });

            // Remove the editor from view
            editor.parentNode.removeChild(editor);

        });
        editor.appendChild(confirm);

        // Load the image
        var image = new Image();
        image.src = URL.createObjectURL(file);
        editor.appendChild(image);

        // Append the editor to the page
        document.body.appendChild(editor);

        // Create Cropper.js and pass image
        var cropper = new Cropper(image, {
            aspectRatio: 1
        });

    };
        init: function() {
            this.on("success", function(file, response) {
                var imageUrl = response.imageUrl; // Assuming your server returns the URL of the uploaded image
                var image = document.getElementById('uploaded-image');

                var cropper = new Cropper(image, {
                    aspectRatio: 1, // Adjust the aspect ratio as needed
                    viewMode: 2,
                    autoCropArea: 1,
                    responsive: true
                    // Add more Cropper.js options as needed
                });
            });
        }
    };
</script>
{{-- 
<!-- Include Dropzone.js -->
<script src="{{ asset('path/to/node_modules/dropzone/dist/min/dropzone.min.js') }}"></script>

<!-- Include Cropper.js -->
<script src="{{ asset('path/to/node_modules/cropperjs/dist/cropper.min.js') }}"></script> --}}


@endsection