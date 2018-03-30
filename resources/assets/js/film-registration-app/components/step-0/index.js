import template from './index.html'
import mapState from 'js/helpers/map-state'

const fields = ['title', 'basedOn', 'country', 'projectStatus', 'genre', 'pitchLink', 'pitchPass', 'pitchFile']

export default {
  template,
  data() {
    return {
      basedOnOptions: ['Novel', 'True Story', 'Established Work', 'Real Events', 'Invented by Screenwriter'],
      projectStatusOptions: ['Pre-development', 'Announced', 'Pre-production', 'Filming', 'Post-production', 'Completed', 'Released'],
      genreOptions: ['Action', 'Animation', 'Comedy', 'Documentary', 'Family', 'Film-Noir', 'Horror', 'Musical', 'Romance', 'Sport', 'War', 'Biography', 'Crime', 'Drama', 'Fantasy', 'History', 'Music', 'Mystery', 'Sci-Fi', 'Thriller', 'Western']
    }
  },
  computed: Object.assign({}, mapState(fields), {
    countries() {
      return this.$store.state.countries
    }
  }),
  $_veeValidate: {
    validator: 'new'
  },
  methods: {
    onSubmit() {
      this.$validator.validateAll().then(result => {
        if (result) this.$store.dispatch('submitStep', {stepIndex: 0, data: new FormData(this.$refs.form)})
      })
    }
  }
}
