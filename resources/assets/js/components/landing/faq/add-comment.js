import Cookies from 'js-cookie'
import { delegate, qsa } from '../../../helpers'
import modals from '../../common/modals'
window.$ = window.jQuery = require('jquery')


// adding question id into add comment form
delegate(document, 'click', '[data-show-modal=add-comment-modal]', e => {
  qsa('[name=qid]').forEach(el => { el.value = e.target.dataset.id })
})


// on page load checks if cookies has qid entry, will scroll to faq section and show "add comment" modal if it does
window.addEventListener('load', e => {
  if (Cookies.get('qid')) {
    $.fn.fullpage.moveTo('faq')
    qsa('[name=qid]').forEach(el => { el.value = Cookies.get('qid') })
    modals['add-comment-loggedin-modal'].open()
    Cookies.remove('qid')
  }
})
