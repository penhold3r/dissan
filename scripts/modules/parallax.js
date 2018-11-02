/**
 *
 * @param {HTMLElemnt} img - image element
 */
const parallax = img => {
  window.addEventListener("scroll", () => {
    const scrolled = window.pageYOffset;
    const top = img.getBoundingClientRect().top;
    const viewport =
      window.innerHeight || document.documentElement.clientHeight;
    const position = (top * 100) / viewport;

    isInViewport(img) &&
      (img.style.objectPosition = position < 0 ? "50% 0%" : `50% ${position}%`);
  });
};

const isInViewport = el => {
  const viewport = el.getBoundingClientRect();

  return (
    viewport.bottom >= 0 &&
    viewport.left >= 0 &&
    viewport.top <=
      (window.innerHeight || document.documentElement.clientHeight) &&
    viewport.right <=
      (window.innerWidth || document.documentElement.clientWidth)
  );
};

export default parallax;
