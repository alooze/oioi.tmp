import modals from '../modals'
import { showNotif } from '../notifs'

const qs = document.querySelector.bind(document)

export default function onSuccess(form) {
  switch (form.getAttribute('id')) {
  case 'contact-form':
    modals['contact-success-modal'].open()
    form.reset()
    break

  case 'add-comment-no-account':
    modals['add-comment-modal'].close()
    modals['comment-success-modal'].open()
    form.reset()
    break

  case 'comment-login-form':
    Array.prototype.forEach.call(
      document.querySelectorAll('[data-show-modal="add-comment-modal"]'),
      btn => btn.setAttribute('data-show-modal', 'add-comment-loggedin-modal')
    )
      Array.prototype.forEach.call(
      document.querySelectorAll('.nav__link.auth-link'),
      el => {
        if(el.classList.contains('hidden')){
          el.classList.remove('hidden')
        }else{
            el.classList.add('hidden')
        }
      }
    )

    modals['add-comment-modal'].close()
    modals['add-comment-loggedin-modal'].open()
    form.reset()
    break

  case 'add-comment-loggedin':
    modals['add-comment-loggedin-modal'].close()
    modals['comment-success-modal'].open()
    form.reset()
    break

  case 'register-form':
    qs('.register').style.display = 'none'
    qs('.register-success').style.display = null
    qs('.auth-page').classList.remove('auth-page_register')
    qs('.auth-page').classList.add('auth-page_register-success')
    form.reset()
    break

  case 'reset-password-form':
    qs('.reset-password').style.display = 'none'
    qs('.register-success').style.display = null
    qs('.auth-page').classList.remove('auth-page_reset-password')
    qs('.auth-page').classList.add('auth-page_register-success')
    form.reset()
    break

  case 'general-info':
  case 'contact-details':
    if(form.querySelector('button[type="submit"]').innerText == 'SAVE') form.querySelector('button[type="submit"]').innerText = 'SAVED';
    showNotif('Information saved')
    break

  case 'change-password':
    showNotif('Password changed')
    form.reset()
    break

  case 'add-bug-form':
    document.getElementById('add-bug').classList.add('success')
    form.reset()
    break

  default:
    console.log('form submitted') // eslint-disable-line
    break
  }
}
