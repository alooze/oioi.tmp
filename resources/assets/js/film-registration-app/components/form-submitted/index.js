import template from './index.html'

export default {
  template,
  computed: {
    title() {
      return this.$store.state.data.title
    }
  }
}
