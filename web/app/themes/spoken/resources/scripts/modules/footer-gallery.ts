import Swiper, { Autoplay } from 'swiper'
Swiper.use([Autoplay])
import 'swiper/css'
import 'swiper/css/effect-fade'

export function footerGallery(element: HTMLElement) {
  const slider = element.querySelector('.js-swiper') as HTMLElement

  const swiper = new Swiper(slider, {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 2.5,
    spaceBetween: 10,
    // If we need pagination
    autoplay: {
      delay: 2500,
      disableOnInteraction: true
    },
    speed: 1000,
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
