import { headerMobile } from './header/headerMobile'
import { headerOnScroll } from './header/headerOnScroll'

export function header(header: HTMLElement) {
  // headerMobile(header as HTMLElement)
  headerOnScroll(header as HTMLElement)
}
