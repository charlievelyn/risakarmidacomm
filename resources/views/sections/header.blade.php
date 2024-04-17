<header id="navbar-section" class="navbar-section sticky-top">
    {{-- <div class="fixed-top"> --}}
        <div class="container brand-section py-2 text-center">
            <img class="navbar-image" src="{{ asset('storage/asset/rkc_logo.png') }}" alt="" class="invert">
            {{-- <p class="py-1">Training | Consulting | Agencies</p> --}}
        </div>
        <div class="container navbar-expand-md">
            <nav class="navbar navbar-light">
                <div class="container-fluid d-flex justify-content-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
            <div class="navigation-section text-center mt-3 collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/clients">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/trainingevents">Training Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/articles">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contactus">Contact Us</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Company
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Blog</a></li>
                            <li><a class="dropdown-item" href="#">About Us</a></li>
                            <li><a class="dropdown-item" href="#">Contact us</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>
    {{-- </div> --}}
</header>


{{--
<!-- Jquery needed -->
    <script src="js/scripts.js"></script> --}}

<!-- Function used to shrink nav bar removing paddings and adding black background -->
    {{-- <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script>
</div> --}}



    <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="navbar">
        <a class="navbar-brand" href="#">Your Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Training Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav> -->
<!-- 
<div class="container-fluid" style="height: 2000px; padding-top: 70px;">
    Your page content here
</div> -->
<!-- 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#navbar').addClass('scrolled');
            } else {
                $('#navbar').removeClass('scrolled');
            }
        });
    });
</script> -->