export function sendForm(form) {
  return new Promise((resolve, reject) => {
    let xhr = new XMLHttpRequest()
    xhr.open('POST', form.action)
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
    // xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute("content"));
    xhr.onerror = e => {
      reject(new Error('Network Error'))
    }
    xhr.onload = e => {
      if (e.target.status !== 200) reject(new Error(`Request failed with status code ${e.target.status} (${e.target.statusText})`))
      resolve(e)
    }
    xhr.send(new FormData(form))
  })
}

export function getRules(form, rules = []) {
  [...form.querySelectorAll('[data-rules]')].forEach(
    el => rules.push({
      name: el.name,
      display: el.getAttribute('data-display'),
      rules: el.getAttribute('data-rules'),
    })
  )
    return rules
}

export function setIds(form, rules) {
  rules.forEach(({ name }) => {
    if (form[name].getAttribute('id')) return
    form[name].setAttribute('id', name + '-' + Math.round(Math.random() * 100000))
  })
}
