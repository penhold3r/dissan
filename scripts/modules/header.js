export const Navigation = () => {
   const links = document.querySelectorAll('.main-nav .menu-item a')

   links.forEach(link =>
      link.addEventListener('click', e => e.preventDefault())
   )
}
