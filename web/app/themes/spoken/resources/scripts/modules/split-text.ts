import { gsap, ScrollTrigger, SplitText } from 'gsap/all'
gsap.registerPlugin(SplitText, ScrollTrigger)

export function splitText(text: HTMLElement) {
  let mm = gsap.matchMedia()
  const copyText = text.innerHTML
  let newText: SplitText
  let innerText: SplitText
  const parentSection = text.closest('section')
  let titleAnim: gsap.core.Timeline

  console.log(parentSection)

  // just on dekstop
  mm.add('(min-width: 992px)', () => {
    setup()
    runTextAnim()
  })

  mm.add('(max-width: 991px)', () => {
    window.removeEventListener('resize', resize)
  })

  function resize() {
    titleAnim.kill()
    newText.revert()
    innerText.revert()
    // clear styles
    text.innerHTML = copyText

    //  setup()
  }

  function setup() {
    // console.log('re assign')
    newText = new SplitText(text, {
      type: 'lines',
      linesClass: 'lineChild'
    })
    innerText = new SplitText(text, {
      type: 'lines',
      linesClass: 'lineParent'
    })

    gsap.set(newText.lines, { yPercent: 100 })
  }

  function runTextAnim() {
    titleAnim = gsap.timeline({
      scrollTrigger: {
        trigger: parentSection,
        start: 'top center',
        end: 'center center',
        scrub: 1,
        invalidateOnRefresh: true
        // markers: true
      },
      defaults: {
        stagger: 0.15,
        ease: 'expo.out'
      }
    })

    titleAnim.fromTo(
      newText.lines,
      {
        yPercent: 100
      },
      {
        ease: 'power1.inOut',
        yPercent: 0,
        stagger: {
          each: 0.03,
          from: 0
        }
      }
    )
  }

  //   window.addEventListener('resize', setup)
}
