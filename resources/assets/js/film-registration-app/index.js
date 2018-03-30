
import 'babel-polyfill'
import Vue from 'vue/dist/vue.esm.js'
import Vuex from 'vuex'
import VModal from 'vue-js-modal'
import VeeValidate from 'vee-validate'
import stepsList from './components/steps-list'
import step0 from './components/step-0'
import step5 from './components/step-5'
import step6 from './components/step-6'
import FormSubmitted from './components/form-submitted'
import fileInput from './components/file-input'
import formGroup from './components/form-group'
import deleteDialog from './components/delete-dialog'
import addForm from './components/add-form'
import personsList from './components/persons-list'

Vue.use(VModal)
Vue.use(VeeValidate, { inject: false })
Vue.use(Vuex)

Vue.component('file-input', fileInput)
Vue.component('formgroup', formGroup)
Vue.component('delete-dialog', deleteDialog)
Vue.component('add-form', addForm)
Vue.component('persons-list', personsList)

Vue.filter('filename', value => value && value.split('/').pop()) // TODO
Vue.filter('capitalize', value => value.charAt(0).toUpperCase() + value.slice(1))

const app = new Vue({
  el: '#app',
  data: {
    stepIndex: 3,
    pendingRequests: 0
  },
  store: require('./store').default,
  components: {
    stepsList,
    step0,
    step1: {template: '<persons-list role="producer"></persons-list>'},
    step2: {template: '<persons-list role="director"></persons-list>'},
    step3: {template: '<persons-list role="writer"></persons-list>'},
    step4: {template: '<persons-list role="dop"></persons-list>'},
    step5,
    step6,
    FormSubmitted
  },
  computed: {
    step() {
      return `step${this.stepIndex}`
    },
    isLoading() {
      return this.pendingRequests > 0
    },
    formSubmitted() {
      return this.$store.state.formSubmited
    }
  },
  created() {
    this.$store.dispatch('loadData')
    this.$store.dispatch('loadCountries')
  }
})
