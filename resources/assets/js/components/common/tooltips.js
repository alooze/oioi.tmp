import tippy from 'tippy.js'
import 'tippy.js/dist/tippy.css'

let active = null

const tooltips = Array.prototype.map.call(
  // document.querySelectorAll('[data-tippy-html]'),
  document.querySelectorAll('[data-tippy-html]'),
  el => {
    const tip = tippy(el, {
      placement: 'right',
      arrow: true,
      theme: 'custom',
      trigger: 'mouseenter',
      sticky: true,
      interactive: true,
      animation: 'fade',
      updateDuration: 0,
      popperOptions: el.hasAttribute('data-tippy-prevent-overflow-disabled')
        ? {
          modifiers: {
            preventOverflow: {
              enabled: false
            },
            hide: {
              enabled: false
            }
          }
        }
        : {},
      onShow() {
        active = el
      },
      onHide() {
        active = null
      }
    })

    return tip
  }
)

// Close active tip on "Close" btn click
document.addEventListener('click', e => {
  if (! e.target.closest('.tippy-tooltip .tooltip-close') || ! active) return
  active._tippy.hide()
})

export default tooltips
