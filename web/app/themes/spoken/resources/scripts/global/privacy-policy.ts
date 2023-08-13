import gsap from 'gsap/all'

export default class privacyPolicy {
  DOM: {
    el: HTMLElement
    button: HTMLElement | null
    days: number | null
  }

  closeEvent!: () => void

  constructor() {
    this.DOM = {
      el: document.querySelector('.js-privacy-policy') as HTMLElement,
      button: null,
      days: null
    }

    if (this.DOM.el) {
      this.DOM.button = this.DOM.el.querySelector('.js-button') as HTMLElement
      this.DOM.days = parseInt(this.DOM.el.dataset.duration || '0')
    }

    gsap.set(this.DOM.el, { autoAlpha: 0, yPercent: 100 })
    this.init()
  }

  init() {
    this.showprivacyPolicy()
    // after preloader wait 1 secs then show privacy policy box
  }

  addEventListeners() {
    this.closeEvent = this.close.bind(this)
    if (this.DOM.button) this.DOM.button.addEventListener('click', this.closeEvent, false)
  }

  close() {
    return gsap.to(this.DOM.el, {
      autoAlpha: 0,
      yPercent: 100,
      duration: 1.2,
      ease: 'expo.out',
      onComplete: () => {
        if (this.DOM.el.parentNode !== null) {
          this.DOM.el.parentNode.removeChild(this.DOM.el)
        }
      }
    })
  }

  show(element: HTMLElement) {
    setTimeout(() => {
      gsap.to(element, {
        autoAlpha: 1,
        yPercent: 0,
        duration: 0.8,
        ease: 'expo.in'
      })
    }, 1000) //Show the div

    this.addEventListeners()
  }

  showprivacyPolicy() {
    if (this.DOM.days != null) {
      // if days set to 1 show pop up everytime
      if (this.DOM.days === 1) {
        localStorage.last = Date.now()
        this.show(this.DOM.el) //Show the div because you haven't ever shown it before.
      } else {
        if (localStorage.last) {
          if ((localStorage.last - Date.now()) / (1000 * 60 * 60 * 24 * this.DOM.days) >= 1) {
            //Date.now() is in milliseconds, so convert it all to days, and if it's more than 1 day, show the div
            this.show(this.DOM.el) //Show the div
            localStorage.last = Date.now() //Reset your timer
          }
        } else {
          localStorage.last = Date.now()
          this.show(this.DOM.el) //Show the div because you haven't ever shown it before.
        }
      }
    }
  }
}
