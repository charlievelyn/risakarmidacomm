{{-- resources/views/partials/main_article.blade.php --}}
<div class="title-article">
    <h1>{{ $article->title }}</h1>
</div>
<div class="container main-article">
    {!! $article->description !!}
</div>

<div class="main-author">
    <ul class="nav nav-divider align-items-center d-flex justify-content-center">
        <li class="nav-item">
            <h2>Author</h2>
            <div class="d-flex align-items-center position-relative">
                <div class="avatar avatar-xs">
                    <img class="avatar-img rounded-circle" src="{{ asset('storage/asset/teams/risa_karmida.jpeg') }}" alt="avatar">
                </div>
                <div>
                    <span class="ms-3">{{ $article->author }}</span>
                    <p class="ms-3">{{ $article->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </li>
        <li class="nav-item"></li>
    </ul> 
</div>
<div class="d-flex justify-content-center other-article">
    <div class="col-lg-6 other-article-container">
        <div class="col-lg-12">
            <a href="{{ route('articles.show', ['articleId' => $previousArticle->id]) }}">
                <div class="col-lg-6 d-flex justify-content-center previous-article">
                    <div class="col-lg-2 justify-content-center align-items-center text-end d-flex mx-3 border border-light rounded-3 main-article-arrow">
                        <i class="fas fa-chevron-left fa-3x align-self-center"></i>
                    </div>
                    <div class="col-lg-10 text-start">
                        <p>Previous Article</p>
                        <h5>{{ $previousArticle->title }}</h5><br/>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-6 other-article-container">
        <div class="col-lg-12">
            <a href="{{ route('articles.show', ['articleId' => $nextArticle->id]) }}" class="d-flex justify-content-end">   
                <div class="col-lg-6 d-flex justify-content-center next-article">
                    <div class="col-lg-10 text-end">
                        <p>Next Article</p>
                        <h5>{{ $nextArticle->title }}</h5><br/>
                    </div>
                    <div class="col-lg-2 justify-content-center align-items-center text-end d-flex mx-3 border border-light rounded-3 main-article-arrow">
                        <i class="fas fa-chevron-right fa-3x align-self-center"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
