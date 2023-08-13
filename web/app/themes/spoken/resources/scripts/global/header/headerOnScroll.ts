export function headerOnScroll(header: HTMLElement): void {
  let lastDirection: number = 0

  function hideShowHeader(e: any) {
    lastDirection === 1 ? header.classList.add('js-hide') : header.classList.remove('js-hide')
    lastDirection = e.direction <= 0 ? 0 : e.direction
  }

  if (window.lenis) window.lenis.on('scroll', hideShowHeader)
}
