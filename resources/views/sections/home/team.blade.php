<section id="team-section" class="section reveal-section">
    <div class="container">
        <div class="skew-cc">
            @include('layouts.components.skewc', [
                'sectionheader' => 'Our Team',
                'sectionparagraph' => ''
            ])

            <div class="row content">
                <div id="teamCarousel" class="custom-team-carousel">
                    <button class="carousel-control-left" id="btnLeft">
                        <i class="lni lni-chevron-left"></i>
                    </button>
                    <div class="custom-team-carousel-inner">
                        <!-- Carousel items will be dynamically added here -->
                    </div>
                    <button class="carousel-control-right" id="btnRight">
                        <i class="lni lni-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Carousel container styles */
.custom-team-carousel {
    position: relative;
    overflow: hidden;
    width: 100%;
    padding: 0px;
    margin-bottom: 30px;
    display: flex;
    align-items: center;
}

/* Carousel inner container */
.custom-team-carousel-inner {
    display: flex;
    gap: 15px;
    transition: all 0.5s ease;
    flex-grow: 1;
    overflow: hidden;
}

/* Carousel item styles */
.custom-team-carousel-item {
    flex: 0 0 calc(33.33% - 15px);
    box-sizing: border-box;
    text-align: center;
    background-color: #ffffff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.custom-team-carousel-item img {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 8px;
}

/* Text alignment */
.custom-team-carousel-item .align-items-center {
    margin-top: 10px;
    font-size: 1rem;
    font-weight: bold;
    color: #333;
}

/* Button styles */
.carousel-control-left,
.carousel-control-right {
    border: none;
    color: #fff;
    font-size: 2rem;
    padding: 10px;
    cursor: pointer;
    border-radius: 50%;
    position: relative;
    z-index: 10;
}

.carousel-control-left,
.carousel-control-right {
    background-color: #333; /* Coral background */
    color: white; /* White icon color */
    border: none; /* Remove border */
    border-radius: 50%; /* Make buttons circular */
    width: 50px; /* Button width */
    height: 50px; /* Button height */
    display: flex; /* Center content */
    align-items: center; /* Center content */
    justify-content: center; /* Center content */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition */
    font-size: 24px; /* Increase icon size */
}

.carousel-control-left {
    margin-right: 10px;
}

.carousel-control-right {
    margin-left: 10px;
}

.carousel-control-left:hover,
.carousel-control-right:hover {
    background-color: #ff6347; /* Darker coral on hover */
    transform: scale(1.1); /* Slightly enlarge on hover */
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const teamMembers = @json($teamMembers); // Pass the team members to JavaScript
    const teamCarouselInner = document.querySelector('.custom-team-carousel-inner');
    const btnLeft = document.getElementById('btnLeft');
    const btnRight = document.getElementById('btnRight');
    const numVisibleItems = 3;
    let currentIndex = 0;

    // Function to create a carousel item
    const createCarouselItem = (member) => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('custom-team-carousel-item');

        const img = document.createElement('img');
        img.src = member.image_path;
        img.alt = member.name;

        const alignDiv = document.createElement('div');
        alignDiv.classList.add('align-items-center');
        alignDiv.textContent = member.name;

        itemDiv.appendChild(img);
        itemDiv.appendChild(alignDiv);

        return itemDiv;
    };

    // Initialize the carousel
    const initializeCarousel = () => {
        teamCarouselInner.innerHTML = ''; // Clear the carousel content

        for (let i = 0; i < numVisibleItems; i++) {
            const member = teamMembers[i];
            const item = createCarouselItem(member);
            teamCarouselInner.appendChild(item);
        }
    };

    // Function to cycle items to the right
    const cycleRight = () => {
        currentIndex = (currentIndex + 1) % teamMembers.length;

        // Remove the first item and append the next one
        teamCarouselInner.removeChild(teamCarouselInner.firstElementChild);

        const nextMemberIndex = (currentIndex + numVisibleItems - 1) % teamMembers.length;
        const nextMember = teamMembers[nextMemberIndex];
        const newItem = createCarouselItem(nextMember);

        teamCarouselInner.appendChild(newItem);
    };

    // Function to cycle items to the left
    const cycleLeft = () => {
        currentIndex = (currentIndex - 1 + teamMembers.length) % teamMembers.length;

        // Remove the last item and prepend the previous one
        teamCarouselInner.removeChild(teamCarouselInner.lastElementChild);

        const prevMemberIndex = (currentIndex) % teamMembers.length;
        const prevMember = teamMembers[prevMemberIndex];
        const newItem = createCarouselItem(prevMember);

        teamCarouselInner.prepend(newItem);
    };

    // Event listeners for buttons
    btnRight.addEventListener('click', cycleRight);
    btnLeft.addEventListener('click', cycleLeft);

    // Initialize the carousel
    initializeCarousel();

    // Set up automatic sliding
    setInterval(cycleRight, 5000); // Slide every 5 seconds
});
</script>
