/**
 * Each module in this file should be considered independent of
 * templates or individual routes. Instead, each module should be
 * dynamically imported based on a test criteria such as the
 * presence of a DOM element with a given data attribute.
 */

export const modules: Module[] = [
  {
    selector: '[data-module="voucher"]',
    exportedFunction: 'voucher',
    fileName: 'voucher'
  },
  {
    selector: '[data-module="testimonial-slider"]',
    exportedFunction: 'testimonialSlider',
    fileName: 'testimonial-slider'
  },
  {
    selector: '[data-module="footer-gallery"]',
    exportedFunction: 'footerGallery',
    fileName: 'footer-gallery'
  },
  {
    selector: '[data-module="split-text"]',
    exportedFunction: 'splitText',
    fileName: 'split-text'
  },
  {
    selector: '[data-module="hero-main"]',
    exportedFunction: 'heroMain',
    fileName: 'hero-main'
  },
  {
    selector: '[data-module="hero-page-header"]',
    exportedFunction: 'heroPageHeader',
    fileName: 'hero-page-header'
  }
]

interface Module {
  /** The CSS selector used to identify the module in the HTML. */
  selector: string

  /** The name of the function that the module exports */
  exportedFunction: string

  /** The file name that contains the module's code, without an extension. This should be a .js or .ts file */
  fileName: string
}
