@push('styles')
<style>
.sliding-gallery-wrapper {
    overflow: hidden;
    width: 100%;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
    align-items: center;
}

.sliding-gallery {
    display: flex;
    transition: transform 1s ease;
    height: 200px;
    padding: 50px;
}

.gallery-article {
    flex: 0 0 100%;
    text-align: center;
    padding: 10px;
}

.gallery-image {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    border-radius: 10px;
}

.article-info {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 10px;
    border-radius: 5px;
}

.image-wrapper-container {
    overflow: hidden;
    position: relative;
    width: 100%;
    display: flex;
}

.image-wrapper {
    display: flex;
    transition: transform 1.5s ease;
    width: auto;
    justify-content: center;
    align-items: center;
    height: 150px;
}

.sliding-image {
    flex: 0 0 calc(20% - 10px);
    width: calc(20% - 10px);
    max-width: calc(20% - 10px);
    max-height: 250px; /* Adjust the height of each image in the bottom wrapper */
    object-fit: cover;
    margin: 5px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

.sliding-image:hover {
    transform: scale(1.05);
}

.sliding-image.selected {
    border: 3px solid white; /* Add a white border to the selected image */
}

.main-image {
    padding: 0 100px;
}

.main-image img {
    width: 100%;
    max-height: 500px;
    object-fit: contain;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.btn {
    cursor: pointer;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    color: white;
    font-weight: bold;
}

.btn-primary:disabled {
    background-color: #cccccc;
    cursor: not-allowed;
}

</style>

@endpush

@extends('layouts.layout')
@section('content')

@section('content')
    @include('sections.header')

        <main id="trainings">
            <div id="training-events" class="container my-5">
                <div class="col-lg-12">
                    
                    @if ($trainingevents->isNotEmpty())
                    <div class="row justify-content-center mb-3">
                        <div class="col-1 d-flex align-items-center">
                            <button id="slide-left" class="btn btn-primary" disabled>&#9664;</button>
                        </div>
                        <div class="col-10">
                            <div class="sliding-gallery-wrapper">
                                <div class="sliding-gallery">
                                    <div class="image-header article-info">
                                        <h1 id="main-image-header">Header of main image</h1>
                                        <p id="main-image-description">Paragraph of main image</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 d-flex align-items-center">
                            <button id="slide-right" class="btn btn-primary">&#9654;</button>
                        </div>
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="main-image text-center">
                            <img id="main-image" src="placeholder.jpg" alt="Main Image" class="img-fluid lazyload">
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="image-wrapper-container">
                                <div class="image-wrapper"></div>
                            </div>
                        </div>
                    </div>
                    
                    @else
                    <div class="row">
                        <div class="alert alert-warning text-center" style="background-color: #FFFDD0; width: 100%; margin: 20px auto;">
                            <p class="text-center">No training events available.</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </main>

    @include('sections.footer')
@endsection


@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const gallery = $('.sliding-gallery');
        const wrapper = $('.image-wrapper');
        const mainImage = $('#main-image');
        const mainImageHeader = $('#main-image-header');
        const mainImageDescription = $('#main-image-description');

        const trainingEvents = @json($trainingevents);
        const eventImages = [];
        let currentPathIndex = 0;
        let currentImageIndex = 0;
        let slideInterval;
        let slideWrapperInterval;
        const visibleImagesCount = 3;

        function fetchImages(event, callback) {
            $.ajax({
                url: '{{ route('fetch-images') }}',
                method: 'GET',
                data: { folderPath: event.path },
                success: callback,
                error: () => callback([])
            });
        }

        function updateGallery() {
            const event = trainingEvents[currentPathIndex];
            const images = eventImages[currentPathIndex] || [];

            mainImage.attr('src', images[0] || 'placeholder.jpg');
            mainImageHeader.text(event.title);
            mainImageDescription.text(event.description);

            wrapper.empty();
            images.slice(0, visibleImagesCount).forEach((src, index) => {
                const img = $(`<img src="${src}" alt="Image ${index}" class="sliding-image lazyload">`);
                img.click(() => {
                    mainImage.attr('src', src);
                    wrapper.find('.sliding-image').removeClass('selected');
                    img.addClass('selected');
                });
                wrapper.append(img);
            });

            wrapper.find('.sliding-image').first().addClass('selected'); // Add border to first image

            $('#slide-left').prop('disabled', currentPathIndex === 0);
            $('#slide-right').prop('disabled', currentPathIndex === trainingEvents.length - 1);

            if (images.length > visibleImagesCount) {
                slideWrapperImages(images);
            } else {
                clearInterval(slideWrapperInterval);
            }
        }

        function slideImages() {
            clearInterval(slideInterval);
            const images = eventImages[currentPathIndex];
            if (images.length > 1) {
                currentImageIndex = 0;
                slideInterval = setInterval(() => {
                    currentImageIndex = (currentImageIndex + 1) % images.length;
                    mainImage.attr('src', images[currentImageIndex]);
                    wrapper.find('.sliding-image').removeClass('selected');
                    wrapper.find('.sliding-image').eq(currentImageIndex).addClass('selected');
                }, 4000);
            }
        }

        function slideWrapperImages(images) {
            clearInterval(slideWrapperInterval);
            let currentWrapperIndex = 0;
            slideWrapperInterval = setInterval(() => {
                currentWrapperIndex = (currentWrapperIndex + 1) % images.length;
                const visibleImages = images.slice(currentWrapperIndex, currentWrapperIndex + visibleImagesCount);
                wrapper.empty();
                visibleImages.forEach((src, index) => {
                    const img = $(`<img src="${src}" alt="Image ${index}" class="sliding-image lazyload">`);
                    img.click(() => {
                        mainImage.attr('src', src);
                        wrapper.find('.sliding-image').removeClass('selected');
                        img.addClass('selected');
                    });
                    wrapper.append(img);
                });
                if (visibleImages.length < visibleImagesCount) {
                    const additionalImages = images.slice(0, visibleImagesCount - visibleImages.length);
                    additionalImages.forEach((src, index) => {
                        const img = $(`<img src="${src}" alt="Image ${index}" class="sliding-image lazyload">`);
                        img.click(() => {
                            mainImage.attr('src', src);
                            wrapper.find('.sliding-image').removeClass('selected');
                            img.addClass('selected');
                        });
                        wrapper.append(img);
                    });
                }
            }, 2000);
        }

        trainingEvents.forEach((event, index) => {
            fetchImages(event, (images) => {
                eventImages[index] = images;
                if (index === 0) {
                    updateGallery();
                    slideImages();
                }
            });
        });

        $('#slide-left').click(() => {
            if (currentPathIndex > 0) {
                currentPathIndex--;
                updateGallery();
                slideImages();
            }
        });

        $('#slide-right').click(() => {
            if (currentPathIndex < trainingEvents.length - 1) {
                currentPathIndex++;
                updateGallery();
                slideImages();
            }
        });
    });
</script>

@endpush

