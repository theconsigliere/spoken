import { gsap } from 'gsap/all'

export function preloader(app: HTMLElement | null) {
  const preloader = document.querySelector('.js-preloader') as HTMLElement | null
  const background = document.querySelector('.js-preloader-background') as HTMLElement | null
  if (!preloader) return
  const spinner = preloader.querySelector('.js-spinner') as HTMLElement
  const circle = spinner.querySelector('.js-circle')
  const text = spinner.querySelector('.js-text')

  // custom event to run after preloader has run
  const preloaderEvent = new CustomEvent('preloader', {
    bubbles: true
  })

  gsap.set(app, { y: -window.innerHeight })

  const preloaderTl = gsap.timeline({
    onComplete: () => {
      const preloaderOut = gsap.timeline({
        onComplete: () => {
          preloader.remove()
          window.dispatchEvent(preloaderEvent)
        }
      })

      preloaderOut
        .to(background, { delay: 1.5, autoAlpha: 0, duration: 0.75, ease: 'linear' })
        .to(
          preloader,
          {
            yPercent: -100,
            delay: 0.75,
            duration: 1.8,
            ease: 'expo.out'
          },
          0
        )
        .to(
          app,
          {
            y: 0,
            delay: 0.25,
            duration: 1.8,
            ease: 'expo.out'
          },
          0
        )
    }
  })

  preloaderTl
    .to(circle, { rotate: 3600, duration: 0.9, ease: 'expo.out' })
    .to(text, { rotate: -360, duration: 1.1, ease: 'power1.out' }, 0)
}
