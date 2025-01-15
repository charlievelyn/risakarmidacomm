@extends('layouts.layout')

@section('content')

@include('sections.header')
<main>
    <div class="container">
        <section id="contactus-section" class="section">
            <div class="container">
                <div class="skew-cc">
                    @include('layouts.components.skewcc', [
                        'sectionheader' => 'Contact Us',
                        'sectionparagraph' => 'We are here to assist you. Get in touch with us through any of the following methods:'
                        ])

                    <div class="row content">
                        <div class="col-md-12">
                            <div class="google-map mb-4">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.2348208126247!2d110.36528011434605!3d-7.798816179384596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5f37db4ba467%3A0x20ff6d8ff7319b6f!2sJl.%20Wonosari%20No.Km.6%2C%20Banguntapan%2C%20Bantul%2C%20Daerah%20Istimewa%20Yogyakarta%2055151%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1621333071557!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="slide"></iframe>
                            </div>

                            <div class="contact-details slide">
                                <table class="contact-table">
                                    <tr>
                                        <td><i class="lni lni-phone"></i> <strong>Phone:</strong></td>
                                        <td><a href="https://api.whatsapp.com/send?phone=628119934474" target="_blank">+62 81-1993-4474</a></td>
                                    </tr>
                                    <tr>
                                        <td><i class="lni lni-envelope"></i> <strong>Email:</strong></td>
                                        <td><a href="mailto:rkc.trainings@gmail.com">rkc.trainings@gmail.com</a></td>
                                    </tr>
                                    <tr>
                                        <td><i class="lni lni-map-marker"></i> <strong>Address:</strong></td>
                                        <td>Jl. Wonosari Km.6 No.5 Bantul, DIY</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

@include('sections.footer')

@endsection

<style>
    .contact-info {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .contact-info li {
        font-size: 18px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }
    .contact-info i {
        color: #007bff;
        margin-right: 10px;
        font-size: 20px;
    }
    .contact-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .contact-table td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        font-size: 18px;
    }
    .google-map {
        margin-bottom: 20px;
    }
    .google-map iframe {
        width: 100%;
        border: 0;
        height: 450px;
    }
    .contact-table a {
        text-decoration: none;
        color: inherit;
    }
    .slide {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .slide.active {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var slides = document.querySelectorAll('.slide');
        slides.forEach(function(slide) {
            slide.classList.add('active');
        });
    });
</script>
