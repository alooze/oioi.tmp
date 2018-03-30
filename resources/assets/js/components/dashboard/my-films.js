import axios from 'axios'
import modal from '../common/modals'
import { showNotif } from '../common/notifs'

let filmTitleEl
let currentAction

try {
  const deleteFilmModal = document.getElementById('delete-film-modal')
  filmTitleEl = deleteFilmModal.querySelector('.js-film-title')

  deleteFilmModal.querySelector('.js-film-delete').addEventListener('click', onFilmDelete)

  Array.prototype.forEach.call(
    document.querySelectorAll('[data-show-modal="delete-film-modal"]'),
    el => el.addEventListener('click', onModalOpen)
  )

  Array.prototype.forEach.call(
    document.querySelectorAll('[data-modal="preview-film-modal"]'),
    el => el.addEventListener('click', onPreviewOpen)
  )
} catch (err) {
  // console.error(err)
}

function onModalOpen(e) {
  filmTitleEl.textContent = e.target.dataset.title
  currentAction = e.target.dataset.action
}

function onPreviewOpen(e) {
  let  currentAction = e.target.dataset.action;
    axios.get(currentAction).then(
      (response) => {
          document.getElementById('preview-film-modal').querySelector('.modal-content-inner').innerHTML=response.data;
          modal['preview-film-modal'].open();
      },
      console.error // eslint-disable-line
  )
}

function onFilmDelete(e) {
  if (!currentAction) return

  axios.get(currentAction).then(
    () => {
      removeFilmFromList(currentAction)
      showNotif('Film deleted')
      currentAction = null
    },
    console.error // eslint-disable-line
  )
}

function removeFilmFromList(action) {
  const filmElement = document.querySelector(`[data-action="${action}"]`).closest('li')
  const filmsListEl = filmElement.closest('ul')

  filmElement.parentElement.removeChild(filmElement)

  if (filmsListEl.childElementCount === 0) {
    document.querySelector('.js-films-container').hidden = true
    document.querySelector('.js-no-films').hidden = false
  }
}