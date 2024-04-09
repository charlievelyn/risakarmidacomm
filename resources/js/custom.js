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

// Call functions when the document is ready
$(document).ready(function() {
    // toggleMenu(); // Call toggleMenu function
    // toggleNavbarTransparency(); // Call toggleNavbarTransparency function

    // // Add event listener for scroll event
    // window.addEventListener('scroll', toggleNavbarTransparency);
    // $('.show-more-btn').click(function () {
    //     var expandableContent = this.parentElement.querySelector('.expandable-content');
    //     expandableContent.classList.toggle('show-more');
    // });

    $(window).scroll(function() {
        var navbar = $('.navbar-section');
        var scrollPosition = $(window).scrollTop();

        if(scrollPosition > 0){
            navbar.addClass('transparent-bg');
        } else {
            navbar.removeClass('transparent-bg');
        }
    });

    //Quill
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
});