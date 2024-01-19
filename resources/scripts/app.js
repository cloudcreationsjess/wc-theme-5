import domReady from '@roots/sage/client/dom-ready';
import Swiper from 'swiper/bundle';
import 'select2';

/**
 * Application entrypoint
 */
domReady(async () => {
  projectsSlide();
  servicesSlide();
  featuredSlide();
  accordion();
  modalPop();
  selectChange();
  mobilePopout();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

function projectsSlide() {
  // Initialize Swiper
  const swiper = new Swiper('.swiper', {
    freeMode: true,
    slidesPerView: 'auto',
    spaceBetween: 15,
    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 25,
      },
      768: {
        slidesPerView: 'auto',
        spaceBetween: 15,
      },
    },
  });
}

function servicesSlide() {
  // Initialize Swiper
  const swiper2 = new Swiper('.services-slider', {
    freeMode: true,
    slidesPerView: 'auto',
    spaceBetween: 15,
    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true,
    },

    breakpoints: {
      0: {
        slidesPerView: 'auto',
        centeredSlides: true,
      },
      768: {
        slidesPerView: 'auto',
        centeredSlides: false,
      },
    },
  });
}

function featuredSlide() {
  // Initialize Swiper
  const swiper3 = new Swiper('.swiper-featured-posts', {
    freeMode: true,
    centeredSlides: true,
    initialSlide: 1,
    // centeredSlidesBounds: true,
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

  $('.modal-close').on('click', function () {
    var modal = $('.modal-container');
    hideModal(modal);
  });

  // Event handler for closing the modal
  $(document).on('mouseup', function (event) {
    var modal = $('.modal-container');
    var modalBackdrop = $('.modal-backdrop');
    var modalClose = $('.modal-close');

    // Check if the click is outside the modal
    if (modalBackdrop.is(event.target) || modalClose.is(event.target)) {
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

//load when document ready
jQuery(document).ready(function ($) {
  customizeGallery();
});

function customizeGallery() {
  // Function to calculate position based on the pattern
  function calculatePosition(index) {
    let columnSpan = 1;
    let rowSpan = 1;

    // Reset pattern after the 12th item
    if (index >= 12) {
      index = index % 12;
    }

    if (index === 0 || index === 9) {
      rowSpan = 2;
      columnSpan = 1;
    } else if (index === 5) {
      columnSpan = 2;
      rowSpan = 2;
    } else if (index === 6) {
      rowSpan = 2;
      columnSpan = 1;
    }

    return { columnSpan, rowSpan };
  }

  // Function to add styles to the gallery block
  function customizeGalleryBlock() {
    // Target the core/gallery block
    const galleryBlocks = document.querySelectorAll('.wp-block-gallery');

    // Loop through each gallery block
    galleryBlocks.forEach((galleryBlock) => {
      // Get the images in the gallery block
      const images = galleryBlock.querySelectorAll('.wp-block-image');

      // Loop through each image and apply custom styles
      images.forEach((image, index) => {
        const { columnSpan, rowSpan } = calculatePosition(index);

        // Apply custom styles to each image
        image.style.gridColumn = `span ${columnSpan}`;
        image.style.gridRow = `span ${rowSpan}`;
        image.classList.add(`gallery-item-${index}`);
      });
    });
  }

  customizeGalleryBlock();
}

function mobilePopout() {
  $(document).ready(function () {
    // Check if #nav-btn and #popout elements exist
    var $navBtn = $('#nav-btn');
    var $popout = $('#popout');

    if ($navBtn.length && $popout.length) {
      // Hide the menu initially
      $popout.hide();

      // Initialize the menu state
      var menuVisible = false;

      // Function to toggle menu visibility
      function toggleMenu() {
        // Toggle the visibility of the menu
        if (menuVisible) {
          // Fade out the menu
          $popout.fadeOut('fast').removeClass('is-active');
          $navBtn.removeClass('is-active');
          $('body').removeClass('is-active');
        } else {
          // Fade in the menu
          $popout.fadeIn('fast').addClass('is-active');
          $navBtn.addClass('is-active');
          $('body').addClass('is-active');
        }

        // Update the menu state
        menuVisible = !menuVisible;
      }

      // Handle click on #nav-btn
      $navBtn.click(toggleMenu);

      // Handle click on menu item with children
      $('.menu-item-has-children svg').on('click', function () {
        // Toggle the is-active class for the parent
        $(this).parent().toggleClass('is-active');
      });
    }
  });
}
