import steps from './steps'

const [controlBack, controlForward, indicator, text, schemeImg, schemeGifImg] = [
  '.steps-controls__control_back',
  '.steps-controls__control_forward',
  '.steps-controls__indicator',
  '.how-i-work__text',
  '.how-i-work__scheme img',
  '.how-i-work__scheme-gif'
].map(s => document.querySelector(s))

let current = 0

controlBack.addEventListener('click', function(){prev(true)})
controlForward.addEventListener('click', function(){next(true)})

function setImage(img) {
  schemeImg.setAttribute('src', `./media/${img}-@1x.png`)
  schemeImg.setAttribute('srcset', `./media/${img}-@2x.png` + ' 2x')
}

function setGifImg(img) {
  if (schemeGifImg.getAttribute('src').includes(img)) return
  schemeGifImg.setAttribute('src', `./media/${img}.gif`)
}

export function setSlide(i, arrows) {
  if(arrows){
    if(i<0) i = steps.length-1;
    if(i>steps.length-1) i = 0
  }
  if (!steps[i]) return

  current = i

  setImage(current + 1)
  setGifImg(steps[i].gif)
  indicator.textContent = `${i + 1} / ${steps.length}`
  text.innerHTML = steps[i].text

  return true
}

export function next(arrows) {
  return setSlide(current + 1, arrows)
}

export function prev(arrows) {
  return setSlide(current - 1, arrows)
}

export function setStart() {
    current = 0;
    setSlide(current)
}

export const className = '.how-i-work';
