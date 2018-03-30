const slides = [
  '.what-i-am_for-producers',
  '.what-i-am_for-financiers',
  '.what-i-am_for-distributors'
].map(s => document.querySelector(s))

const indicators = [...document.querySelector('.what-i-am-indicators').children]
let current = 0

indicators.forEach(ind => ind.addEventListener('click', e => setSlide(+e.target.dataset.scrollToSlide)))

export function setSlide(i) {
  if (!slides[i]) return

  current = i

  slides.forEach(slide => slide.classList.remove('active'))
  slides[i].classList.add('active')

  indicators.forEach(indicator => indicator.classList.remove('active'))
  indicators[i].classList.add('active')

  return true
}

export function next() {
  return setSlide(current + 1)
}

export function prev() {
  return setSlide(current - 1)
}

export const className = '.what-i-am-wrapper';