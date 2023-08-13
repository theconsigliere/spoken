export default class Fade {
  DOM: {
    fader: HTMLElement
    anchors: HTMLCollectionOf<HTMLAnchorElement>
  }

  fadeOnLinkEvent!: () => void // add type declaration and initializer
  pageShowEvent!: (event: any) => void // add type declaration and initializer

  constructor() {
    this.DOM = {
      fader: document.querySelector('.js-page-fader') as HTMLElement,
      anchors: document.getElementsByTagName('a')
    }

    this.init()
  }

  init() {
    this.fadeInPage()
    this.addEventListeners()
  }

  pageShow(event: any) {
    if (!event.persisted) {
      return
    }

    this.DOM.fader.classList.remove('js-fade-in')
  }

  fadeInPage() {
    if (!window.AnimationEvent) {
      return
    }

    this.DOM.fader.classList.add('js-fade-out')
  }

  fadeOnLink() {
    if (!window.AnimationEvent) {
      return
    }

    for (var idx = 0; idx < this.DOM.anchors.length; idx += 1) {
      if (this.DOM.anchors[idx].hostname !== window.location.hostname) {
        continue
      }
      this.DOM.anchors[idx].addEventListener('click', function (event) {
        const fader = document.querySelector('.js-header-fader')
        const anchor = event.currentTarget as HTMLAnchorElement

        // dont run animation if we are just linking to page section
        if (anchor.href.includes('#')) return

        const listener = function () {
          window.location.href = anchor.href
          fader?.removeEventListener('animationend', listener)
        }

        if (fader) fader.addEventListener('animationend', listener)

        // event.preventDefault()
        // if (fader) fader.classList.add('fade-in')
      })
    }
  }

  addEventListeners() {
    this.fadeOnLinkEvent = this.fadeOnLink.bind(this)
    this.pageShowEvent = this.pageShow.bind(this)

    document.addEventListener('DOMContentLoaded', this.fadeOnLinkEvent)
    window.addEventListener('pageshow', this.pageShowEvent)
  }
}
