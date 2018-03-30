export default function (form, errors) {
  if (!+form.fin_required.value.replace(/\s/g, '').length) {
    errors.push({
      element: form.fin_required,
      message: 'Please, fill in this field'
    })
  }
  if (!+form.total_budget.value.replace(/\s/g, '').length) {
    errors.push({
      element: form.total_budget,
      message: 'Please, fill in this field'
    })
  }else{
      if (+form.fin_secured.value.replace(/\s/g, '') + +form.fin_required.value.replace(/\s/g, '') != +form.total_budget.value.replace(/\s/g, '')) {
          errors.push({
              element: form.fin_required,
              message: 'Something is wrong with provided sums. Please recalculate.'
          },{
              element: form.fin_secured,
              message: ''
          })
      }
  }
}