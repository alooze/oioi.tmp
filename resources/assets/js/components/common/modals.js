import RModal from 'rmodal'

const modals = [
  // landing
  'add-comment-modal',
  'add-comment-loggedin-modal',
  'comment-success-modal',
  'contact-success-modal',
  // dashboard
  'add-producer-modal',
  'edit-producer-modal',
  'delete-producer-modal',
  'add-director-modal',
  'edit-director-modal',
  'delete-director-modal',
  'add-writer-modal',
  'edit-writer-modal',
  'delete-writer-modal',
  'add-dop-modal',
  'edit-dop-modal',
  'delete-dop-modal',
  'submit-film-modal',
  'preview-film-modal',
  'delete-film-modal'
].reduce((acc, id) => Object.assign(acc, document.getElementById(id) ? { [id]: initModal(id) } : {}), {})

function initModal(id) {
  const modal = new RModal(document.getElementById(id), {
    // closeTimeout: 1000,
    dialogOpenClass: 'slideInDown',
    dialogCloseClass: 'slideOutUp'
  })

  document.addEventListener('keydown', ev => modal.keydown(ev), false)

  document.addEventListener('click', e => {
    if (e.target.closest(`[data-show-modal="${id}"]`)) modal.open()
  })

  modal.overlay.addEventListener('click', e => {
    if (e.target.closest('[data-hide-modal]')) modal.close()
  })

  return modal
}

export default modals
