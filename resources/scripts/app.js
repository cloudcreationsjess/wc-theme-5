import domReady from '@roots/sage/client/dom-ready';
import Swiper from 'swiper/bundle';

/**
 * Application entrypoint
 */
domReady(async () => {
  projectsSlide();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

function projectsSlide() {
  // Initialize Swiper
  const swiper = new Swiper('.swiper', {
    slidesPerView: 'auto',
    spaceBetween: 15,
    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true,
    },
  });
}
