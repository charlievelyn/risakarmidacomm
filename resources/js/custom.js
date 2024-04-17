// // alert('bello boo');

// // Function to toggle the menu
// function toggleMenu() {
//     $('.navbar-trigger').click(function () {
//         $(this).toggleClass('active');
//         console.log("Clicked menu");
//         $("#mainListDiv").toggleClass("show_list");
//         $("#mainListDiv").fadeIn();
//     });
// }

// // Function to toggle navbar transparency based on scroll
// function toggleNavbarTransparency() {
//     var navbar = document.querySelector('.navbar');
//     var scrolled = window.scrollY;

//     if (scrolled > 0) {
//         navbar.classList.add('colored');
//         navbar.classList.remove('transparent');
//     } else {
//         navbar.classList.add('transparent');
//         navbar.classList.remove('colored');
//     }
// }

// // Call functions when the document is ready
$(document).ready(function() {
//     // toggleMenu(); // Call toggleMenu function
//     // toggleNavbarTransparency(); // Call toggleNavbarTransparency function

//     // // Add event listener for scroll event
//     // window.addEventListener('scroll', toggleNavbarTransparency);
//     // $('.show-more-btn').click(function () {
//     //     var expandableContent = this.parentElement.querySelector('.expandable-content');
//     //     expandableContent.classList.toggle('show-more');
//     // });
    const reveals = document.querySelectorAll('.reveal-section');
    const windowHeight = window.innerHeight;

    for (let i = 0; i < reveals.length; i++) {
        let revealTop = reveals[i].getBoundingClientRect().top;
        let revealBottom = reveals[i].getBoundingClientRect().bottom;

        if (revealTop >= 0 && revealBottom <= windowHeight) {
            // Check if the entire div is covered within the screen
            if (revealTop >= 0 && revealBottom <= windowHeight) {
                reveals[i].classList.add('flying-section');
            }
        }
    }

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
        const reveals = document.querySelectorAll('.reveal-section');
        const windowheight = window.innerHeight;
        const revealpoint = 100;

        let scrollTop = $(this).scrollTop();
        // let contentOffsetTop = $('header#navbar-section').offset().top;

        if (scrollTop > 0) {
            $('header#navbar-section').addClass('shadow');
        } else {
            $('header#navbar-section').removeClass('shadow');
        }

        if(reveals.length > 0) {
            for (let i = 0; i < reveals.length; i++) {
                let revealtop = reveals[i].getBoundingClientRect().top;
    
                if (revealtop < windowheight - revealpoint) {
                    reveals[i].classList.add('flying-section');
                } else {
                    reveals[i].classList.remove('flying-section');
                }
            }
        }
    });

    // //Quill . place it on different files.
    // var quill = new Quill('#editor', {
    //     theme: 'snow'
    // });
});