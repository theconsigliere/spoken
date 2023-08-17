import { gsap } from 'gsap/all'

export function headerAnimateIn(element: HTMLElement) {
  gsap.set(element, { yPercent: -100 })

  gsap.to(element, {
    duration: 0.5,
    yPercent: 0,
    ease: 'expo.out',
    onComplete: () => {
      gsap.set(element, { clearProps: 'all' })
    }
  })
}
