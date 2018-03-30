const container = document.getElementById('user-avatar-uploader')

if (container) {
  var imgPreview = container.querySelector('.js-img-preview')
  var imgPreviewImg = imgPreview.querySelector('img')
  var input = container.querySelector('input')
  input.addEventListener('change', e => onChange(e.target))
  imgPreview.querySelector('.js-remove-img').addEventListener('click', removeImg)
  imgPreview.querySelector('.js-reload-img').addEventListener('click', () => input.click())
}

function onChange(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader()

    reader.onload = e => {
      container.classList.add('active')
      imgPreview.hidden = false
      imgPreviewImg.setAttribute('src', e.target.result)
      imgPreviewImg.setAttribute('alt', input.files[0].name)
    }

    reader.readAsDataURL(input.files[0])
  } else {
    imgPreview.hidden = true
    container.classList.remove('active')
  }
}

function removeImg() {
  input.value = null
  input.dispatchEvent(new Event('change'))
}
