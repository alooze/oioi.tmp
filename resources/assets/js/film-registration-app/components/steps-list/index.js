import template from './index.html'

export default {
  template,
  props: ['stepIndex'],
  data() {
    return {
      steps: ['General Info', 'Producer', 'Director', 'Writer', 'DOP', 'Budget', 'Detailed Info']
    }
  },
  methods: {
    isCompleted(index) {
      return this.$store.getters.stepCompleted(index)
    }
  }
}
