const mapState = keys => keys.reduce((acc, key) => Object.assign(acc,
  {
    [key]: {
      get() {
        return this.$store.state.data[key]
      },
      set(value) {
        this.$store.state.data[key] = value
      }
    }
  }
), {})

export default mapState
