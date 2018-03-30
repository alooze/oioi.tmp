import Vuex from 'vuex'
import axios from 'axios'
import camelcaseKeys from 'camelcase-keys'
import { showNotif } from 'js/components/common/notifs'

const store = new Vuex.Store({
  state: {
    data: {
      steps: {},
      producers: [],
      directors: [],
      writers: [],
      dops: []
      // ...other form data
    },
    formSubmited: false,
    countries: []
  },
  mutations: {
    addPerson(state, {data, role}) {
      state.data[role + 's'] = [...state.data[role + 's'], data]
    },
    updatePerson(state, {data, role}) {
      state.data[role + 's'] = state.data[role + 's'].map(person => person.id === data.id ? data : person)
    },
    removePerson(state, {data, role}) {
      state.data[role + 's'] = state.data[role + 's'].filter(person => person.id !== data.id)
    },
    completeStep(state, index) {
      state.data.steps[Object.keys(state.data.steps)[index]] = true
    },
    uncompleteStep(state, index) {
      state.data.steps[Object.keys(state.data.steps)[index]] = false
    },
    submitForm(state) {
      state.formSubmited = true
    }
  },
  getters: {
    stepCompleted: state => index => {
      return state.data.steps[Object.keys(state.data.steps)[index]]
    },
    allStepsCompleted(state) {
      return Object.values(state.data.steps).every(val => val === true)
    }
  },
  actions: {
    loadData({state}) {
      axios('/api/film').then(
        res => { state.data = camelcaseKeys(res.data, {deep: true}) },
        console.error
      )
    },
    loadCountries({state}) {
      axios('/api/countries').then(
        res => { state.countries = res.data },
        console.error
      )
    },
    addPerson({commit}, payload) {
      // axios.post('/api/producers', data).then(res => {
      commit('addPerson', payload)
      showNotif('Producer added')
      // }, console.error)
    },
    updatePerson({commit}, payload) {
      // axios.patch('/api/producers', data).then(res => {
      commit('updatePerson', payload)
      showNotif('Producer updated')
      // }, console.error)
    },
    removePerson({commit}, payload) {
      // axios.delete(`/api/producers/${data.id}`).then(res => {
      commit('removePerson', payload)
      showNotif('Producer removed')
      // }, console.error)
    },
    submitStep({commit}, {stepIndex, data}) {
      axios.post('http://httpbin.org/post', data).then(res => {
        console.log(`step ${stepIndex} submitted:`, res.data)
        commit('completeStep', stepIndex)
        showNotif('Information saved')
      }, console.error)
    },
    submitForm({commit}) {
      commit('submitForm')
    }
  }
})

export default store
