import Swiper from 'swiper/bundle';

const swiper = new Swiper('.big-slider', {
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },

});

const swiperZastr = new Swiper('.zastr-info__slider', {
  slidesPerView: 2,
  spaceBetween: 30,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },

});