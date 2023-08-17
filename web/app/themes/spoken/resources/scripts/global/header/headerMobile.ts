import { gsap } from 'gsap/all'

export function headerMobile(el: HTMLElement) {
  let mm = gsap.matchMedia()
  const navIcon = el.querySelector('.js-nav-icon') as HTMLButtonElement
  const mobileMenu = document.querySelector('.js-mobile-menu') as HTMLElement
  const mobileLogo = document.querySelector('.js-logo') as HTMLElement
  const dropdowns = [...Array.from(mobileMenu.querySelectorAll('.js-mobile-dropdown'))] as HTMLElement[]
  const subMenus = [...Array.from(mobileMenu.querySelectorAll('.js-mobile-submenu'))] as HTMLElement[]
  const underlines = [...Array.from(mobileMenu.querySelectorAll('.js-underline'))] as HTMLElement[]
  const navItems = [...Array.from(mobileMenu.querySelectorAll('.js-nav-item'))] as HTMLElement[]
  const body = document.querySelector('body') as HTMLElement

  let headerState: string | null = null

  const animationTl = gsap.timeline({
    onComplete: () => {
      navIcon.disabled = false
      gsap.set(underlines, { clearProps: 'all' })
      gsap.set(navItems, { clearProps: 'all' })
    }
  })

  gsap.set(underlines, { xPercent: -100 })
  gsap.set(navItems, { yPercent: 25, autoAlpha: 0 })

  // remove all mobile menu classes on resize
  mm.add('(min-width: 992px)', () => {
    navIcon.classList.remove('js-active')
    mobileMenu.classList.remove('js-open')
    removeMobileMenu()
  })

  function removeMobileMenu() {
    window.lenis ? window.lenis.start() : (body.style.overflow = 'auto')

    animationTl
      .fromTo(
        navItems,
        { yPercent: 0, autoAlpha: 1 },
        { duration: 0.15, autoAlpha: 0, yPercent: 25, stagger: 0.1, ease: 'power2.out' }
      )
      .fromTo(underlines, { xPercent: 0 }, { duration: 0.15, xPercent: -100, stagger: 0.1, ease: 'power2.out' }, 0)

    if (headerState) el.setAttribute('data-state', headerState)
    headerState = null

    dropdowns.forEach(dropdown => {
      dropdown.classList.remove('js-open')
    })

    subMenus.forEach(submenu => {
      submenu.style.height = '0px'
    })
  }

  function openMobileMenu() {
    navIcon.classList.toggle('js-active')
    mobileMenu.classList.toggle('js-open')
    navIcon.disabled = true

    if (mobileMenu.classList.contains('js-open')) {
      //open
      window.lenis ? window.lenis.stop() : (body.style.overflow = 'hidden')
      headerState = el.getAttribute('data-state')
      el.setAttribute('data-state', 'transparent')

      animationTl
        .fromTo(
          underlines,
          { xPercent: -100 },
          { delay: 0.5, duration: 0.25, xPercent: 0, stagger: 0.1, ease: 'power2.out' }
        )
        .fromTo(
          navItems,
          { yPercent: 25, autoAlpha: 0 },
          { delay: 0.3, duration: 0.35, autoAlpha: 1, yPercent: 0, stagger: 0.1, ease: 'expo.out' },
          0
        )
    } else {
      //close
      removeMobileMenu()
    }
  }

  function toggleDropdown(e: Event) {
    e.preventDefault()
    let currentMenu: number
    const target = e.currentTarget as HTMLElement
    // find selected toggle in array position
    const currentTarget = dropdowns.indexOf(target)

    // remove all over open targets
    dropdowns.forEach((dropdown, index) => {
      // find current target in loop

      if (index == currentTarget) {
        // if current target isn't open, open it then close everything else
        if (!dropdown.classList.contains('js-open')) return dropdown.classList.add('js-open')
      }
      dropdown.classList.remove('js-open')
    })

    //SORT OUT SUBMENUS

    let targetSubMenu = target.parentElement?.parentElement?.querySelector('.js-mobile-submenu') as HTMLElement
    if (!targetSubMenu) return

    // find selected toggle in array position
    currentMenu = subMenus.indexOf(targetSubMenu)

    subMenus.forEach((submenu: HTMLElement, index: number) => {
      // find current target in loop
      if (index == currentMenu) {
        // if current target isn't open, open it then close everything else
        if (submenu.offsetHeight <= 0) {
          const inner = submenu.querySelector('.js-mobile-inner') as HTMLElement
          return (submenu.style.height = `${inner.getBoundingClientRect().height}px`)
        }
      }

      submenu.style.height = '0px'
    })
  }

  navIcon.addEventListener('click', openMobileMenu)

  dropdowns.forEach((dropdown: HTMLElement) => {
    dropdown.addEventListener('click', toggleDropdown)
  })
}
