const navbar = document.querySelector('.navbar--not-top')
const classes = {
  pinned: 'navbar--pinned',
  unpinned: 'navbar--unpinned'
}

export function pin() {
  if (navbar.classList.contains(classes.pinned)) return
  navbar.classList.remove(classes.unpinned)
  navbar.classList.add(classes.pinned)
}

export function unpin() {
  if (navbar.classList.contains(classes.unpinned)) return
  navbar.classList.remove(classes.pinned)
  navbar.classList.add(classes.unpinned)
}
