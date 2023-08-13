import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import Lenis from '@studio-freight/lenis'

gsap.registerPlugin(ScrollTrigger)

declare global {
  interface Window {
    lenis: any
  }
}

export function smoothScroll() {
  let mm = gsap.matchMedia()
  mm.add('(min-width: 769px)', () => {
    // Lenis smooth scrolling
    let lenis: any

    lenis = new Lenis({
      duration: 1.2,
      easing: t => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      smoothWheel: true
    })

    window.lenis = lenis

    lenis.on('scroll', ScrollTrigger.update)

    const scrollFn = (time: number) => {
      lenis.raf(time)
      requestAnimationFrame(scrollFn)
    }

    requestAnimationFrame(scrollFn)
  })
}
