$(document).ready(function() {




	
  $("div.blog-post").hover(
    function() {
        $(this).find("div.content-hide").slideToggle("fast");
    },
    function() {
        $(this).find("div.content-hide").slideToggle("fast");
    }
  );

  $('.flexslider').flexslider({
    animation: "slide",
    slideshowSpeed: 5000,
    prevText: '',
    nextText: '',
    controlNav: true,
    directionNav: true,
    start: function () {
        console.log("FlexSlider initialized successfully!");
    },
    after: function (slider) {
        // Hide all captions
        $('.slider-caption').css({ opacity: 0, visibility: 'hidden' });

        // Show caption for the active slide
        $(slider.slides[slider.currentSlide])
            .find('.slider-caption')
            .css({ opacity: 1, visibility: 'visible' });
    }
});

  $('.testimonails-slider').flexslider({
    animation: 'slide',
    slideshowSpeed: 5000,
    prevText: '',
    nextText: '',
    controlNav: false
  });

  $(function(){

  // Instantiate MixItUp:

  $('#Container').mixItUp();

  

  $(document).ready(function() {
      $(".fancybox").fancybox();
    });

  });

  document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth > 992) {
        document.querySelectorAll('.navbar .dropdown').forEach(function (dropdown) {
            dropdown.addEventListener('mouseover', function () {
                const menu = this.querySelector('.dropdown-menu');
                menu.classList.add('show');
            });
            dropdown.addEventListener('mouseleave', function () {
                const menu = this.querySelector('.dropdown-menu');
                menu.classList.remove('show');
            });
        });
    }
});


});

