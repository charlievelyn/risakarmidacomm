@extends('layouts.profile-layout')

@section('content')
<main class="db-article">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>Article Management</h1>
                    </div>
                    <div class="col-lg-4 text-end">
                        <button class="btn btn-dark" id="btn-back">Back</button>
                        <button class="btn btn-warning" id="add-article">Add Article</button>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Author</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($articles as $article)
                                <tr>
                                    <td>{{ $article->title ?? 'N/A' }}</td>
                                    <td>{{ $article->description ? mb_strimwidth(strip_tags($article->description), 0, 100, '...') : 'No description available' }}</td>
                                    <td>{{ $article->author ?? 'Unknown' }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm edit-article" data-article-id="{{ $article->id }}">Edit</button>
                                        <button class="btn btn-success btn-sm view-article" data-article-id="{{ $article->id }}">View</button>
                                        <form action="{{ route('article.destroy', ['id' => $article->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No articles available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="articleModalLabel">Article Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2 id="modal-title"></h2>
                                <p id="modal-description"></p>
                                <p><strong>Author:</strong> <span id="modal-author"></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addEditModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add/Edit Article</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="articleForm">
                                    @csrf
                                    <input type="hidden" id="article-id" name="id">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                                    <button type="button" id="saveArticle" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
    $(document).ready(function () {
        let editorInstance;

        ClassicEditor.create(document.querySelector('#description'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => console.error(error));

        $('#add-article').click(function () {
            $('#articleForm')[0].reset();
            $('#article-id').val('');
            editorInstance.setData('');
            $('#addEditModal').modal('show');
        });

        $(document).on('click', '.edit-article', function () {
            const articleId = $(this).data('article-id');
            $.ajax({
                url: `/article/${articleId}`,
                type: 'GET',
                success: function (data) {
                    $('#article-id').val(data.id);
                    $('#title').val(data.title);
                    editorInstance.setData(data.description);
                    $('#addEditModal').modal('show');
                },
                error: function (error) {
                    console.error('Error fetching article:', error);
                }
            });
        });

        $('#saveArticle').click(function () {
            const formData = {
                id: $('#article-id').val(),
                title: $('#title').val(),
                description: editorInstance.getData(),
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                url: formData.id ? `/article/${formData.id}` : '{{ route('article.store') }}',
                type: formData.id ? 'PUT' : 'POST',
                data: formData,
                success: function () {
                    window.location.reload();
                },
                error: function (error) {
                    console.error('Error saving article:', error);
                }
            });
        });

        $(document).on('click', '.view-article', function () {
            const articleId = $(this).data('article-id');
            $.ajax({
                url: `/article/${articleId}`,
                type: 'GET',
                success: function (data) {
                    $('#modal-title').text(data.title);
                    $('#modal-description').html(data.description);
                    $('#modal-author').text(data.author || 'Unknown');
                    $('#articleModal').modal('show');
                },
                error: function (error) {
                    console.error('Error fetching article details:', error);
                }
            });
        });

        $('#btn-back').click(function () {
            window.location.href = '{{ route("db-dashboard") }}';
        });
    });
</script>
@endsection
