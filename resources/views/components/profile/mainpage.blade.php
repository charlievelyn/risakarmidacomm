@extends('components.profile.dashboard')

@section('content')
<h1>Under Construction</h1>
{{-- 
@include('sections.header')

@include('sections.home.carousel')

@include('sections.home.about')

@include('sections.home.values')

@include('sections.home.training')

@include('sections.home.team')

@include('sections.home.clients')

@include('sections.home.contactus')

@include('sections.footer') --}}

@endsection

@push('styles')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        
    });
</script>
@endpush