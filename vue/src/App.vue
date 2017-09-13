<template>
  <div id="app">
    <popup></popup>
    <toolbar :class='section'></toolbar>
    <city v-if='$city'></city>
  </div>
</template>

<script>
require('./assets/site.js')
import Popup from './components/Popup'
import City from './components/City'
import Toolbar from './components/Toolbar'

export default {
  name: 'app',
  data () {
    return {
      section: 'map'
    }
  },
  components: {
    Popup,
    City,
    Toolbar
  }
}
</script>

<style lang="scss">
  // @import '../../app/webroot/src/sass/style.scss';

  html body[class^='cities_view_']{
    padding-bottom:0px !important;
    padding-top:0px;
  }
</style>
