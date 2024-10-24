document.addEventListener('DOMContentLoaded', (e) => {
  gsap.registerPlugin(ScrollTrigger);

  // Fade in hero image slider
  gsap.fromTo(
    '.slider',
    {
      opacity: 0,
    },
    {
      delay: 0.05,
      duration: 0.75,
      ease: 'power2.inOut',
      opacity: 1,
      scrollTrigger: {
        trigger: '.slider'
      }
    }
  );

  // Fade in hero image slider
  gsap.fromTo(
    '.mission-statement-section',
    {
      opacity: 0,
    },
    {
      delay: 0.25,
      duration: 0.75,
      ease: 'power2.inOut',
      opacity: 1,
      scrollTrigger: {
        trigger: '.mission-statement-section'
      }
    }
  );

  // Slide in top brand block heading
  gsap.fromTo(
    '.home-brand-block-heading-primary',
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
        trigger: '.home-brand-block-heading-primary'
      }
    }
  );

  // Fade in featured projects
  gsap.fromTo(
    '.featured-projects-section',
    {
      opacity: 0,
    },
    {
      delay: 0.20,
      duration: 0.75,
      ease: 'power2.inOut',
      opacity: 1,
      scrollTrigger: {
        trigger: '.featured-projects-section'
      }
    }
  );

  // Slide in bottom brand block heading
  gsap.fromTo(
    '.home-brand-block-heading-secondary',
    {
      opacity: 0,
      x: 200
    },
    {
      delay: 0.15,
      duration: 0.75,
      ease: 'power2.inOut',
      opacity: 1,
      x: 0,
      scrollTrigger: {
        trigger: '.home-brand-block-heading-secondary'
      }
    }
  );

  // Fade in testimonials section
  gsap.fromTo(
    '.testimonials-section',
    {
      opacity: 0,
    },
    {
      delay: 0.20,
      duration: 0.75,
      ease: 'power2.inOut',
      opacity: 1,
      scrollTrigger: {
        trigger: '.testimonials-section'
      }
    }
  );
});