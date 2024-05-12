@extends('layouts.profile-layout')

@section('content')
<main class="db-article">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>Article</h1>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-dark" id="btn-back">
                            Back
                        </button>
                        <button class="btn btn-warning" id="add-article">
                            Add
                        </button>
                    </div>
                </div>
                <div class="articles">
                    @foreach($articles as $article)
                        <div class="article border m-2 p-4">
                            <h2>{{ $article->title }}</h2>
                            <p>{!! mb_strimwidth($article->description, 0, 300, '...') !!}</p>
                            <p>Author: {{ $article->author }}</p>
                            @if($article->image)
                                <img src="{{ $article->image }}" alt="Article Image">
                            @endif
                            <div class="article-buttons">
                                <button class="btn btn-primary edit-article" data-article-id="{{ $article->id }}">Edit</button>
                                <form action="{{ route('db-article.destroy', ['article' => $article->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="editArticle" style="display: none;">
                    <button type="button" class="btn btn-dark btn-close-overlay">Close</button>
                    <form id="editArticle" action="{{ route('db-article.update', ['articleId' => $article->id]) }}" method="POST" data-article-id="{{ $article->id }}">
                        @csrf
                        @method('PUT')
                        <input type="text" id="edit-title" name="title">
                        <textarea id="editEditor" name="description"></textarea>
                        <button type="button" id="saveEditBtn" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>

                <div class="newArticle" style="display: none;">
                    <button type="button" class="btn btn-dark btn-close-overlay">Close</button>
                    <form id="newArticle" action="{{ route('db-article.store') }}" style="margin-top: 20px;">
                        @csrf
                        @method('POST')
                        <label for="title">Title</label><br>
                        <input type="text" id="title" name="title"><br>
                    
                        <label for="body">Description</label><br>
                        <textarea id="newEditor" name="description"></textarea><br>
                    
                        <button type="button" id="saveBtn">Save Article</button>
                    </form>
                </div>
                <div class="overlay" style="display: none;"></div>
            </div>
        </div>
    </div>
</main>


{{-- <button id="saveButton">Save Content</button> --}}

@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        // Intercept form submission
        // $('form').submit(function(event) {
        //     // Prevent the default form submission
        //     event.preventDefault();

        //     // Perform an AJAX request to submit the form data
        //     $.ajax({
        //         type: $(this).attr('method'),
        //         url: $(this).attr('action'),
        //         data: $(this).serialize(),
        //         success: function(response) {
        //             // Show the success message
        //             $('#successMessage').fadeIn(1000, function() {
        //                 // Fade out the message after 2 seconds
        //                 $(this).delay(2000).fadeOut(1000);
        //                 window.location.reload();
        //             });
        //         },
        //         error: function(error) {
        //             console.error('Error updating article:', error);
        //         }
        //     });
        // });

        var newEditor;
        $('#add-article').click(function(){
            // if(newEditor)
            // {
            //     $('.newArticle').hide();
            //     newEditor.destroy();
            // }

            $('.overlay').show();
            $('.newArticle').show();
            // Initialize CKEditor
            ClassicEditor
                .create( document.querySelector( '#newEditor' ), {
                    ckfinder:
                    {
                        uploadUrl:"{{route('db-article.upload', ['_token' => csrf_token()])}}",
                    },
                    width: '885px'
                } )
                .then( editor => {
                    console.log('Editor was initialized', editor);
                    newEditor = editor;
                } )
                .catch( err => {
                    console.error( err.stack );
                } );
            
            $('#saveBtn').on('click', function(){
                const editorData = newEditor.getData();
                $('#newEditor').val(editorData);

                $.ajax({
                    url: $('#newArticle').attr('action'),
                    type: 'POST',
                    data: $('#newArticle').serialize(),
                    success: function(response){
                        console.log(response);
                        window.location.reload();
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });
        });

        $('#btn-back').click(function(){
            window.location.href = '{{ route("db-dashboard") }}';
        });

        var editEditor;
        // Add event listener to all edit buttons
        $('.edit-article').click(function() {
            // Get the article ID
            var articleId = $(this).data('article-id');
            // if(editEditor)
            // {
            //     $('.editArticle').hide();
            //     editEditor.destroy();
            // }

            // Fetch the article data from server
            $.ajax({
                url: '/db-article/' + articleId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the form fields with article data
                    $('#edit-title').val(data.title);

                    // Set the action of the form to the appropriate route for updating the article
                    $('#editArticle').attr('action', '/db-article/' + articleId);

                    // CKEditor
                    // Initialize CKEditor
                    ClassicEditor
                        .create( document.querySelector( '#editEditor' ), {
                            ckfinder:
                            {
                                uploadUrl:"{{route('db-article.upload', ['_token' => csrf_token()])}}",
                            }
                        } )
                        .then( editor => {
                            console.log('Editor was initialized', editor);
                            editor.setData(data.description);
                            editEditor = editor;
                        } )
                        .catch( err => {
                            console.error( err.stack );
                        } );
                    // Show the edit article div
                    $('.overlay').show();
                    $('.editArticle').show();
                },
                error: function(error) {
                    console.error('Error fetching article:', error);
                }
            });
        });

        $('.btn-close-overlay').click(function(){
            if(editEditor)
            {
                $('.editArticle').hide();
                editEditor.destroy();
            }
            if(newEditor)
            {
                $('.newArticle').hide();
                newEditor.destroy();
            }
            $('.overlay').hide();
        });

        // Add event listener to the "Save Changes" button
        $('#saveEditBtn').click(function() {
            // Get the article ID from the form action attribute
            var articleId = $('#editArticle').attr('action').split('/').pop();

            // Set updated data
            const editorData = editEditor.getData();
            $('#editEditor').val(editorData);

            // Get the updated data from the form
            var updatedData = {
                title: $('#edit-title').val(),
                description: $('#editEditor').val(),
                // Add any other fields you want to edit
            };

            // Get the CSRF token
            var csrfToken = "{{ csrf_token() }}";

            // Send an AJAX request to update the article
            $.ajax({
                url: $('#editArticle').attr('action'),
                type: 'PUT',
                data: updatedData,
                beforeSend: function(xhr) {
                    console.log('CSRF Token:', csrfToken); // Log CSRF token for debugging
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                },
                success: function(response) {
                    console.log('Article updated successfully:', response);
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error updating article:', error);
                    console.log('Response:', xhr.responseText); // Log response for debugging
                }
            });
        });

    });
</script>
@endsection