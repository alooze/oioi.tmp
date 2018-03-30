import { hideExtraComments } from './comments'


document.addEventListener('click', function (e) {
  const tab = e.target.closest('[data-toggle-question-collapse]')
  if (!tab) return

  const question = e.target.closest('.question')
  question.classList.toggle('active')

  const panel = tab.nextElementSibling
  panel.style.maxHeight = panel.style.maxHeight ? null : panel.scrollHeight + 'px'

  if (question.classList.contains('active')) {
    hideExtraComments(question)
  }
})
