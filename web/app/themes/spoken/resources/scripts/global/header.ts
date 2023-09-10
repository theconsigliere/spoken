import { headerMobile } from './header/headerMobile'
import { headerOnScroll } from './header/headerOnScroll'
import { headerAnimateIn } from './header/headerAnimateIn'
import { headerBackgroundChange } from './header/headerBackgroundChange'

export function header(header: HTMLElement) {
  headerAnimateIn(header as HTMLElement)
  headerMobile(header as HTMLElement)
  headerOnScroll(header as HTMLElement)

  setTimeout(() => {
    headerBackgroundChange(header as HTMLElement)
  }, 2500)
}
