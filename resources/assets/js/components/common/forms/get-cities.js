import axios from 'axios'
import selects from './selects'

let cache = null
let lookupTimeout = null
let lookupDelay = 300
let cities = null;

[...document.querySelectorAll('[name=country]')].forEach(countriesEl => {
  const citiesEl = countriesEl.closest('form').city // depended select
  if (!citiesEl || !citiesEl.dataset.id) return

  const cities = selects[citiesEl.dataset.id]

  countriesEl.addEventListener('change', e => {
      loadCities(e.target.value, cities)

  })
  if (countriesEl.value) {
    if(!citiesEl.value) loadCities(countriesEl.value, cities)
  } else {
    cities.disable()
  }
})

export function loadCities (country, _cities) {

    return axios.get(`/api/cities?country=${country}`).then(
    ({ data }) => {
      cities = _cities
      cities.enable()
      cities.input.value = ''
      cities.element.removeEventListener('search', onSearch)
      cities.element.removeEventListener('choice', onChoice)
      cities.config.noChoicesText = 'No choices to choose from'

      // if it's more than 50 results, cache them and render only search query results, else render all results at once
      if (data.length > 50) {
        cache = data.slice()
        data = []
        cities.element.addEventListener('search', onSearch) // Trigger an API lookup when the user pauses after typing
        cities.element.addEventListener('choice', onChoice) // We want to clear the API-provided options when a choice is selected
        cities.config.noChoicesText = 'Start typing to show results...'
      }
      cities.setChoices(data, 'value', 'label', true)
    },
    console.error // eslint-disable-line
  )
}

function onSearch() {
  clearTimeout(lookupTimeout)
  lookupTimeout = setTimeout(lookup, lookupDelay)
}

function onChoice() {
  cities.setChoices([], 'value', 'label', true)
}

function lookup() {
  const regexp = new RegExp(cities.input.value, 'i')
  const data = cities.input.value === '' ? [] : cache.filter(el => regexp.test(el.label)).slice(0, 50)

  cities.setChoices(data, 'value', 'label', true)
}
