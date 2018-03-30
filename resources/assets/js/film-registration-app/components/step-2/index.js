import template from './index.html'
import addDirectorForm from './form'

export default {
  template,
  data() {
    return {
      director: {},
      newDirectorIs: 'someone else'
    }
  },
  computed: {
    directors() {
      return this.$store.state.data.directors
    }
  },
  components: {
    addDirectorForm
  },
  methods: {
    onSubmit(data) {
      console.log('submit')
    },
    remove(director) {
      console.log('delete')
    },
    beforeOpen(e) {
      if (e.params) this.director = e.params.director
    },
    closed(e) {
      this.director = {}
    }
  }
}
