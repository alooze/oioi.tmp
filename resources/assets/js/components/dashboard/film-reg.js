import axios from 'axios'
import selects from '../common/forms/selects'
import { loadCities } from '../common/forms/get-cities'

const url = '/films/director/getPerson';

[...document.querySelectorAll('#js__delete-person')].forEach(
  el => el.addEventListener('click', e => {
    const pid = e.target.dataset.pid

    axios.get(url, {params: {pid}})
      .then(res => {
        const {id, firstname, lastname} = res.data
        document.getElementById('js__delete-person-id').value = id
        document.getElementById('js__delete-person-name').textContent = `${firstname} ${lastname}`
      })
      .catch(console.error) // eslint-disable-line
  })
);

[...document.querySelectorAll('#js__edit-person')].forEach(
  el => el.addEventListener('click', e => {
    const pid = e.target.dataset.pid

    axios.get(url, {params: {pid}})
      .then(res => {
        const person = res.data
        const form = document.querySelector((person.is_me) ? 'form#form-me-edit' : 'form#form-someone-else-edit')

        // set person id
        form.pid.value = person.id

        // populate text fields
        Object.entries(person).forEach(([key, value]) => {
          const field = form[key]
          if (field && typeof field === 'object' && field.tagName === 'INPUT') field.value = value
        })

        // set active tab
        const activeForm = form.parentElement.querySelector('.tab-pane.active')
        const activeTab = form.parentElement.querySelector('.active[data-toggle="tab"]')
        if (activeForm) activeForm.classList.remove('active')
        if (activeTab) activeTab.classList.remove('active')
        form.classList.add('active')
        form.parentElement.querySelector(`[href="#${form.id}"]`).classList.add('active')

        // populate person city & country
        const countrySelect = selects[form.id + '-country']
        const citySelect = selects[form.id + '-city']

        if (countrySelect) countrySelect.setValueByChoice(person.country)
        // TBD: if cities more than 50, they are not rendered, so can't select one
        if (citySelect) loadCities(person.country, citySelect).then(() => citySelect.setValueByChoice(+person.city))
      })
      .catch(console.error) // eslint-disable-line
  })
)
