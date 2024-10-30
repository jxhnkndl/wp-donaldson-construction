const bodyEl = document.querySelector('body');
const menuEl = document.querySelector('.menu-container');
const menuBarTopEl = document.querySelector('.menu-bar-top');
const menuBarBottomEl = document.querySelector('.menu-bar-bottom');
const navEl = document.querySelector('.nav-drawer');
const overlayEl = document.querySelector('.opacity-overlay');

const navLinksEl = document.querySelectorAll('.nav-links-list li');
const navInfoEl = document.querySelector('.nav-info-container');

menuEl.addEventListener('click', () => {
  // Determine whether nav drawer is open or closed
  const isOpen = JSON.parse(menuEl.getAttribute('aria-expanded'));

  // Invert the aria expanded value
  menuEl.setAttribute('aria-expanded', !isOpen);

  if (isOpen) {  
    closeNav();
  } else {
    openNav();
  }
});

overlayEl.addEventListener('click', () => {
  closeNav();
});

const openNav = () => {
  navEl.style.display = 'flex';
  overlayEl.style.display = 'block';
  
  gsap.to('.opacity-overlay', {
    duration: 0.25,
    opacity: 0.8
  });
  
  gsap.to('.nav-drawer', {
    duration: 0.25,
    opacity: 1
  });
  
  gsap.to('.menu-bar-top', {
    duration: 0.25,
    width: 30,
    height: 3,
    y: 6,
    rotation: 45
  });
  
  gsap.to('.menu-bar-bottom', {
    duration: 0.25,
    height: 3,
    y: -4,
    rotation: -45
  });

  let linkAnimationDelay = 0.2;

  navLinksEl.forEach((link, i) => {
    if (i !== 0) {
      linkAnimationDelay += 0.1;
    }

    gsap.fromTo(
      link,
      { opacity: 0, x: -40},
      { delay: linkAnimationDelay, duration: 0.25, opacity: 1, x: 0 }
    )
  });

  gsap.fromTo(
    navInfoEl,
    { opacity: 0, x: -40 },
    { delay: linkAnimationDelay += 0.2, duration: 0.25, opacity: 1, x: 0}
  )
}

const closeNav = () => {
  gsap.to('.opacity-overlay', {
    duration: 0.25,
    opacity: 0
  });

  gsap.to('.nav-drawer', {
    duration: 0.25,
    opacity: 0
  });

  gsap.to('.menu-bar-top', {
    duration: 0.25,
    width: 40,
    height: 2,
    y: 0,
    rotation: 0
  });
  
  gsap.to('.menu-bar-bottom', {
    duration: 0.25,
    height: 2,
    y: 0,
    rotation: 0
  });

  setTimeout(() => {
    navEl.style.display = 'none';
    overlayEl.style.display = 'none';
  }, 250);
}