import debounce from 'lodash.debounce'

const [searchForm, questionsList, showAll] = [
  'search-questions-form',
  'questions-list',
  'show-all-questions'
].map(id => document.getElementById(id))

const questions = [...questionsList.children]
let filteredQuestions = questions
const MAX_VISIBLE = 3

const filterQuestions = q => questions.filter(
  el => el.firstElementChild.textContent.toLowerCase().includes(q.toLowerCase())
)

const renderQuestions = (elems, max = MAX_VISIBLE) => {
  questionsList.innerHTML = ''
  if (elems.length > max) {
    showAll.querySelector('.count').textContent = `(${elems.length - max})`
  }
  showAll.hidden = elems.length <= max
  elems.slice(0, max).forEach(el => questionsList.appendChild(el))
}

searchForm.addEventListener('submit', e => {
  e.preventDefault()
  filteredQuestions = filterQuestions(e.target.query.value)
  renderQuestions(filteredQuestions)
})

searchForm.query.addEventListener('input', debounce(e => {
  filteredQuestions = filterQuestions(e.target.value)
  renderQuestions(filteredQuestions)
}, 400))

showAll.addEventListener('click', e => {
  renderQuestions(filteredQuestions, 1000)
})

renderQuestions(questions)
