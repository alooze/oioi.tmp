import validators from '../common/forms/validation'
import { removeErrors } from '../common/forms/errors'

let stepsIndicators, stepsContent, validator, currentStep

export default function init() {
  [stepsIndicators, stepsContent] = ['[data-steps-indicators]', '[data-steps-content]'].map(s => document.querySelector(s))
  validator = validators['register-form']
  currentStep = 1;

  [...document.querySelectorAll('[data-to-step]')].forEach(element => {
    element.addEventListener('click', () => onSetStepClick(+element.dataset.toStep))
  })

  document.getElementById('register-form').addEventListener('submit', e => {
    if (currentStep === 1 && ! firstStepHasErrors(validator.errors)) {
      e.preventDefault()
      removeErrors(validator.form)
      setStep(2)
    }
  })
}

function onSetStepClick(step) {
  if (step === 2) {
    validator._validateForm(null)
    if (firstStepHasErrors(validator.errors)) return
    removeErrors(validator.form)
  }
  setStep(step)
}

export function setStep(step) {
  const selector = `[data-step="${step}"]`

  currentStep = step

  stepsIndicators.querySelector('.active').classList.remove('active')
  stepsContent.querySelector('[data-step].active').classList.remove('active')

  stepsIndicators.querySelector(selector).classList.add('active')
  stepsContent.querySelector(selector).classList.add('active')
}

export const getCurrentStep = () => currentStep

export function firstStepHasErrors(errors) {
  return errors.map(err => !!err.element.closest('[data-step="1"]'))
    .some(val => val === true)
}
