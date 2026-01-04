const swiperWrapper = document.querySelector(
    ".testimonial-swiper .swiper-wrapper"
);
const totalSlides = swiperWrapper.children.length;

const swiper = new Swiper(".testimonial-swiper", {
    loop: true,
    grabCursor: true,
    spaceBetween: 24,
    slidesPerView: 1,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
        },
        992: {
            slidesPerView: 3,
        },
    },
});
