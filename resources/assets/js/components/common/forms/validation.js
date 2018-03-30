import FormValidator from 'validate-js'
import { getRules, setIds } from './helpers'
import validatorCallback from './validator-callback'
import checkName from './custom-validation-rules/name'

const validators = Array.prototype.reduce.call(
  document.querySelectorAll('[data-form-validate]'),
  (acc, form) => {
      const rules = getRules(form)
    setIds(form, rules) // validate-js requires that all form controls have an id
      form.querySelectorAll("input, select, textarea").forEach(function(el){
          el.addEventListener('change', function () {
              if(form.querySelector('button[type="submit"]').innerText == 'SAVED') form.querySelector('button[type="submit"]').innerText = 'SAVE';
          })
      })
    return Object.assign(acc, {
      [form.getAttribute('id')]: new FormValidator(form, rules, validatorCallback).
        registerCallback('check_name', checkName).setMessage('check_name', 'Please, fill the field in Latin only').
        registerCallback('check_terms', function() {
          return this.fields.terms.checked
        }).
        setMessage('check_terms', 'Please, confirm that you agree with "Terms & Conditions"')
    })
  },
  {}
)

export default validators
