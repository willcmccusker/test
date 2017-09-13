// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'

Vue.config.productionTip = false
if (process.env.NODE_ENV === 'development') {
  window.city = require('./assets/city.json')
  window.cities = require('./assets/cities.json')
}

Vue.prototype.$city = window.city
Vue.prototype.$cities = window.cities
Vue.prototype.$firstVisit = window.firstVisit

// import velocity from 'velocity-animate'
// Vue.prototype.$velocity = velocity

/* eslint-disable no-new */
new Vue({
  el: '#app',
  template: '<App/>',
  components: { App }
})

/* eslint no-extend-native: ["error", { "exceptions": ["Array", "String"] }] */
Object.defineProperty(Array.prototype, 'chunk', {
  value: function (chunkSize) {
    var R = []
    for (var i = 0; i < this.length; i += chunkSize) {
      R.push(this.slice(i, i + chunkSize))
    }
    return R
  }
})

String.prototype.replaceAll = function (search, replacement) {
  var target = this
  return target.split(search).join(replacement)
}
