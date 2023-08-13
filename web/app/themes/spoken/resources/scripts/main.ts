import '@styles/main.css'
import { global } from './global'
import { modules } from './modules'

global()

// run modules after preloader has run
// window.addEventListener('preloader', (e: Event) => {})
/**
 * Import the modules and execute them
 * Modules can be either .js or .ts files but must stick to one or the other for all modules
 * (this is a limitation of the dynamic import syntax in Rollup/Vite)
 */

modules.forEach(({ selector, exportedFunction, fileName }): void => {
  const elements: NodeListOf<Element> = document.querySelectorAll(selector)
  if (elements.length > 0) {
    import(`./modules/${fileName}.ts`).then((importedModule: any): void => {
      elements.forEach((element: Element) => {
        importedModule[exportedFunction](element)
      })
    })
  }
})
