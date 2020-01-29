var newsSwiper = new Swiper(".news-slider", {
    centeredSlides: false,
    direction: 'vertical',
    effect: 'scroll',
    slidesPerView: 2,
    loop: true,
    autoplay: {
        delay: 5000,
    },
});

var swiper = new Swiper(".blog-slider", {
    centeredSlides: false,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    },
    parallax: true,
    speed: 600,
    spaceBetween: 20,
    slidesPerView: 3,
    breakpoints: {
        1024: {
            spaceBetween: 14,
            slidesPerView: 3,
        },
        767: {
            spaceBetween: 14,
            slidesPerView: 1,
        },
        360: {
            centeredSlides: true,
            spaceBetween: 10,
            slidesPerView: 1,
        }
    }
});