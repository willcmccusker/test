var Big = require('big.js')
export let commas = function (number, dp = 0) {
  return new Big(number).round(dp).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')
}
export let percent = function (number, dp = 2, multiply = false) {
  return new Big(number).times(multiply || 1).round(dp).toString() + '%'
}
