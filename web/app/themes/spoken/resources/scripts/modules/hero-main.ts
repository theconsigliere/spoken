import { gsap } from 'gsap/all'
import { splitTextLines } from './../animations/split-text-lines'

export function heroMain(element: Element): void {
  const image = element.querySelector('.js-image') as HTMLImageElement
  const imageGroup = element.querySelector('.js-image-group') as HTMLImageElement
  const originalTitle = element.querySelector('.js-title') as HTMLElement
  const originalDesc = element.querySelector('.js-desc') as HTMLElement
  const button = element.querySelector('.js-button') as HTMLButtonElement
  const animTl = gsap.timeline({ paused: true })

  let mm = gsap.matchMedia()

  if (image) gsap.set(image, { scale: 1.5 })
  if (imageGroup) gsap.set(imageGroup, { autoAlpha: 0 })
  if (button) gsap.set(button, { autoAlpha: 0 })
  const title = splitTextLines(originalTitle)
  const desc = splitTextLines(originalDesc)

  //image
  animTl
    .to(title, { duration: 1.5, yPercent: 0, ease: 'expo.out' }, 0)
    .to(desc, { duration: 1.5, yPercent: 0, ease: 'expo.out' }, 0.25)
    .to(button, { duration: 1.5, autoAlpha: 1, ease: 'expo.out' }, 0.5)
    .to(imageGroup, { duration: 1.5, autoAlpha: 0.5, ease: 'power2.out' }, 0.5)
    .to(image, { duration: 1.8, scale: 1, ease: 'expo.out' }, 0.75)

  // if we are on home page wait for custom event 'preloaderEvent'
  if (window.location.pathname === '/') {
    window.addEventListener('preloader', () => {
      animTl.play()
    })
  } else {
    animTl.play()
  }
}
