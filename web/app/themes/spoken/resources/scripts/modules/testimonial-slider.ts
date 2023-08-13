import Swiper, { Pagination, Autoplay, Navigation, EffectFade } from 'swiper'
Swiper.use([Pagination, Autoplay, Navigation, EffectFade])
import 'swiper/css'
import 'swiper/css/pagination'
import 'swiper/css/navigation'
import 'swiper/css/effect-fade'

export function testimonialSlider(element: HTMLElement) {
  const slider = element.querySelector('.js-swiper') as HTMLElement
  const sliderPagination = element.querySelector('.js-pagination') as HTMLElement
  const sliderNext = element.querySelector('.js-next') as HTMLElement
  const sliderPrev = element.querySelector('.js-prev') as HTMLElement

  const swiper = new Swiper(slider, {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    effect: 'fade',
    fadeEffect: { crossFade: true },
    // If we need pagination
    pagination: {
      el: sliderPagination,
      clickable: true
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: true
    },
    speed: 1000,
    // Navigation arrows
    navigation: {
      nextEl: sliderNext,
      prevEl: sliderPrev
    }
  })
}
