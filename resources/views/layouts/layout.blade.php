<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Risa Karmida Communications</title>

    {{-- Style --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Ovo&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Logo Title --}}
    <link rel="icon" href="{{ asset('images/logo_small.png') }}" type="image/x-icon">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    {{-- Preload --}}
    <section class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </section>

    {{-- Content --}}
    @yield('content')
</body>
</html>