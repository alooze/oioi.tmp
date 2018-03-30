// button without type attribute will be of type submit
const submit = '[type=submit], button:not([type=button]):not([type=reset])'
const error = '.invalid-feedback'

export function showErrors(form, errors) {
  // form.querySelector(submit).disabled = true
  form.classList.add('has-errors')
  errors.forEach(err => showFieldError(err))
}

export function removeErrors(form) {
  // form.querySelector(submit).disabled = false
  form.classList.remove('has-errors');
  [...form.querySelectorAll('.form-group.has-error')].forEach(el => removeFieldError(el))
}

function showFieldError(err) {
  const formGroup = err.element.closest('.form-group')

  if (!formGroup.querySelector(error)) formGroup.append(errorEl())

  formGroup.classList.add('has-error')
  formGroup.querySelector(error).textContent = err.message.replace('_',' ');
}

function errorEl() {
  const el = document.createElement('div')
  el.classList.add('invalid-feedback')
  return el
}

function removeFieldError(formGroup) {
  formGroup.classList.remove('has-error')
  formGroup.removeChild(formGroup.querySelector(error))
}
