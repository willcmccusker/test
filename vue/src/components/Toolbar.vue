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

  export default {

    name: 'Toolbar',

    data () {
      return {
        cities: this.$cities,
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

<style lang="scss" >

// body[class^='cities_view_'] {

.header {
  font-size:16px;
  padding: 0px 30px 0px 30px;
  line-height: 54px;
  position: fixed;
  top:0px;
  width:100%;
  z-index:9999;
  transition: transform 500ms ease;
  a {
    color: red;
  }

  &.headroom--unpinned:not(.poppedUp){
    transform: translateY(-100%);
    nav.navOpen .nav-holder a,
    nav.navOpen .nav-holder .menu-group{
      display:none;
    }
  }
  &.headroom--pinned:not(.poppedUp){
    transform:translateY(0%);
  }
  &.headroom--not-top {
    background-color:#F7F7F7;
    
    nav .menu-group .sub-menu{
      background-color: #F7F7F7;

    }
  }
  display:inline-block;
  display: flex;
  .nav-holder {
    margin: 0 0 0 20px;
  }
  #site-title{
    display:inline-block;
    font-family: "NeueHaasRegularTX", Helvetica, Arial, sans-serif;
    a {
      color:#000 !important;
    }
    h1{
      display: inline-block;
    }
  }
  nav{
    display:inline-block;
    flex: 1;
    order: 2;
    a{
      margin: 0 0 0 25px;
    }
    a:hover {
      color: blue;
    }

    .menu-group{
      position: relative;
      display: inline-block;
      min-height: 54px;
      a {
        display:block;
      }
      .sub-menu{
        display:none;
        position: absolute;
        left:0px;
        top: 100%;
        width:248px;
        background-color: #F7F7F7;
        a{
          border-top:1px solid rgba(255,255,255,0.7);
          display: block;
          padding:0px 0px 0px 25px;
          margin-left:0px;

        }
      }
      &:hover {
        .sub-menu{
          margin-left: 0px;
          display: block;
        }
      }
    }
  }
  #citySearch{
    display:inline-block;
    float:right;
    order: 3;
    margin-left: auto;
  }

}
</style>
