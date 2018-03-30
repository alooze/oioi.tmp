import Choices from 'choices.js'
import 'choices.js/assets/styles/css/choices.min.css'

const selects = init()

export default selects

window.selects = selects

export function init() {
  return Array.prototype.reduce.call(
    document.querySelectorAll('[data-choices]'),
    (acc, el) => {
      const choices = new Choices(el, {
        shouldSort: false,
        // searchEnabled: el.dataset.searchEnabled,
        // searchPlaceholderValue: el.dataset.searchPlaceholderValue || null,
        search: el.dataset.searchEnabled,
        addItems: el.dataset.addItems,
        itemSelectText: '',
        regexFilter: new RegExp('\\S'),
        classNames: {
          containerOuter: el.dataset.classNamesContainerOuter || 'choices'
        },
        fuseOptions: {
          threshold: 0.0,
          location: 0
        }
      })
        choices.id = el.id;
        let choicesList = choices.config.choices;
        let filteredList = choicesList.filter(el => el.value.length > 0);
        choices.setChoices(filteredList, 'value', 'label', true);

      choices.passedElement.dataset.id = choices.id

      return Object.assign(acc, { [choices.id]: choices })
    }, {}
  )
}
