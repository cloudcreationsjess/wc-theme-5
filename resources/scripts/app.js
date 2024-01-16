import domReady from '@roots/sage/client/dom-ready';
import Swiper from 'swiper/bundle';
import 'select2';

/**
 * Application entrypoint
 */
domReady(async () => {
  projectsSlide();
  servicesSlide();
  accordion();
  modalPop();
  selectChange();
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

// function blockAllow() {
//   const allowedEmbedBlocks = ['vimeo', 'youtube'];
//   wp.blocks.getBlockVariations('core/embed').forEach(function (blockVariation) {
//     if (-1 === allowedEmbedBlocks.indexOf(blockVariation.name)) {
//       wp.blocks.unregisterBlockVariation('core/embed', blockVariation.name);
//     }
//   });
// }

function selectChange() {
  $('b[role="presentation"]').hide();
  $('.select2-selection__arrow').append(
    '<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">\n' +
      '  <defs>\n' +
      '    <style>\n' +
      '      .cls-1 {\n' +
      '      fill: none;\n' +
      '      stroke: #000;\n' +
      '      stroke-linecap: round;\n' +
      '      stroke-linejoin: round;\n' +
      '      }\n' +
      '    </style>\n' +
      '  </defs>\n' +
      '  <g id="Layer_1-2" data-name="Layer 1">\n' +
      '    <g id="Icon_feather-plus" data-name="Icon feather-plus">\n' +
      '      <path id="Path_54" data-name="Path 54" class="cls-1" d="m11,.5v21"/>\n' +
      '      <path id="Path_55" data-name="Path 55" class="cls-1" d="m.5,11h21"/>\n' +
      '    </g>\n' +
      '  </g>\n' +
      '</svg>\n',
  );
}
