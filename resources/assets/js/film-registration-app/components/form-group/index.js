export default {
  template: `
    <div :class="{ 'dashboard__info-form-wrap': true, 'has-error': errors.has(name) }">
      <slot></slot>
      <div v-show="errors.has(name)" class="invalid-feedback">{{ errors.first(name) }}</div>
    </div>
  `,
  props: ['name'],
  inject: ['$validator']
}
