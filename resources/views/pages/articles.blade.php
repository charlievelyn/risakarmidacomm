@extends('layouts.layout')

@push('styles')
<style>
    main#articles {
        a {
            color: #000;
            text-decoration: none;
        }
        
        .main-section {
            margin-top: 20px;
            
            .title-article {
                height: auto;
                margin: 10px;
                padding: 10px;
                background-color: #343a40;
                text-align: center;
                color: #fff;
                border-radius: 5px;
            }

            .main-article {
                padding: 50px;
                border: 1px solid #dee2e6;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                
                img {
                    max-width: 100%;
                    height: auto;
                    border-radius: 5px;
                }
            }

            .main-author {
                margin-top: 40px;
                margin-bottom: 40px;
                width: 100%;
                text-align: center;
                border-radius: 30px;
                padding: 20px;
                box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.3);

                .avatar {
                    height: 10rem;
                    width: 10rem;
                    position: relative;
                    display: inline-block !important;

                    .avatar-img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        border-radius: 50%;
                    }
                }
            }

            @media (max-width: 767.98px) {
                .main-author {
                    margin-top: 10px;
                    margin-bottom: 10px;
                }
            }

            .other-article {
                .other-article-container {
                    .previous-article, .next-article {
                        min-width: 300px;
                        width: 50%;
                        height: 200px;
                        padding: 20px;
                        margin: 10px;
                        background-color: #f8f9fa;
                        transition: all 0.5s ease;
                        border: 1px solid #dee2e6;
                        border-radius: 5px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

                        &:hover {
                            background-color: #343a40;
                            color: #fff;
                        }
                    }
                }
                
                @media (max-width: 767.98px) {
                    .other-article-container {
                        display: none;
                    }
                }
            }
        }

        .side-section {
            margin-top: 20px;
            
            .side-header {
                padding: 20px;
                color: #fff;
                margin: 10px;
                background-color: #343a40;
                border-radius: 5px;
                text-align: center;
            }

            .side-item {
                margin: 10px;
                
                a {
                    text-decoration: none;
                }

                .card-body {
                    background-color: #f8f9fa;
                    transition: all 0.5s ease;
                    border: 1px solid #dee2e6;
                    border-radius: 5px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

                    &:hover {
                        color: #fff;
                        background-color: #343a40;
                    }
                }
            }

            .side-author {
                .author {
                    font-size: 0.75em;
                }

                .avatar {
                    height: 2.5rem;
                    width: 2.5rem;
                    position: relative;
                    display: inline-block !important;

                    .avatar-img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        border-radius: 50%;
                    }
                }
            }
        }
    }

    main#singlepost {
        .card {
            height: 100px;
            background-color: red;
        }

        .main-area {
            height: 100px;
            background-color: blue;
        }

        .side-area {
            height: 100px;
            background-color: green;
        }
    }
</style>
@endpush


@section('content')
@include('sections.header')
<main id="articles">
    <section class="position-relative">
        <div class="container">
            <div class="row">
                @if ($main_article && $previous_article && $next_article)
                    <div class="col-lg-9 main-section">
                        <div class="title-article">
                            <h1>{{ $main_article->title }}</h1>
                        </div>
                        <div class="container main-article">
                            {!! $main_article->description !!}
                        </div>
                
                        <div class="main-author">
                            <ul class="nav nav-divider align-items-center d-flex justify-content-center">
                                <li class="nav-item">
                                    <h2>Author</h2>
                                    <div class="d-flex align-items-center position-relative">
                                        <div class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle" src="{{ asset($main_article->author_image) }}" alt="avatar">
                                        </div>
                                        <div>
                                            <span class="ms-3">{{ $main_article->author }}</span>
                                            <p class="ms-3">{{ $main_article->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item"></li>
                            </ul> 
                        </div>
                        <div class="d-flex justify-content-center other-article">
                            <div class="col-lg-6 other-article-container">
                                <div class="col-lg-12">
                                    <a href="{{ route('articles.show', ['articleId' => $previous_article->id]) }}">
                                        <div class="col-lg-6 d-flex justify-content-center previous-article">
                                            <div class="col-lg-2 justify-content-center align-items-center text-end d-flex mx-3 border border-light rounded-3 main-article-arrow">
                                                <i class="fas fa-chevron-left fa-3x align-self-center"></i>
                                            </div>
                                            <div class="col-lg-10 text-start">
                                                <p>Previous Article</p>
                                                <h5>{{ $previous_article->title }}</h5><br/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 other-article-container">
                                <div class="col-lg-12">
                                    <a href="{{ route('articles.show', ['articleId' => $next_article->id]) }}" class="d-flex justify-content-end">   
                                        <div class="col-lg-6 d-flex justify-content-center next-article">
                                            <div class="col-lg-10 text-end">
                                                <p>Next Article</p>
                                                <h5>{{ $next_article->title }}</h5><br/>
                                            </div>
                                            <div class="col-lg-2 justify-content-center align-items-center text-end d-flex mx-3 border border-light rounded-3 main-article-arrow">
                                                <i class="fas fa-chevron-right fa-3x align-self-center"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 side-section">
                        <div class="side-header">
                            <h1>Latest Post</h1>
                        </div>
                        @foreach ($articles as $article)
                        <div class="card side-item">
                            <a href="{{ route('articles.show', $article->id) }}" class="card-link">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="card-title">{{ $article->title }}</h6>
                                            <div class="d-flex align-items-center position-relative side-author">
                                                <div class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="{{ asset($article->author_image) }}" alt="avatar">
                                                </div>
                                                <span class="ms-3"><p class="author">{{ $article->author }} | {{ $article->created_at->format('M d, Y') }}</p></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <!-- Previous Page Link -->
                                @if ($articles->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $articles->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                @endif

                                @for ($i = 1; $i <= $articles->lastPage(); $i++)
                                    <li class="page-item {{ $i == $articles->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                    
                                <!-- Next Page Link -->
                                @if ($articles->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $articles->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                @else
                    <div class="alert alert-warning text-center" style="background-color: #FFFDD0; width: 100%; margin: 20px auto;">
                        No article available
                    </div>
                @endif
            </div>
        </div>
    </section>
</main>
@include('sections.footer')
@endsection
