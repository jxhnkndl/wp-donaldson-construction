document.addEventListener('DOMContentLoaded', (e) => {
  gsap.registerPlugin(ScrollTrigger);

  // Slide in top brand block heading
  gsap.fromTo(
    '.help-content',
    {
      opacity: 0,
      x: -200
    },
    {
      delay: 0.15,
      duration: 0.75,
      ease: 'power2.inOut',
      opacity: 1,
      x: 0,
      scrollTrigger: {
        trigger: '.help-content'
      }
    }
  );
});