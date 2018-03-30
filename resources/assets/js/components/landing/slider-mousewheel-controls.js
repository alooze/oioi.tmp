import debounce from 'lodash.debounce'
import * as nav from './navbar'

export default function initSliderMousewheelControls(slider, cb) {

  const event = navigator.userAgent.toLowerCase().includes('firefox') ? 'wheel' : 'mousewheel'
  let handler = e => {
    if(!$(slider.className).hasClass('loaded')) return false;
    const direction = e.deltaY < 0 ? 'up' : 'down'
    let isBeginning, isEnd
    if (direction === 'up') {
      isBeginning = !slider.prev()
      nav.pin()
    } else if (direction === 'down') {
      isEnd = !slider.next()
      nav.unpin()
    }

    if (isBeginning || isEnd) {
      window.removeEventListener(event, handler)
      cb(direction)
    }
  }

  handler = debounce(handler, 200)
  window.addEventListener(event, handler)
}
