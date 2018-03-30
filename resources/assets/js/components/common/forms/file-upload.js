const form = document.querySelector('.dashboard__info-form')

if (form) {
  form.addEventListener('change', e => {
    if (e.target.matches('input[type=file]') && e.target.files && e.target.files[0]) {
      const container = e.target.closest('.dashboard__info-file')

      container.classList.add('active')
      container.querySelector('.form__file-previews').innerHTML = `
          <i class="fa fa-close" aria-hidden="true"></i>
          <span>${e.target.files[0].name}</span>
      `
    }
  })

  form.addEventListener('click', e => {
    if (e.target.matches('.form__file-previews .fa-close')) {
      const container = e.target.closest('.dashboard__info-file')

      container.classList.remove('active')
      container.querySelector('input[type=file]').value = null
      container.querySelector('.form__file-previews').innerHTML = ''
    }
  })
}
