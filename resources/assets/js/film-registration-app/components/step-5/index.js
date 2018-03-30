import template from './index.html'
import mapState from 'js/helpers/map-state'

const fields = ['totalBudget', 'finSecured', 'finRequired']

export default {
  template,
  computed: mapState(fields),
  $_veeValidate: {
    validator: 'new'
  },
  methods: {
    onSubmit() {
      this.$validator.validateAll().then(result => {
        if (result) this.$store.dispatch('submitStep', {stepIndex: 5, data: new FormData(this.$refs.form)})
      })
    }
  }
}
