import template from './preview.html'

export default {
  template,
  computed: {
    data() {
      return this.$store.state.data
    },
    country() {
      return this.$store.state.countries[this.data.country]
    }
  },
  filters: {
    currency: value => value.toLocaleString(undefined, {
      style: 'currency',
      currency: 'USD'
    })
  }
}
