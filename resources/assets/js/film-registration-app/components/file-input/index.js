import template from './index.html'

export default {
  template,
  props: ['name', 'accept', 'initialFilename', 'labelBlock', 'dropzone', 'label', 'span'],
  data() {
    return {
      filename: this.initialFilename
    }
  },
  methods: {
    onChange(e) {
      const { files } = e.target

      if (files && files[0]) {
        this.filename = files[0].name
      }
    },
    onRemoveClick() {
      this.$refs.input.value = null
      this.filename = ''
    }
  }
}
