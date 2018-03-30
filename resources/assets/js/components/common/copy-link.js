import Clipboard from 'clipboard'

const clipboard = new Clipboard('.copy')

clipboard.on('success', e => {
  e.trigger.classList.add('copy-after')
  e.trigger.textContent = 'Copied'

  setTimeout(() => {
    e.trigger.classList.remove('copy-after')
    e.trigger.textContent = 'Copy'
  }, 3000)
})
