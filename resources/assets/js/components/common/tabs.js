Array.prototype.forEach.call(
  document.querySelectorAll('[data-toggle="tab"]'),
  tab => tab.addEventListener('click', e => {
    e.preventDefault()

    const active = tab.closest('[role="tablist"]').querySelector('.active')
    if (active) {
      active.classList.remove('active')
      const tabPane = document.querySelector(active.getAttribute('href'))
      if (tabPane) tabPane.classList.remove('active')
    }

    tab.classList.add('active')
    const newTabPane = document.querySelector(tab.getAttribute('href'))
    if (newTabPane) newTabPane.classList.add('active')
  })
)
