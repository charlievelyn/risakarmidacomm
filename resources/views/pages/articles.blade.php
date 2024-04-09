@extends('layouts.layout')

@section('content')

@include('sections.header')

<main id="articles">
    <section class="pt-4 pb-0 card-grid">
        <div class="container">
            <div class="row g-4">
                <!-- Left big card -->
                <div class="col-lg-6">
                    <div class="card card-overlay-bottom card-grid-lg card-bg-scale" style="background-image:url({{asset('images/team1.jpeg')}}); background-position: center left; background-size: cover;">
                        <!-- Card featured -->
                        <span class="card-featured" title="Featured post"><i class="fas fa-star"></i></span>
                        <!-- Card Image overlay -->
                        <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
                            <div class="w-100 mt-auto">
                                <!-- Card category -->
                                <a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Lifestyle</a>
                                <!-- Card title -->
                                <h2 class="text-white h1"><a href="post-single-4.html" class="btn-link stretched-link text-reset">Ten tell-tale signs you need to get a new startup.</a></h2>
                                <p class="text-white">No visited raising gravity outward subject my cottage Mr be. Hold do at tore in park feet near my case. </p>
                                <!-- Card info -->
                                <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <div class="d-flex align-items-center text-white position-relative">
                                                <div class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="avatar">
                                                </div>
                                                <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">Louis</a></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">Nov 15, 2022</li>
                                    <li class="nav-item">5 min read</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right small cards -->
                <div class="col-lg-6">
                    <div class="row g-4">
                        <!-- Card item START -->
                        <div class="col-12">
                            <div class="card card-overlay-bottom card-grid-sm card-bg-scale" style="background-image:url(assets/images/blog/1by1/02.jpg); background-position: center left; background-size: cover;">
                                <!-- Card Image -->
                                <!-- Card Image overlay -->
                                <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
                                    <div class="w-100 mt-auto">
                                        <!-- Card category -->
                                        <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Technology</a>
                                        <!-- Card title -->
                                        <h4 class="text-white"><a href="post-single-4.html" class="btn-link stretched-link text-reset">Best Pinterest boards for learning about business</a></h4>
                                        <!-- Card info -->
                                        <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                            <li class="nav-item position-relative">
                                                <div class="nav-link">by <a href="#" class="stretched-link text-reset btn-link">Bryan</a>
                                                </div>
                                            </li>
                                            <li class="nav-item">Aug 18, 2022</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                        <!-- Card item START -->
                        <div class="col-md-6">
                            <div class="card card-overlay-bottom card-grid-sm card-bg-scale" style="background-image:url(assets/images/blog/1by1/03.jpg); background-position: center left; background-size: cover;">
                                <!-- Card Image overlay -->
                                <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
                                    <div class="w-100 mt-auto">
                                        <!-- Card category -->
                                        <a href="#" class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Business</a>
                                        <!-- Card title -->
                                        <h4 class="text-white"><a href="post-single-4.html" class="btn-link stretched-link text-reset">Five intermediate guide to business</a></h4>
                                        <!-- Card info -->
                                        <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                            <li class="nav-item position-relative">
                                                <div class="nav-link">by <a href="#" class="stretched-link text-reset btn-link">Joan</a>
                                                </div>
                                            </li>
                                            <li class="nav-item">Jun 03, 2022</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                        <!-- Card item START -->
                        <div class="col-md-6">
                            <div class="card card-overlay-bottom card-grid-sm card-bg-scale" style="background-image:url(assets/images/blog/1by1/04.jpg); background-position: center left; background-size: cover;">
                                <!-- Card Image overlay -->
                                <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
                                    <div class="w-100 mt-auto">
                                        <!-- Card category -->
                                        <a href="#" class="badge text-bg-info mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Sports</a>
                                        <!-- Card title -->
                                        <h4 class="text-white"><a href="post-single-4.html" class="btn-link stretched-link text-reset">15 reasons to choose startup</a></h4>
                                        <!-- Card info -->
                                        <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                            <li class="nav-item position-relative">
                                                <div class="nav-link">by <a href="#" class="stretched-link text-reset btn-link">Amanda</a>
                                                </div>
                                            </li>
                                            <li class="nav-item">Jan 28, 2022</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                    </div>
                </div>
            </div>
        </div>
    </section>
            <section class="position-relative">
                <div class="container" data-sticky-container="">
                    <div class="row">
                        <!-- Main Post START -->
                        <div class="col-lg-9">
                            <!-- Title -->
                            <div class="mb-4">
                                <h2 class="m-0"><i class="bi bi-hourglass-top me-2"></i>Today's top highlights</h2>
                                <p>Latest breaking news, pictures, videos, and special reports</p>
                            </div>
                            <div class="row gy-4">
                                <!-- Card item START -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <!-- Card img -->
                                        <div class="position-relative">
                                            <img class="card-img" src="assets/images/blog/4by3/01.jpg" alt="Card image">
                                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                                <!-- Card overlay bottom -->
                                                <div class="w-100 mt-auto">
                                                    <!-- Card category -->
                                                    <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Technology</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-3">
                                            <!-- Sponsored Post -->
                                            <a href="#!" class="mb-0 text-body small" tabindex="0" role="button" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-content="You're seeing this ad because your activity meets the intended audience of our site.">
                                                <i class="bi bi-info-circle ps-1"></i> Sponsored
                                            </a>
                                            <h4 class="card-title mt-2"><a href="post-single.html" class="btn-link text-reset fw-bold">12 worst types of business accounts you follow on Twitter</a></h4>
                                            <p class="card-text">He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty gay assistance joy. Unaffected at ye of compliment alteration to</p>
                                            <!-- Card info -->
                                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                                <li class="nav-item">
                                                    <div class="nav-link">
                                                        <div class="d-flex align-items-center position-relative">
                                                            <div class="avatar avatar-xs">
                                                                <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
                                                            </div>
                                                            <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">Samuel</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">Jan 22, 2022</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card item END -->
                                <!-- Card item START -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <!-- Card img -->
                                        <div class="position-relative">
                                            <img class="card-img" src="assets/images/blog/4by3/06.jpg" alt="Card image">
                                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                                <!-- Card overlay Top -->
                                                <div class="w-100 mb-auto d-flex justify-content-end">
                                                    <div class="text-end ms-auto">
                                                        <!-- Card format icon -->
                                                        <div class="icon-md bg-white bg-opacity-25 bg-blur text-white rounded-circle" title="This post has video"><i class="fas fa-video"></i></div>
                                                    </div>
                                                </div>
                                                <!-- Card overlay bottom -->
                                                <div class="w-100 mt-auto">
                                                    <!-- Card category -->
                                                    <a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Travel</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-3">
                                            <h4 class="card-title"><a href="post-single.html" class="btn-link text-reset fw-bold">Dirty little secrets about the business industry</a></h4>
                                            <p class="card-text">Place voice no arises along to. Parlors waiting so against me no. Wishing calling is warrant settled was lucky. Express besides it present if at an opinion visitor.</p>
                                            <!-- Card info -->
                                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                                <li class="nav-item">
                                                    <div class="nav-link">
                                                        <div class="d-flex align-items-center position-relative">
                                                            <div class="avatar avatar-xs">
                                                                <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
                                                            </div>
                                                            <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">Dennis</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">Mar 07, 2022</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card item END -->
                                <!-- Card item START -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <!-- Card img -->
                                        <div class="position-relative">
                                            <img class="card-img" src="assets/images/blog/4by3/03.jpg" alt="Card image">
                                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                                <!-- Card overlay bottom -->
                                                <div class="w-100 mt-auto">
                                                    <!-- Card category -->
                                                    <a href="#" class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Gadgets</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-3">
                                            <h4 class="card-title"><a href="post-single.html" class="btn-link text-reset fw-bold">Bad habits that people in the industry need to quit</a></h4>
                                            <p class="card-text">For who thoroughly her boy estimating conviction. Removed demands expense account in outward tedious do. Particular way thoroughly unaffected</p>
                                            <!-- Card info -->
                                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                                <li class="nav-item">
                                                    <div class="nav-link">
                                                        <div class="d-flex align-items-center position-relative">
                                                            <div class="avatar avatar-xs">
                                                                <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
                                                            </div>
                                                            <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">Bryan</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">Jun 17, 2022</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card item END -->
                                <!-- Card item START -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <!-- Card img -->
                                        <div class="position-relative">
                                            <img class="card-img" src="assets/images/blog/4by3/04.jpg" alt="Card image">
                                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                                <!-- Card overlay bottom -->
                                                <div class="w-100 mt-auto">
                                                    <!-- Card category -->
                                                    <a href="#" class="badge bg-primary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Sports</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-3">
                                            <h4 class="card-title"><a href="post-single.html" class="btn-link text-reset fw-bold">Around the web: 20 fabulous infographics about business</a></h4>
                                            <p class="card-text">Projection favorable Mrs can be projecting own. Thirty it matter enable become admire in giving. See resolved goodness felicity shy civility domestic had but.</p>
                                            <!-- Card info -->
                                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                                <li class="nav-item">
                                                    <div class="nav-link">
                                                        <div class="d-flex align-items-center position-relative">
                                                            <div class="avatar avatar-xs">
                                                                <div class="avatar-img rounded-circle bg-success">
                                                                    <span class="text-white position-absolute top-50 start-50 translate-middle fw-bold small">SL</span>
                                                                </div>
                                                            </div>
                                                            <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">Billy</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">Dec 29, 2022</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card item END -->
                                <!-- Card item START -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <!-- Card img -->
                                        <div class="position-relative">
                                            <!-- <img class="card-img" src="assets/images/blog/4by3/05.jpg" alt="Card image"> -->
                                            <div class="card-image position-relative">
                                                <img class="card-img" src="assets/images/blog/4by3/05.jpg" alt="Card image">
                                                <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                                    <!-- Card overlay -->
                                                    <div class="w-100 my-auto">
                                                        <!-- Audio START -->
                                                        <div class="player-wrapper bg-light rounded">
                                                            <div tabindex="0" class="plyr plyr--full-ui plyr--audio plyr--html5 plyr--paused plyr--stopped"><div class="plyr__controls"><button class="plyr__controls__item plyr__control" type="button" data-plyr="play" aria-label="Play"><svg class="icon--pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-pause"></use></svg><svg class="icon--not-pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-play"></use></svg><span class="label--pressed plyr__sr-only">Pause</span><span class="label--not-pressed plyr__sr-only">Play</span></button><div class="plyr__controls__item plyr__progress__container"><div class="plyr__progress"><input data-plyr="seek" type="range" min="0" max="100" step="0.01" value="0" autocomplete="off" role="slider" aria-label="Seek" aria-valuemin="0" aria-valuemax="278.726531" aria-valuenow="0" id="plyr-seek-465" aria-valuetext="00:00 of 00:00" style="--value: 0%;"><progress class="plyr__progress__buffer" min="0" max="100" value="6.513194109964364" role="progressbar" aria-hidden="true">% buffered</progress><span class="plyr__tooltip">00:00</span></div></div><div class="plyr__controls__item plyr__time--current plyr__time" aria-label="Current time">04:38</div><div class="plyr__controls__item plyr__volume"><button type="button" class="plyr__control" data-plyr="mute"><svg class="icon--pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-muted"></use></svg><svg class="icon--not-pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-volume"></use></svg><span class="label--pressed plyr__sr-only">Unmute</span><span class="label--not-pressed plyr__sr-only">Mute</span></button><input data-plyr="volume" type="range" min="0" max="1" step="0.05" value="1" autocomplete="off" role="slider" aria-label="Volume" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100" id="plyr-volume-465" aria-valuetext="100.0%" style="--value: 100%;"></div><button class="plyr__controls__item plyr__control" type="button" data-plyr="captions"><svg class="icon--pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-captions-on"></use></svg><svg class="icon--not-pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-captions-off"></use></svg><span class="label--pressed plyr__sr-only">Disable captions</span><span class="label--not-pressed plyr__sr-only">Enable captions</span></button><div class="plyr__controls__item plyr__menu"><button aria-haspopup="true" aria-controls="plyr-settings-465" aria-expanded="false" type="button" class="plyr__control" data-plyr="settings"><svg aria-hidden="true" focusable="false"><use xlink:href="#plyr-settings"></use></svg><span class="plyr__sr-only">Settings</span></button><div class="plyr__menu__container" id="plyr-settings-465" hidden=""><div><div id="plyr-settings-465-home"><div role="menu"><button data-plyr="settings" type="button" class="plyr__control plyr__control--forward" role="menuitem" aria-haspopup="true" hidden=""><span>Captions<span class="plyr__menu__value">Disabled</span></span></button><button data-plyr="settings" type="button" class="plyr__control plyr__control--forward" role="menuitem" aria-haspopup="true" hidden=""><span>Quality<span class="plyr__menu__value">undefined</span></span></button><button data-plyr="settings" type="button" class="plyr__control plyr__control--forward" role="menuitem" aria-haspopup="true"><span>Speed<span class="plyr__menu__value">Normal</span></span></button></div></div><div id="plyr-settings-465-captions" hidden=""><button type="button" class="plyr__control plyr__control--back"><span aria-hidden="true">Captions</span><span class="plyr__sr-only">Go back to previous menu</span></button><div role="menu"></div></div><div id="plyr-settings-465-quality" hidden=""><button type="button" class="plyr__control plyr__control--back"><span aria-hidden="true">Quality</span><span class="plyr__sr-only">Go back to previous menu</span></button><div role="menu"></div></div><div id="plyr-settings-465-speed" hidden=""><button type="button" class="plyr__control plyr__control--back"><span aria-hidden="true">Speed</span><span class="plyr__sr-only">Go back to previous menu</span></button><div role="menu"><button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="0.5"><span>0.5×</span></button><button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="0.75"><span>0.75×</span></button><button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="true" value="1"><span>Normal</span></button><button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="1.25"><span>1.25×</span></button><button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="1.5"><span>1.5×</span></button><button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="1.75"><span>1.75×</span></button><button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="2"><span>2×</span></button><button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="4"><span>4×</span></button></div></div></div></div></div><button class="plyr__controls__item plyr__control" type="button" data-plyr="pip"><svg aria-hidden="true" focusable="false"><use xlink:href="#plyr-pip"></use></svg><span class="plyr__sr-only">PIP</span></button><button class="plyr__controls__item plyr__control" type="button" data-plyr="fullscreen"><svg class="icon--pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-exit-fullscreen"></use></svg><svg class="icon--not-pressed" aria-hidden="true" focusable="false"><use xlink:href="#plyr-enter-fullscreen"></use></svg><span class="label--pressed plyr__sr-only">Exit fullscreen</span><span class="label--not-pressed plyr__sr-only">Enter fullscreen</span></button></div><audio class="player-audio" crossorigin="">
                                                                <source src="assets/images/videos/audio.mp3" type="audio/mp3">
                                                            </audio><button type="button" class="plyr__control plyr__control--overlaid" data-plyr="play" aria-label="Play"><svg aria-hidden="true" focusable="false"><use xlink:href="#plyr-play"></use></svg><span class="plyr__sr-only">Play</span></button></div>
                                                        </div>
                                                        <!-- Audio END -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-3">
                                            <h4 class="card-title"><a href="post-single.html" class="btn-link text-reset fw-bold">7 common mistakes everyone makes while traveling</a></h4>
                                            <p class="card-text">Drawings offended yet answered Jennings perceive laughing six did far. Rooms oh fully taken by worse do. Points afraid but may end law lasted. </p>
                                            <!-- Card info -->
                                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                                <li class="nav-item">
                                                    <div class="nav-link">
                                                        <div class="d-flex align-items-center position-relative">
                                                            <div class="avatar avatar-xs">
                                                                <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
                                                            </div>
                                                            <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">Jacqueline</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">Nov 11, 2022</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card item END -->
                                <!-- Card item START -->
                                <div class="col-sm-6">
                                    <div class="card">
                                        <!-- Card img -->
                                        <div class="position-relative">
                                            <img class="card-img" src="assets/images/blog/4by3/12.jpg" alt="Card image">
                                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                                <!-- Card overlay bottom -->
                                                <div class="w-100 mt-auto">
                                                    <!-- Card category -->
                                                    <a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>Photography</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-3">
                                            <h4 class="card-title"><a href="post-single.html" class="btn-link text-reset fw-bold">5 investment doubts you should clarify</a></h4>
                                            <p class="card-text">Was out laughter raptures returned outweigh. Luckily cheered colonel I do we attack highest enabled. Tried law yet style child. The bore of true of no be deal.</p>
                                            <!-- Card info -->
                                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                                <li class="nav-item">
                                                    <div class="nav-link">
                                                        <div class="d-flex align-items-center position-relative">
                                                            <div class="avatar avatar-xs">
                                                                <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
                                                            </div>
                                                            <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">Carolyn</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">Sep 01, 2022</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card item END -->
                                <!-- Load more START -->
                                <div class="col-12 text-center mt-5">
                                    <button type="button" class="btn btn-primary-soft">Load more post <i class="bi bi-arrow-down-circle ms-2 align-middle"></i></button>
                                </div>
                                <!-- Load more END -->
                            </div>
                        </div>
                        <!-- Main Post END -->
                        <!-- Sidebar START -->
                        <div class="col-lg-3 mt-5 mt-lg-0">
                            <div data-sticky="" data-margin-top="80" data-sticky-for="767" style="">
            
                                <!-- Social widget START -->
                                <div class="row g-2">
                                    <div class="col-4">
                                        <a href="#" class="bg-facebook rounded text-center text-white-force p-3 d-block">
                                            <i class="fab fa-facebook-square fs-5 mb-2"></i>
                                            <h6 class="m-0">1.5K</h6>
                                            <span class="small">Fans</span>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#" class="bg-instagram-gradient rounded text-center text-white-force p-3 d-block">
                                            <i class="fab fa-instagram fs-5 mb-2"></i>
                                            <h6 class="m-0">1.8M</h6>
                                            <span class="small">Followers</span>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#" class="bg-youtube rounded text-center text-white-force p-3 d-block">
                                            <i class="fab fa-youtube-square fs-5 mb-2"></i>
                                            <h6 class="m-0">22K</h6>
                                            <span class="small">Subs</span>
                                        </a>
                                    </div>
                                </div>
                                <!-- Social widget END -->
            
                                <!-- Trending topics widget START -->
                                <div>
                                    <h4 class="mt-4 mb-3">Trending topics</h4>
                                    <!-- Category item -->
                                    <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded bg-dark-overlay-4 " style="background-image:url(assets/images/blog/4by3/01.jpg); background-position: center left; background-size: cover;">
                                        <div class="p-3">
                                            <a href="#" class="stretched-link btn-link fw-bold text-white h5">Travel</a>
                                        </div>
                                    </div>
                                    <!-- Category item -->
                                    <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url(assets/images/blog/4by3/02.jpg); background-position: center left; background-size: cover;">
                                        <div class="bg-dark-overlay-4 p-3">
                                            <a href="#" class="stretched-link btn-link fw-bold text-white h5">Business</a>
                                        </div>
                                    </div>
                                    <!-- Category item -->
                                    <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url(assets/images/blog/4by3/03.jpg); background-position: center left; background-size: cover;">
                                        <div class="bg-dark-overlay-4 p-3">
                                            <a href="#" class="stretched-link btn-link fw-bold text-white h5">Marketing</a>
                                        </div>
                                    </div>
                                    <!-- Category item -->
                                    <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url(assets/images/blog/4by3/04.jpg); background-position: center left; background-size: cover;">
                                        <div class="bg-dark-overlay-4 p-3">
                                            <a href="#" class="stretched-link btn-link fw-bold text-white h5">Photography</a>
                                        </div>
                                    </div>
                                    <!-- Category item -->
                                    <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url(assets/images/blog/4by3/05.jpg); background-position: center left; background-size: cover;">
                                        <div class="bg-dark-overlay-4 p-3">
                                            <a href="#" class="stretched-link btn-link fw-bold text-white h5">Sports</a>
                                        </div>
                                    </div>
                                    <!-- View All Category button -->
                                    <div class="text-center mt-3">
                                        <a href="#" class="fw-bold text-body text-primary-hover"><u>View all categories</u></a>
                                    </div>
                                </div>
                                <!-- Trending topics widget END -->
            
                                <div class="row">
                                    <!-- Recent post widget START -->
                                    <div class="col-12 col-sm-6 col-lg-12">
                                        <h4 class="mt-4 mb-3">Recent post</h4>
                                        <!-- Recent post item -->
                                        <div class="card mb-3">
                                            <div class="row g-3">
                                                <div class="col-4">
                                                    <img class="rounded" src="assets/images/blog/4by3/thumb/01.jpg" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset fw-bold">The pros and cons of business agency</a></h6>
                                                    <div class="small mt-1">May 17, 2022</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Recent post item -->
                                        <div class="card mb-3">
                                            <div class="row g-3">
                                                <div class="col-4">
                                                    <img class="rounded" src="assets/images/blog/4by3/thumb/02.jpg" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset fw-bold">5 reasons why you shouldn't startup</a></h6>
                                                    <div class="small mt-1">Apr 04, 2022</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Recent post item -->
                                        <div class="card mb-3">
                                            <div class="row g-3">
                                                <div class="col-4">
                                                    <img class="rounded" src="assets/images/blog/4by3/thumb/03.jpg" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset fw-bold">Ten questions you should answer truthfully.</a></h6>
                                                    <div class="small mt-1">Jun 30, 2022</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Recent post item -->
                                        <div class="card mb-3">
                                            <div class="row g-3">
                                                <div class="col-4">
                                                    <img class="rounded" src="assets/images/blog/4by3/thumb/04.jpg" alt="">
                                                </div>
                                                <div class="col-8">
                                                    <h6><a href="post-single-2.html" class="btn-link stretched-link text-reset fw-bold">Five unbelievable facts about money.</a></h6>
                                                    <div class="small mt-1">Nov 29, 2022</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Recent post widget END -->
            
                                    <!-- ADV widget START -->
                                    <div class="col-12 col-sm-6 col-lg-12 my-4">
                                        <a href="#" class="d-block card-img-flash">
                                            <img src="assets/images/adv.png" alt="">
                                        </a>
                                        <div class="smaller text-end mt-2">ads via <a href="#" class="text-body"><u>Bootstrap</u></a></div>
                                    </div>
                                    <!-- ADV widget END -->
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar END -->
                    </div> <!-- Row end -->
                </div>
            </section>



        {{-- <div class="row">
            <div class="col-md-9">
                <article class="card mb-4">
                  <header class="card-header">
                    <div class="card-meta">
                      <a href="#"><time class="timeago" datetime="2021-09-26 20:00" timeago-id="1">2 years ago</time></a> in <a href="page-category.html">Journey</a>
                    </div>
                    <a href="post-image.html">
                      <h4 class="card-title">Lorem ipsum dolor sit amet.</h4>
                    </a>
                  </header>
                  <a href="post-image.html">
                    <img class="card-img" src="img/articles/8.jpg" alt="">
                  </a>
                  <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus animi quos recusandae inventore tenetur laudantium ipsa eum nostrum vel assumenda!</p>
                  </div>
                </article>
              </div>
    
              <div class="col-md-3 ms-auto">
                <aside class="sidebar">
                  <div class="card mb-4">
                    <div class="card-body">
                      <h4 class="card-title">About</h4>
                      <p class="card-text">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam <a href="#">semper libero</a>, sit amet adipiscing sem neque sed ipsum. </p>
                    </div>
                  </div><!-- /.card -->
                </aside>
      
                <aside class="sidebar sidebar-sticky">
                  <div class="card mb-4">
                    <div class="card-body">
                      <h4 class="card-title">Tags</h4>
                      <a class="btn btn-light btn-sm mb-1" href="page-category.html">Journey</a>
                      <a class="btn btn-light btn-sm mb-1" href="page-category.html">Work</a>
                      <a class="btn btn-light btn-sm mb-1" href="page-category.html">Lifestype</a>
                      <a class="btn btn-light btn-sm mb-1" href="page-category.html">Photography</a>
                      <a class="btn btn-light btn-sm mb-1" href="page-category.html">Food &amp; Drinks</a>
                    </div>
                  </div><!-- /.card -->
                  <div class="card mb-4">
                    <div class="card-body">
                      <h4 class="card-title">Popular stories</h4>
      
                      <a href="post-image.html" class="d-inline-block">
                        <h4 class="h6">The blind man</h4>
                        <img class="card-img" src="img/articles/2.jpg" alt="">
                      </a>
                      <time class="timeago" datetime="2021-09-03 20:00" timeago-id="5">2 years ago</time> in Lifestyle
      
                      <a href="post-image.html" class="d-inline-block mt-3">
                        <h4 class="h6">Crying on the news</h4>
                        <img class="card-img" src="img/articles/3.jpg" alt="">
                      </a>
                      <time class="timeago" datetime="2021-07-16 20:00" timeago-id="6">2 years ago</time> in Work
      
                    </div>
                  </div><!-- /.card -->
                </aside>
              </div>
        </div> --}}
    </div>
</main>


@include('sections.footer')
@endsection