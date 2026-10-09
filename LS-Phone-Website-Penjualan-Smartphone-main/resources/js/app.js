import './bootstrap';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper, { Navigation, Pagination } from 'swiper';

// Slider utama
new Swiper('.mySwiper', {
  modules: [Navigation, Pagination],
  loop: true,
  navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
  pagination: { el: '.swiper-pagination', clickable: true },
});

// Slider testimoni
new Swiper('.testiSwiper', {
  modules: [Navigation],
  slidesPerView: 3,
  spaceBetween: 30,
  navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
});
