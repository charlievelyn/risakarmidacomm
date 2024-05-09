@extends('layouts.layout')

@section('content')
@include('sections.header')

<div class="container py-4">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h1 class="card-title">{{ $article->title }}</h1>
                    <p class="card-text">{!! $article->description !!}</p>
                    <div class="d-flex align-items-center mt-3">
                        <div class="avatar me-3">
                            <img class="avatar-img rounded-circle" src="{{ asset('storage/asset/teams/risa_karmida.jpeg') }}" alt="avatar">
                        </div>
                        <div>
                            <span class="fw-bold">{{ $article->author }}</span>
                            <span class="text-muted">{{ $article->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('sections.footer')
@endsection