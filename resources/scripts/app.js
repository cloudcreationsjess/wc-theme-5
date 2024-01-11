import domReady from '@roots/sage/client/dom-ready';
import Swiper from 'swiper/bundle';

/**
 * Application entrypoint
 */
domReady(async () => {
  projectsSlide();
  servicesSlide();
  accordion();
  modalPop();
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

function servicesSlide() {
  // Initialize Swiper
  const swiper2 = new Swiper('.services-slider', {
    slidesPerView: 'auto',
    spaceBetween: 15,
    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true,
    },
  });
}

function accordion() {
  function toggleAccordion(panel) {
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
      panel.classList.remove('open');
    } else {
      panel.style.maxHeight = panel.scrollHeight + 30 + 'px';
      panel.classList.add('open');
    }
  }

  var accordionHeaders = document.querySelectorAll('.accordion-header');

  accordionHeaders.forEach(function (header) {
    header.addEventListener('click', function () {
      var panel = this.nextElementSibling; // Get the next element which should be the panel
      toggleAccordion(panel);

      // Update aria-expanded attribute
      this.setAttribute(
        'aria-expanded',
        this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true',
      );
    });
  });
}

function modalPop() {
  // Function to show the modal
  function showModal(target) {
    $(target).fadeIn().css('display', 'flex');
  }

  // Function to hide the modal
  function hideModal(target) {
    $(target).fadeOut();
  }

  // Event handler for clicking "Learn More"
  $('.learn-more-btn').on('click', function () {
    var target = $(this).data('target');
    showModal(target);
  });

  // Event handler for closing the modal
  $(document).on('mouseup', function (event) {
    var modal = $('.modal-container');
    var modalBackdrop = $('.modal-backdrop');

    // Check if the click is outside the modal
    if (modalBackdrop.is(event.target)) {
      hideModal(modal);
    }
  });
}
