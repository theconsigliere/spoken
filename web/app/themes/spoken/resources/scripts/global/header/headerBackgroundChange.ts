import { gsap, ScrollTrigger } from 'gsap/all'
gsap.registerPlugin(ScrollTrigger)

export function headerBackgroundChange(el: HTMLElement) {
  // get all sections that have a data-header-state attribute
  const headerStateSections = document.querySelectorAll('[data-header-state]') as NodeListOf<HTMLAnchorElement>
  const body = document.querySelector('body') as HTMLElement

  // on page load check if page has a header state

  headerStateSections.forEach((section: HTMLElement) => {
    // one scrolltrigger for all viewPort
    ScrollTrigger.create({
      trigger: section,
      start: 'top top',
      end: `bottom ${el.offsetHeight}px`,
      onUpdate: self => updateValues(self, section)
      // markers: true
    })
  })

  function updateValues(self: any, section: HTMLElement) {
    // console.log(section)
    if (section.dataset.headerState) el.setAttribute('data-state', section.dataset.headerState)
  }
}
