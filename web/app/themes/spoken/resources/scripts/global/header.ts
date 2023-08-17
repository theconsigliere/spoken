import { headerMobile } from './header/headerMobile'
import { headerOnScroll } from './header/headerOnScroll'
import { headerAnimateIn } from './header/headerAnimateIn'

export function header(header: HTMLElement) {
  headerAnimateIn(header as HTMLElement)
  headerMobile(header as HTMLElement)
  headerOnScroll(header as HTMLElement)
}
