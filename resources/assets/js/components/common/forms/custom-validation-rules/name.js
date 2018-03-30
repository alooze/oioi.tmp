//alphabetical character, dashes, spaces, single quotes
const regExp = /^[A-Za-z-\s']*$/

export default function (value) {
  return regExp.test(value)
}
