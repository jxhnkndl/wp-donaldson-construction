document.addEventListener('DOMContentLoaded', () => {
  const galleryEl = document.querySelector('.project-details-grid');
  const lightboxContainerEl = document.querySelector('.lightbox-container');
  const lightboxContentEl = document.querySelector('.lightbox-content');

  // Check whether lightbox overlay is open or closed
  let isOpen = JSON.parse(galleryEl.getAttribute('aria-expanded'));
  
  // Toggle lightbox's open/closed state
  const toggleLightbox = () => {
    isOpen = !isOpen
    galleryEl.setAttribute('aria-expanded', isOpen);
  };

  // Listen for click events on images in the gallery grid
  galleryEl.addEventListener('click', (e) => {
    // Open image in lightbox overlay
    if (!isOpen && e.target.classList.contains('gallery-image')) {
      lightboxContentEl.innerHTML = ""

      const currentImgEl = e.target;
      const currentImgSrc = currentImgEl.getAttribute('src');
      const currentImgAlt = currentImgEl.getAttribute('alt');
      
      const lightboxImgContainerEl = document.createElement('div');
      lightboxImgContainerEl.classList.add('lightbox-image-container');

      const lightboxImgEl = document.createElement('img');
      lightboxImgEl.setAttribute('src', currentImgSrc);
      lightboxImgEl.setAttribute('alt', currentImgAlt);
      
      const xIcon = document.createElement('i');
      xIcon.classList.add('fa-solid');
      xIcon.classList.add('fa-x');
      xIcon.classList.add('x-icon');

      lightboxImgContainerEl.appendChild(lightboxImgEl);
      lightboxImgContainerEl.appendChild(xIcon);
      
      lightboxContentEl.appendChild(lightboxImgContainerEl);

      lightboxContainerEl.style.display = 'block';

      gsap.fromTo(
        '.lightbox-overlay',
        { opacity: 0 },
        { duration: 0.25, opacity: 0.8 }
      );

      gsap.fromTo(
        '.lightbox-content',
        { opacity: 0 },
        { duration: 0.25, opacity: 1 }
      );
      
      toggleLightbox();
    } 
  });

  // Close lightbox overlay and go back to image gallery
  lightboxContentEl.addEventListener('click', (e) => {
    console.log('clicked')
    if (isOpen) {
      console.log(123)

      gsap.fromTo(
        '.lightbox-overlay',
        { opacity: 0.8 },
        { duration: 0.25, opacity: 0 }
      );

      gsap.fromTo(
        '.lightbox-content',
        { opacity: 1 },
        { duration: 0.25, opacity: 0 }
      );

      setTimeout(() => {
        lightboxContainerEl.style.display = 'none';
      }, 300);

      toggleLightbox();
    }
  });
});

