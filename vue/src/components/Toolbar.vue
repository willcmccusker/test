<template>
   <header class="header">
      <div id="site-title">
        <h1 id="site-title">
          <a href="/">Atlas of Urban Expansion</a>
        </h1>
      </div>
      <nav class="menu-icon">
        <div class="nav-holder">
          <div class="menu-group">
            <a href="/cities">Cities</a>
          </div>
          <div class="menu-group">
            <a href="/data">Data</a>
            <div class="sub-menu">
              <a href="/rankings">Rankings</a>
              <a href="/historical-data">30 Historical Cities</a>
            </div>
          </div>
          <div class="menu-group">
            <a href="/about">About</a>
            <div class="sub-menu">
              <a href="/team-overview">Team Overview</a>
            </div>
          </div>
        </div>
      </nav>
      <div id="citySearch" class="menu-icon" :class="{poppedUp: poppedUp, unlisted: !searchResults.length}">
        <div @click='poppedUp = false' class="closeHolder">
          <div class="closeCitySearch"></div>
        </div>
        <div class="search-container">
        <input @focus='poppedUp = true' v-model='searchFilter' class="search" id="search" placeholder="Search">
        </div>
        <ul class="list" >
          <li v-for='city in searchResults'>
            <a :href="'/cities/view/' + city.City.slug">
              <div class="display-none popup-city-country" v-html='city.City.country'></div>
              <div class="popup-city-li">
                <div class="popup-city-city" v-html='city.City.name'></div>
                <img class="lazyimg" 
                :src="'/file-manager/userfiles/_thumbs/flags/' + city.City.flag_path.replace('.png', '.jpg')">
              </div> 
              <div class="popup-city-region" v-html='city.Region.name'></div>
            </a>
          </li>
        </ul>
      </div>
    </header>
</template>

<script>

  // if (process.env.NODE_ENV === 'development') {
  //   var cities = require('../assets/cities.json')
  // } else {
  /* exported cities */
  /* global cities */
  // }
  export default {

    name: 'Toolbar',

    data () {
      return {
        cities,
        searchFilter: '',
        poppedUp: false
      }
    },
    computed: {
      searchResults () {
        var vm = this
        return this.cities.filter(function (city) {
          return vm.searchFilter !== '' && city.City.name.toLowerCase().includes(vm.searchFilter.toLowerCase())
        })
      }
    }
  }
</script>

<style lang="scss" scoped>
  body[class^='cities_view_']{
    
  }
</style>
