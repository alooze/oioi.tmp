export const qs = (selector, ctx = document) => ctx.querySelector(selector)
export const qsa = (selector, ctx = document) => [].slice.call(ctx.querySelectorAll(selector))

export function delegate(target, eventType, selector, handler) {
  target.addEventListener(eventType, function(e) {
    if (e.target.matches(selector)) handler.call(this, e)
  })
}

export const one = (target, events, handler) => {
  function cb(e) {
    handler.call(this, e)
    events.split(/\s/).forEach(ev => target.removeEventListener(ev, cb))
  }
  events.split(/\s/).forEach(ev => target.addEventListener(ev, cb))
}
