import template from './index.html'
import addProducerForm from '../step-1/form'
import addDirectorForm from '../step-2/form'

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1)
}

export default {
  template,
  data() {
    return {
      selectedPerson: {},
      newPersonIs: 'someone else'
    }
  },
  props: ['role'], // producer, director, writer, dop
  computed: {
    persons() {
      return this.$store.state.data[this.role + 's']
    },
    addFormComponent() {
      return `add${this.capitalizedRole}Form`
    },
    capitalizedRole() {
      return capitalizeFirstLetter(this.role)
    }
  },
  components: {
    addProducerForm,
    addDirectorForm
    // TODO: other forms
  },
  methods: {
    onSubmit(data) {
      const action = data.id ? 'updatePerson' : 'addPerson'
      this.$store.dispatch(action, {data, role: this.role})
      this.$modal.hide('add-form')
    },
    remove(person) {
      this.$store.dispatch('removePerson', {person, role: this.role})
      this.$modal.hide('delete-dialog')
    },
    beforeOpen(e) {
      if (e.params) this.selectedPerson = e.params.person
    },
    closed(e) {
      this.selectedPerson = {}
    },
    isMe(user) {
      return false
    }
  }
}
