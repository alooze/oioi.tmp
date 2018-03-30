/* eslint import/first: "off" */
/* global $ */

window.$ = window.jQuery = require('jquery')
import 'fullpage.js'
import 'fullpage.js/dist/jquery.fullpage.min.css'
import * as whatIAmSlider from './what-i-am/slider'
import * as howIWorkSlider from './how-i-work/slider'
import initSliderMousewheelControls from './slider-mousewheel-controls'
import * as nav from './navbar'

let autoScrollingDisabled = false

const toTitleCase = str => str.charAt(0).toUpperCase() + str.slice(1)

$('#fullpage').fullpage({
  fitToSection: false,
  anchors: ['header', 'what-i-am', 'how-i-work', 'benefits', 'faq', 'contact', 'footer'],
  menu: '.navbar--not-top',
  // verticalCentered: false,

  afterRender() {
    // console.log('afterRender --')
  },
  onLeave(index, nextIndex, direction) {
    // console.log('onLeave --', index, nextIndex, direction)

    direction === 'up' && nextIndex !== 1 ? nav.pin() : nav.unpin()
  },
  afterLoad(anchorLink, index) {
    // console.log('afterLoad --', anchorLink, index)

    const { setAllowScrolling, setAutoScrolling } = $.fn.fullpage

    function afterLastSlide(direction) {
      $.fn.fullpage[`moveSection${toTitleCase(direction)}`]()
      setAllowScrolling(true)
    }
    $('.fp-section:eq('+(index-1)+')').addClass('loaded').siblings().removeClass('loaded');
    if (index === 2) {
      setAllowScrolling(false)
      autoScrollingDisabled = true;
      howIWorkSlider.setStart()
      initSliderMousewheelControls(whatIAmSlider, afterLastSlide)
    } else if (index === 3) {
      setAllowScrolling(false)
      autoScrollingDisabled = true;
      initSliderMousewheelControls(howIWorkSlider, afterLastSlide)
    } else if (index === 4) {
      howIWorkSlider.setStart()
    }

    if (index > 3 && !autoScrollingDisabled) {
      setAutoScrolling(false)
      autoScrollingDisabled = true
    } else if (index <= 3 && autoScrollingDisabled) {
      setAutoScrolling(true)
      autoScrollingDisabled = false
    }
  }
})
