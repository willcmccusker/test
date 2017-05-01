var Big = require('big.js')
export let commas = function (number, dp = 0) {
  return new Big(number).round(dp).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')
}
export let percent = function (number, dp = 2, multiply = false) {
  return new Big(number).times(multiply || 1).round(dp).toString().replace(/\./g, ',') + '%'
}
export let clone = function (obj) {
  if (obj === null || typeof (obj) !== 'object' || 'isActiveClone' in obj) {
    return obj
  }
  if (obj instanceof Date) {
    var temp = new obj.constructor() // or new Date(obj);
  } else {
    temp = obj.constructor()
  }

  for (var key in obj) {
    if (Object.prototype.hasOwnProperty.call(obj, key)) {
      obj['isActiveClone'] = null
      temp[key] = clone(obj[key])
      delete obj['isActiveClone']
    }
  }

  return temp
}
