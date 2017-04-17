// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  template: '<App/>',
  components: { App }
})

/* eslint no-extend-native: ["error", { "exceptions": ["Array"] }] */
Object.defineProperty(Array.prototype, 'chunk', {
  value: function (chunkSize) {
    var R = []
    for (var i = 0; i < this.length; i += chunkSize) {
      R.push(this.slice(i, i + chunkSize))
    }
    return R
  }
})
