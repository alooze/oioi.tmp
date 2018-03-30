import template from './notif.html'

let timerId
let container

init()

function init() {
  const templateEl = document.createElement('template')
  templateEl.innerHTML = template
  container = templateEl.content.firstChild
  container.querySelector('.info-close').addEventListener('click', hideNotif)
}

export function showNotif(message = '') {
  clearTimeout(timerId)
  document.body.appendChild(container)
  container.classList.add('fadeInDown')
  container.querySelector('.info-saved__descr span').textContent = message
  timerId = setTimeout(hideNotif, 3000)
}

export function hideNotif() {
  clearTimeout(timerId)
  container.classList.remove('fadeInDown')
  container.classList.add('fadeOutUp')
  // after animation
  setTimeout(() => {
    document.body.removeChild(container)
    container.classList.remove('fadeOutUp')
  }, 400)
}

window.showNotif = showNotif
