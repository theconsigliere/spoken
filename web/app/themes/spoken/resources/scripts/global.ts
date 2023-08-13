import 'lazysizes'
import { preloader } from './global/preloader'
import { smoothScroll } from './global/smooth-scroll'
import Fade from './global/fade'
import { header } from './global/header'
import privacyPolicy from './global/privacy-policy'

/**
 * Functionality here will be executed on all pages
 */

export const global = (): void => {
  const headerDOM = document.querySelector('.js-header')
  const app = document.querySelector('#website') as HTMLElement | null
  preloader(app)
  header(headerDOM as HTMLElement)

  // window.addEventListener('preloader', (e: Event) => {
  //   console.log(e)
  //   smoothScroll()
  // })

  smoothScroll()

  const transitions = new Fade()
  const policy = new privacyPolicy()
}
