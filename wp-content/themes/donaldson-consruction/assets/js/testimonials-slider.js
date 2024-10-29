$(document).ready(() => {
  $('.testimonials-slider').slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: true,
    draggable: true,
    infinite: true,
    swipe: true
  });

  $('.testimonial-slide').removeAttr('style');
  $('.slick-dots').removeAttr('style');
});