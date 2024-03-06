import { gsap, ScrollTrigger } from 'gsap/all'
gsap.registerPlugin(ScrollTrigger)

export function voucher(element: HTMLElement) {
  const imageGroup = element.querySelector('.js-image-group') as HTMLImageElement
  let mm = gsap.matchMedia()

  mm.add('(min-width: 992px)', () => {
    ScrollTrigger.create({
      trigger: imageGroup,
      start: 'top 5%',
      pin: true,
      pinSpacing: false
    })
  })
}
