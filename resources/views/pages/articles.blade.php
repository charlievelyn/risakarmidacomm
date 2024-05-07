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
                <div class="col-lg-9">
                    <div class="row gy-4">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="position-relative">
                                    <img class="card-img" src="assets/images/blog/4by3/01.jpg" alt="Card image"> 
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <div class="w-100 mt-auto">
                                            <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Category</a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <a href="#!" class="mb-0 text-body small" tabindex="0" role="button" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-content="You're seeing this ad because your activity meets the intended audience of our site.">
                                        <i class="bi bi-info-circle ps-1"></i> Sponsored
                                    </a> 
                                    <h4 class="card-title mt-2"><a href="post-single.html" class="btn-link text-reset fw-bold">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, sunt.</a></h4>
                                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptatem sit autem inventore quod enim similique minima voluptatum sequi sunt, aut sed accusamus itaque minus mollitia ut, atque commodi facilis!</p>
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
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
                        <div class="col-12 text-center mt-5">
                            <button type="button" class="btn btn-primary-soft">Load more post <i class="bi bi-arrow-down-circle ms-2 align-middle"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-5 mt-lg-0">
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
                </div>
            </div>
        </div>
    </section>
</main>
@include('sections.footer')
@endsection