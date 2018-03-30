const MAX_VISIBLE = 2

const onShowAllClick = (comments, showAll) => e => {
  comments.forEach(el => {
    el.hidden = false
  })
  showAll.removeEventListener('click', onShowAllClick)
  showAll.hidden = true
}

export function hideExtraComments(container) {
  const [commentsList, showAll] = [
    '[data-comments-list]',
    '[data-show-all-comments]'
  ].map(s => container.querySelector(s))
  const comments = commentsList ? [...commentsList.children] : []

  if (comments.length > MAX_VISIBLE) {
    for (let i = MAX_VISIBLE; i < comments.length; i++) {
      comments[i].hidden = true
    }
    showAll.querySelector('.count').textContent = `(${comments.length - MAX_VISIBLE})`
    showAll.addEventListener('click', onShowAllClick(comments, showAll))
  }

  showAll.hidden = comments.length <= MAX_VISIBLE
}
