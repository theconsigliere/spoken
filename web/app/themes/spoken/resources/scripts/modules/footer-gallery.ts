import Swiper, { Autoplay } from 'swiper'
// configure Swiper to use modules
Swiper.use([Autoplay])
import 'swiper/css'

export function footerGallery(element: HTMLElement) {
  const slider = element.querySelector('.js-swiper') as HTMLElement

  const swiper = new Swiper(slider, {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    centerInsufficientSlides: true,
    centeredSlidesBounds: true,
    grabCursor: true,
    slidesPerView: 2,
    spaceBetween: 10,
    // If we need pagination
    autoplay: {
      delay: 1500
    },
    speed: 2000,
    breakpoints: {
      768: {
        slidesPerView: 3.5,
        spaceBetween: 10
      },
      992: {
        slidesPerView: 4.5,
        spaceBetween: 20
      }
    }
  })
}
