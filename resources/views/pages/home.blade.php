@extends('layouts.layout')

@section('content')
<button onclick="window.location.href='{{ route('pintuGerbang') }}'">Login</button>
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

@push('scripts')
<script>
    $(document).ready(function() {
    const reveals = document.querySelectorAll('.reveal-section');
    const windowHeight = window.innerHeight;

    function checkReveal() {
        for (let i = 0; i < reveals.length; i++) {
        let revealTop = reveals[i].getBoundingClientRect().top;
        let revealBottom = reveals[i].getBoundingClientRect().bottom;

        if (revealTop < windowHeight && revealBottom > 0) {
            reveals[i].classList.add('flying-section');
        } else {
            reveals[i].classList.remove('flying-section');
        }
        }
    }

    // Initial check for reveal sections
    checkReveal();

    // Whatsapp transition
    $("#floating").on("transitionend", function(event) {
        if ($(this).width() >= 300 && event.originalEvent.propertyName === "width") {
        $(this).prepend("<h1>Contact Us</h1>");
        }
    });

    $("#floating").mouseleave(function() {
        $(this).find("h1").remove();
    });

    $(window).scroll(function() {
        let scrollTop = $(this).scrollTop();
        let navbarSection = $('header#navbar-section');

        if (scrollTop > 0) {
        navbarSection.addClass('shadow');
        } else {
        navbarSection.removeClass('shadow');
        }

        // Recheck reveal sections on scroll
        checkReveal();
    });

    // Also check reveal sections on resize
    $(window).resize(function() {
        checkReveal();
    });
    }); 
</script>
@endpush