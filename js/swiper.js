var swiper = new Swiper(".images-container", {
  effect: "coverflow",
  grabcursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  loop: true,
  coverfloweffect: {
    rotate: 0,
    strech: 0,
    depth: 200,
    modifier: 3,
    slideShadows: true,
  },
  pagination: {
    el: ".swiper-pagination",
  },
});
