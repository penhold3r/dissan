/**
 * 
 * @param {HTMLElemnt} img - image element 
 */
const parallax = img => {
   window.addEventListener('scroll', () => {
      const scrolled = window.pageYOffset;
      const position = scrolled;
      img.style.objectPosition = `50% ${position}%`;

      isInViewport(img) && console.log(scrolled);
   });
}

const isInViewport = el => {
   const viewport = el.getBoundingClientRect();

   return (
      viewport.bottom >= 0 &&
      viewport.left >= 0 &&
      viewport.top <= (window.innerHeight || document.documentElement.clientHeight) &&
      viewport.right <= (window.innerWidth || document.documentElement.clientWidth)
   )
}

export default parallax;