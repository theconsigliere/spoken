import { gsap } from 'gsap'

export function headerMobile(el: HTMLElement) {
  let mm = gsap.matchMedia()
  const navIcon = el.querySelector('.js-nav-icon') as HTMLButtonElement
  const mobileMenu = document.querySelector('.js-mobile-menu') as HTMLElement
  const mobileLogo = document.querySelector('.js-logo') as HTMLElement
  const dropdowns = [...Array.from(mobileMenu.querySelectorAll('.js-mobile-dropdown'))] as HTMLElement[]
  const subMenus = [...Array.from(mobileMenu.querySelectorAll('.js-mobile-submenu'))] as HTMLElement[]
  const navItems = [...Array.from(mobileMenu.querySelectorAll('.js-nav-item'))] as HTMLElement[]
  const body = document.querySelector('body') as HTMLElement

  let headerState: string | null = null

  if (navItems) gsap.set(navItems, { autoAlpha: 0 })

  // if (navIcon) {
  //     animationTl = gsap.timeline({
  //         onComplete: () => {
  //             navIcon.disabled = false
  //             if (navItems) gsap.set(navItems, { clearProps: 'all' })
  //         }
  //     })

  //     if (navItems) gsap.set(navItems, { yPercent: 25, autoAlpha: 0 })
  // }

  // remove all mobile menu classes on resize
  mm.add('(min-width: 992px)', () => {
    if (navIcon) navIcon.classList.remove('js-active')
    if (mobileMenu) mobileMenu.classList.remove('js-open')
    if (navIcon) removeMobileMenu()
  })

  mm.add('(max-width: 991px)', () => {
    //mobile
  })

  function removeMobileMenu() {
    window.lenis ? window.lenis.start() : (body.style.overflow = 'auto')

    if (navItems) {
      gsap.to(navItems, { duration: 0.1, autoAlpha: 0, stagger: 0.1, ease: 'expo.out' })
    }

    if (headerState) el.setAttribute('data-state', headerState)
    headerState = null

    if (dropdowns)
      dropdowns.forEach(dropdown => {
        dropdown.classList.remove('js-open')
      })

    if (subMenus)
      subMenus.forEach(submenu => {
        submenu.style.height = '0px'
      })
  }

  function openMobileMenu() {
    navIcon.classList.toggle('js-active')
    mobileMenu.classList.toggle('js-open')

    // navIcon.disabled = true

    if (mobileMenu.classList.contains('js-open')) {
      //open
      window.lenis ? window.lenis.stop() : (body.style.overflow = 'hidden')
      headerState = el.getAttribute('data-state')
      el.setAttribute('data-state', 'normal')

      console.log('open menu')
      gsap.to(navItems, {
        duration: 0.6,
        autoAlpha: 1,
        stagger: 0.05,
        ease: 'expo.in'
      })
    } else {
      //close
      console.log('close menu')
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

  if (navIcon) navIcon.addEventListener('click', openMobileMenu)

  if (dropdowns) {
    dropdowns.forEach((dropdown: HTMLElement) => {
      dropdown.addEventListener('click', toggleDropdown)
    })
  }
}
