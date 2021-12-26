$(document).ready(function(){
    $(".toggle-close, .overlay").on('click', function (){
        $(".sidebar-wrapper").removeClass('active');
        $(".overlay").removeClass('active');
    });
    $(".toggle-open").on('click', function (){
        $(".sidebar-wrapper").addClass('active');
        $(".overlay").addClass('active');
    })
})

// toggle function for other pages
// $(document).ready(function(){
//
//     $(".toggle-btn").on('click', function(){
//
//         $(".menu-list-wrapper").toggleClass('active-menu-list-wrapper');
//     });
// });

// toggle button function for dashboard
// $(document).ready(function(){
//
//     $('.toggle-open').on('click', function (){
//         $('.sidebar-wrapper').css('display', 'block');
//         $('.toggle-open').css('display', 'none');
//     });
//
//     $('.toggle-close').on('click', function (){
//         $('.sidebar-wrapper').css('display', 'none');
//         $('.toggle-open').css('display', 'block');
//     });
//
// });

//add show to header on scroll
// const navBar = document.querySelector(".header-wrapper");
// const Height = 7000
// const navHeight = navBar.getBoundingClientRect().height;
// window.addEventListener("scroll", () => {
//
//     const scrollHeight = window.pageYOffset;
//
//     if (scrollHeight > 550){
//
//         navBar.classList.add("header-wrapper-shadow");
//     }else {
//         navBar.classList.remove("header-wrapper-shadow");
//     }
// });