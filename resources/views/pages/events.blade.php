@extends('layouts.layout')

@section('content')

@include('sections.header')

<div class="col-lg-12">
    <div class="row">
        <h2>Page under construction</h2>
        <img src="{{ asset('storage/asset/under_construction.png') }}" alt="under construction">
    </div>
</div>

@include('sections.footer')

@endsection