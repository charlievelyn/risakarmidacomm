<section id="contactus-section" class="section reveal-section">
    <div class="container">
        <div class="skew-cc">
            @include('layouts.components.skewcc', [
                'sectionheader' => 'Contact Us',
                'sectionparagraph' => 'If you have any questions or inquiries, feel free to get in touch with us:'
                ])

            <div class="row content">
                <div class="contact-us">
                    <ul class="contact-info-list">
                        <li><i class="bi bi-telephone"></i> <span class="contact-detail">Phone: +62 81-1993-4474</span></li>
                        <li><i class="bi bi-envelope"></i> <span class="contact-detail">Email: rkc.trainings@gmail.com</span></li>
                        <li><i class="bi bi-geo-alt"></i> <span class="contact-detail">Address: Jl. Wonosari Km.6 No.5 Bantul, DIY</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    section#contactus-section {
        padding: 40px 0;
    }

    .skew-cc {
        margin-bottom: 30px;
    }

    .contact-us {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: rgba(245, 245, 245, 0.8);
        padding: 30px;
        border-radius: 10px;
    }

    .contact-info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .contact-info-list li {
        display: flex;
        align-items: center;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .contact-info-list i {
        font-size: 24px;
        color: #333;
        margin-right: 10px;
    }

    .contact-detail {
        color: #555;
    }

    .contact-info-list li:hover .contact-detail {
        color: #000;
        text-decoration: underline;
    }
</style>
@endpush
