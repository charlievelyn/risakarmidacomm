@extends('layouts.layout')

@section('content')

@include('sections.header')

<main>
@include('sections.home.carousel')

@include('sections.home.about')

@include('sections.home.values')

@include('sections.home.training')

@include('sections.home.team')

@include('sections.home.clients')

@include('sections.home.contactus')
</main>

@include('sections.footer')

@endsection