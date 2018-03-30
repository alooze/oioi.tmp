import template from './index.html'
import addProducerForm from './form'

export default {
  template,
  data() {
    return {
      producer: {},
      newProducerIs: 'someone else'
    }
  },
  computed: {
    producers() {
      return this.$store.state.data.producers
    }
  },
  components: {
    addProducerForm
  },
  methods: {
    onSubmit(data) {
      const action = data.id ? 'updateProducer' : 'addProducer'
      this.$store.dispatch(action, data)
      this.$modal.hide('add-form')
    },
    remove(producer) {
      this.$store.dispatch('removeProducer', producer)
      this.$modal.hide('delete-dialog')
    },
    beforeOpen(e) {
      if (e.params) this.producer = e.params.producer
    },
    closed(e) {
      this.producer = {}
    },
    isMe(user) {
      return false
    }
  }
}
