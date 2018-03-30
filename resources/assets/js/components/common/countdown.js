initializeClock('countdown')

function getTimeRemaining(endtime) {
  const t = Date.parse(endtime) - Date.parse(new Date())
  const seconds = Math.floor((t / 1000) % 60)
  const minutes = Math.floor((t / 1000 / 60) % 60)
  const hours = Math.floor((t / (1000 * 60 * 60)) % 24)
  const days = Math.floor(t / (1000 * 60 * 60 * 24))
  return {'total': t, days, hours, minutes, seconds}
}

function initializeClock(id) {
  const clock = document.getElementById(id)
  const daysEl = clock.querySelector('.days')
  const hoursEl = clock.querySelector('.hours')
  const minutesEl = clock.querySelector('.minutes')
  const secondsEl = clock.querySelector('.seconds')
  const endtime = new Date(
    Date.parse(new Date()) +
    (((+daysEl.textContent *
      24 + +hoursEl.textContent) *
        60 + +minutesEl.textContent) *
          60 + +secondsEl.textContent) *
            1000
  )

  function updateClock() {
    const t = getTimeRemaining(endtime)

    daysEl.textContent = t.days
    hoursEl.textContent = ('0' + t.hours).slice(-2)
    minutesEl.textContent = ('0' + t.minutes).slice(-2)
    secondsEl.textContent = ('0' + t.seconds).slice(-2)

    if (t.total <= 0) {
      clearInterval(timeinterval)
    }
  }

  updateClock()
  const timeinterval = setInterval(updateClock, 1000)
}
