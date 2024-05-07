@extends('layouts.profile-layout')

@section('content')
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

<h1>This is Dashboard</h1>
<div class="container">
    <h1>Dashboard</h1>
    <div class="articles">
        @foreach($articles as $article)
            <div class="article">
                <h2>{{ $article->title }}</h2>
                <p>{!! $article->description !!}</p>
                <p>Author: {{ $article->author }}</p>
                @if($article->image)
                    <img src="{{ $article->image }}" alt="Article Image">
                @endif
            </div>
        @endforeach
    </div>
</div>

<form id="articleForm" method="POST" action="{{ route('dashboard.store') }}" style="margin-top: 20px;">
    @csrf
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>

    <label for="body">Description:</label><br>
    <textarea id="editor" name="description" style="height: 300px;"></textarea><br>

    <label for="author">Author:</label><br>
    <input type="text" id="author" name="author"><br>

    <label for="image">Image:</label><br>
    <input type="text" id="image" name="image"><br>

    <button type="submit">Save Article</button>
</form>

{{-- <button id="saveButton">Save Content</button> --}}

@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        ClassicEditor
            .create( document.querySelector( '#editor' ), 
            {
                ckfinder:
                {
                    uploadUrl:"{{route('dashboard.upload', ['_token' => csrf_token()])}}",
                }
            } )
            .catch( error => {
                console.error( error );
            } );
            
        // var quill = new Quill('#editor', {
        //     theme: 'snow',
        //     modules: {
        //         toolbar: [
        //             [{ 'header': [1, 2, 3, false] }],
        //             ['bold', 'italic', 'underline', 'strike'], // toggled buttons
        //             ['link', 'image', 'video'], // link and image, video
        //             [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        //             [{ 'align': [] }],
        //             ['clean'] // remove formatting button
        //         ]
        //     },
        //     placeholder: 'Compose an epic...',
        //     readOnly: false // Set to true if you want the editor to be read-only
        // });
    });

    // document.getElementById('saveButton').addEventListener('click', function() {
    //     var content = quill.root.innerHTML;

    //     // Assuming you have the content ID available in a JavaScript variable
    //     var contentId = window.contentId; // Assuming contentId is available globally

    //     fetch("/dashboard/store", {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //         },
    //         body: JSON.stringify({
    //             id: contentId,
    //             content: content
    //         })
    //     })
    //     .then(response => response.text()) // Convert response to text
    //     .then(text => console.log(text))  // Log the response body
    //     .catch(error => {
    //         console.error(error);
    //     });

    // });
</script>
@endsection