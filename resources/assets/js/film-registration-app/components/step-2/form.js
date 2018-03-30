import template from './form.html'
import pick from 'lodash.pick'

const model = {
  firstname: '',
  lastname: '',
  imdbLink: '',
  showreelLink: ''
}

export default {
  template,
  props: ['initialValues'],
  data() {
    return Object.assign({}, model, pick(this.initialValues, Object.keys(model)))
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
