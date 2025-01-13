@extends('components.profile.dashboard')

@push('styles')
<style>
    #articleModal  img {
        max-width: 100%;
        height: auto;
    }

</style>
@endpush

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
                                        <form action="{{ route('article.destroy', ['articleId' => $article->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('POST')
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
                                {{-- <button id="delete-article" data-article-id="" class="btn btn-danger">Delete Article</button> --}}
                                {{-- <form id="delete-article-form" action="" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>                                 --}}
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


@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
    $(document).ready(function () {
        let editorInstance;
        ClassicEditor
            .create(document.querySelector('#description'), {
                extraPlugins: [CustomUploadAdapterPlugin],
                toolbar: ['imageUpload', '|', 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                image: {
                    toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side']
                }
            })
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => console.error(error));

        function CustomUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new MyUploadAdapter(loader);
            };
        }

        class MyUploadAdapter {
            constructor(loader) {
                this.loader = loader;
            }

            upload() {
                return new Promise((resolve, reject) => {
                    const data = new FormData();
                    this.loader.file.then((file) => {
                        data.append('upload', file);
                        data.append('_token', '{{ csrf_token() }}');

                        $.ajax({
                            url: '/article/upload',
                            type: 'POST',
                            data: data,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                resolve({
                                    default: response.url
                                });
                            },
                            error: function(error) {
                                reject(error);
                            }
                        });
                    });
                });
            }

            abort() {
                // Handle abort
            }
        }


        $('#add-article').click(function () {
            $('#articleForm')[0].reset();
            $('#article-id').val('');
            editorInstance.setData('');
            $('#addEditModal').modal('show');
        });

        $(document).on('click', '.edit-article', function () {
            const articleId = $(this).data('article-id');
            $.ajax({
                url: `/article/view/${articleId}`,
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
                url: `/article/view/${articleId}`,
                type: 'GET',
                success: function (data) {
                    $('#modal-title').text(data.title);
                    $('#modal-description').html(data.description);
                    $('#modal-author').text(data.author || 'Unknown');
                    $('#delete-article').data('article-id', articleId);
                    $('#delete-article-form').attr('action', `/article/delete/${articleId}`);
                    $('#articleModal').modal('show');
                },
                error: function (error) {
                    console.error('Error fetching article details:', error);
                }
            });
        });
    });
</script>
@endpush
