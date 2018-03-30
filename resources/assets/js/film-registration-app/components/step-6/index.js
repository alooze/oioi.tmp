import template from './index.html'
import mapState from 'js/helpers/map-state'
import FilmPreview from './preview'

const fields = ['logline', 'synopsis', 'additional', 'thumbnail', 'artwork', 'script', 'finPlan', 'detailedBudget', 'terms']

export default {
  template,
  computed: Object.assign({}, mapState(fields), {
    allStepsCompleted() {
      return this.$store.getters.allStepsCompleted
    }
  }),
  $_veeValidate: {
    validator: 'new'
  },
  components: {
    FilmPreview
  },
  methods: {
    onSubmit() {
      this.$validator.validateAll().then(result => {
        if (result) this.$store.dispatch('submitStep', {stepIndex: 6, data: new FormData(this.$refs.form)})
      })
    },
    submitFilm() {
      this.$store.dispatch('submitForm')
      this.$modal.hide('submit-film-dialog')
    }
  }
}
