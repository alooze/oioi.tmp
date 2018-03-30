import axios from 'axios'
import { removeErrors, showErrors } from './errors'
import onSuccess from './onSuccess'
import { getCurrentStep, setStep, firstStepHasErrors } from '../../register/steps'
import validateBudget from './validate-budget'

// if no event passed to _validateForm, it checks for global event (IE uses the global event variable) witch breaks in FF (event is not defined)
window.event = undefined

export default function validatorCallback(errors, event) {
  try {
    addValidationOnChange.call(this)

    removeErrors(this.form)

    if (errors.length === 0 && this.form.id === 'film-budget-form') {
      validateBudget(this.form, errors)
    }

    if (errors.length) {
      showErrors(this.form, errors)
    } else if (!event) {
      // validation was called manually, not on submit
    } else if (this.form.id === 'register-form' && getCurrentStep() === 1) {
      // don't submit, procced to next step
    } else if (!this.form.getAttribute('data-form-no-ajax')) {
      event.preventDefault()
      submitForm(this.form)
    }
  } catch (err) {
    console.error(err) // eslint-disable-line
  }
}

function addValidationOnChange() {
  if (!this.wasValidated) {
    this.wasValidated = true

    for (let field in this.fields) {
      this.fields[field].element.addEventListener('change', () => this._validateForm(null))
    }
  }
}

function submitForm(form) {
  axios.post(form.action, new FormData(form)).then(
    () => onSuccess(form),
    err => {
      if (err.response.status === 422) {
        const errors = formatServerErrors(err.response.data, form)
        showErrors(form, errors)
          console.log(errors);
        if (form.id === 'register-form' && firstStepHasErrors(errors)) setStep(1)
      } else {
        console.error(err) // eslint-disable-line
      }
    }
  )
}

function formatServerErrors(errors, form) {
  return Object.entries(errors).map(([key, val]) => ({
    element: form[key],
    message: Array.isArray(val) ? val[0] : val
  }))
}
