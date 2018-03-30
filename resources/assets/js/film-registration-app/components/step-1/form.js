import template from './form.html'
import pick from 'lodash.pick'

const model = {
  id: null,
  firstname: '',
  lastname: '',
  email: '',
  phone: '',
  company: '',
  website: '',
  country: '',
  city: '',
  imdbLink: ''
}

export default {
  template,
  props: ['initialValues'],
  data() {
    return Object.assign({}, model, pick(this.initialValues, Object.keys(model)))
  },
  computed: {
    countries() {
      return this.$store.state.countries
    }
  },
  $_veeValidate: {
    validator: 'new'
  },
  methods: {
    onSubmit() {
      this.$validator.validateAll().then(result => {
        if (result) this.$emit('submit', pick(this, Object.keys(model)))
      })
    }
  }
}
