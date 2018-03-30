Array.prototype.forEach.call(
  document.querySelectorAll('[data-toggle="option"]'),
  el => el.addEventListener('click', e => {
    if (el.classList.contains('active')) return

    const control = document.querySelector(`[name=${el.getAttribute('data-name')}`)
    control.value = el.getAttribute('data-value')

    el.parentElement.querySelector('.active').classList.remove('active')
    el.classList.add('active')

    document.querySelector('[data-registering-as]').textContent = el.getAttribute('data-value')
  })
)
