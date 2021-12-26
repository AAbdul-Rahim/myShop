$(".owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 1000,
    smartSpeed: 1500,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsive: {
        0:{
            items: 2,
            loop: true,
        },
        768:{
            items: 3,
            loop: true,
        },
        1100:{
            items: 4,
            loop: true,
        },
        1400:{
            items: 5,
            loop: true
        }
    }
})