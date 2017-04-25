<template>
  <div id="app">
    <toolbar></toolbar>
    <city v-if='$city'></city>
  </div>
</template>

<script>
require('./assets/site.js')
import City from './components/City'
import Toolbar from './components/Toolbar'

export default {
  name: 'app',
  components: {
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
