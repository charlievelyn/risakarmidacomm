@extends('layouts.layout')

@section('content')

@include('sections.header')
<main id="articles">
    <!-- <section class="pt-4 pb-0 card-grid">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-9">
                    <div class="card card-overlay-bottom card-grid-lg card-bg-scale" style="background-image:url({{ asset('images/team1.jpeg') }}); background-position: center left; background-size: cover;">
                        <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
                            <div class="w-100 mt-auto">
                                <a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Public Relations</a>
                                <h2 class="text-white h1"><a href="#" class="btn-link stretched-link text-reset"></a></h2>
                                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas nam animi eum eveniet eaque iste, nostrum aperiam doloribus eligendi dolores.</p>
                                <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <div class="d-flex align-items-center text-white position-relative">
                                                <div class="avatar">
                                                    <img class="avatar-img rounded-circle" src="{{ asset('images/team1.jpeg') }}" alt="avatar">
                                                </div>
                                                <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">Risa</a></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">Apr 09, 2024</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card card-overlay-bottom card-grid-sm card-bg-scale" style="background-image:url({{ asset('images/team1.jpeg') }}); background-position: center left; background-size: cover;">
                        <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
                            <div class="w-100 mt-auto">
                                <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Category</a>
                                <h4 class="text-white"><a href="post-single-4.html" class="btn-link stretched-link text-reset">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, mollitia!</a></h4>
                                <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                    <li class="nav-item position-relative">
                                        <div class="nav-link">by <a href="#" class="stretched-link text-reset btn-link">Risa</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">Apr 09, 2024</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card card-overlay-bottom card-grid-sm card-bg-scale" style="background-image:url({{ asset('images/team1.jpeg') }}); background-position: center left; background-size: cover;">
                        <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
                            <div class="w-100 mt-auto">
                                <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Category</a>
                                <h4 class="text-white"><a href="post-single-4.html" class="btn-link stretched-link text-reset">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, mollitia!</a></h4>
                                <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                    <li class="nav-item position-relative">
                                        <div class="nav-link">by <a href="#" class="stretched-link text-reset btn-link">Risa</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">Apr 09, 2024</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <section class="position-relative">
        <div class="container" data-sticky-container="">
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($articles as $article)
                    <div class="card m-3">
                        <a href="{{ route('article.show', $article->id) }}" class="card-link">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="card-title mt-2">{{ $article->title }}</h2>
                                        <p class="card-text">
                                            {!! \Illuminate\Support\Str::words(preg_replace('/<[^>]*>/', '', $article->description), 30) !!}
                                            @if (str_word_count(strip_tags($article->description)) > 30)
                                                <a href="{{ route('article.show', $article->id) }}">Read more</a>
                                            @endif
                                        </p>
                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                            <li class="nav-item">
                                                <div class="nav-link">
                                                    <div class="d-flex align-items-center position-relative">
                                                        <div class="avatar avatar-xs">
                                                            <img class="avatar-img rounded-circle" src="{{ asset('storage/asset/teams/risa_karmida.jpeg') }}" alt="avatar">
                                                        </div>
                                                        <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">{{ $article->author }}</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">{{ $article->created_at->format('M d, Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                    
                </div>
                
                <div class="col-12 text-center mt-5">
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
                {{-- <div class="col-lg-3">
                    <div data-sticky="" data-margin-top="80" data-sticky-for="767" style="">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <h4 class="mt-4 mb-3">Top Articles</h4>
                                <div class="card mb-3">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <img class="rounded" src="assets/images/blog/4by3/thumb/01.jpg" alt="">
                                        </div>
                                        <div class="col-8">
                                            <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, animi!</a></h6>
                                            <div class="small mt-1">Apr 09, 2024</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
</main>
@include('sections.footer')
@endsection