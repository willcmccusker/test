<template>
   <header class="header">
      <div id="site-title">
        <h1 id="site-title">
          <a href="/">Atlas of Urban Expansion</a>
        </h1>
      </div>
      <div @click="clicked('s')" id='search-icon'></div>
      <div @click="clicked('m')" id='menu-icon' :class="{open: sideOpen}"></div>
      <div class='side-menu' :class="{visible: sideOpen}">
        <div v-if='menu'>
          <div class='linkGroup' v-for='links in linkGroups'>
            <div v-for='link in links'>
              <a :href='link.url'>{{link.display}}</a>
            </div>
          </div>
        </div>
        <div v-else-if='search'>
          <input ref='input' @focus='poppedUp = true' v-model='searchFilter' class="search" id="search" placeholder="Type to Search">
          <ul class="list" >
            <li v-for='city in searchResults'>
              <a :href="'/cities/view/' + city.City.slug">
                <div class="popup-city-li">
                  <div class='table img'>
                    <div class='table-cell'>
                      <img :src="'/file-manager/userfiles/_thumbs/flags/' + city.City.flag_path.replace('.png', '.jpg')">
                    </div>
                  </div>
                  <div class="popup-city-city" v-html='city.City.name'></div>
                  <div class="popup-city-region" v-html='city.Region.name'></div>
                </div> 
              </a>
            </li>
          </ul>
        </div>
      </div>  
    </header>
</template>

<script>

  export default {

    name: 'Toolbar',

    data () {
      return {
        search: false,
        menu: false,
        cities: this.$cities,
        searchFilter: '',
        poppedUp: false,
        linkGroups: [
          [
            {
              url: '/cities',
              display: 'Cities'
            }
          ], [
            {
              url: '/about',
              display: 'About'
            },
            {
              url: '/team',
              display: 'Team'
            },
            {
              url: '/methodology',
              display: 'Methodology'
            },
            {
              url: '/acknowledgements',
              display: 'Acknowledgements'
            }
          ], [
            {
              url: '/data',
              display: 'Data'
            },
            {
              url: '/historical-data',
              display: '30 Historical Cities'
            },
            {
              url: 'http://atlasexpansionurbanacolombia.org',
              display: 'AUE – Colombia'
            }
          ], [
            {
              url: 'mailto:contact@atlasofurbanexpansion.org',
              display: 'Contact'
            }
          ]
        ]
      }
    },
    computed: {
      searchResults () {
        var vm = this
        return this.cities.filter(function (city) {
          return vm.searchFilter !== '' && city.City.name.toLowerCase().includes(vm.searchFilter.toLowerCase())
        })
      },
      sideOpen () {
        return this.menu || this.search
      }
    },
    methods: {
      clicked (b) {
        if (b === 's') {
          this.search = !this.search
          this.menu = false
        } else if (b === 'm') {
          if (this.sideOpen) {
            this.menu = false
          } else {
            this.menu = !this.menu
          }
          this.search = false
        }
      }
    },
    watch: {
      search () {
        if (this.search) {
          this.$nextTick(function () {
            this.$refs.input.focus()
          })
        } else {
          this.searchFilter = ''
        }
      }
    }
  }
</script>

<style lang="scss" >

// body[class^='cities_view_'] {

@import '../../../app/webroot/src/sass/vars';
@import '../assets/colors';

.header {
  font-size:16px;
  padding: 0px 30px 0px 30px;
  line-height: 40px;
  position: fixed;
  top:0px;
  width:100%;
  z-index:2;
  display:inline-block;
  background-color: rgba(0,0,0,0);
  transition: background 500ms ease;
  &:hover {
    background-color: rgba(255,255,255,0.5);
  }
  a {
    color: $dark-grey;
  }
  .nav-holder {
    margin: 0 0 0 20px;
  }
  #site-title{
    z-index:2;
    display:inline-block;
    font-family: "SuisseBPIntl", Helvetica, Arial, sans-serif;
    h1{
      display: inline-block;
    }
  }
  .side-menu {
    z-index:3;
    padding:20px;
    line-height: 38px;
    font-size: 32px;
    position:fixed;
    top:0px;
    height:100vh;
    left:100%;
    background-color: white;
    width:50vw;
    letter-spacing: 0.25px;
    font-weight: normal;
    transition: left 500ms ease;
    &.visible {
      left: 50%;
    }
    .linkGroup {
      margin-bottom:32px;
    }

    .list{
      max-height: calc(100vh - 140px);
      overflow:auto;
      font-size:24px;
      line-height:28px;
      padding-top:20px;
      .popup-city-li{
        margin-bottom:28px;
        .table {
          display:table;
          min-height:56px;
          vertical-align: middle;
          float: left;
          .table-cell {
            vertical-align: middle;
            display: table-cell;
            img {
              box-shadow: 0 2px 4px 0 rgba(0,0,0,0.50);
              width:50px;
            }
          }
        }
      }
      .popup-city-city,
      .popup-city-region {
        padding-left: 65px;
        display: block;
      }
      .popup-city-region {
        color: $light-grey;
      }
    }
    input {
      color:$dark-grey;
      height:38px;
      margin-top:62px;
      border: none;
      width:100%;
      line-height: 38px;
      font-size: 32px;
      border-bottom:1px solid $line-grey;
      &:focus{
        outline: none;
      }
      &::placeholder {
        color:$dark-grey;
      }
    }
  }

  #search-icon,
  #menu-icon {
    z-index:4;
    width: 23px;
    height:23px;
    position:fixed;
    top:11px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    display:inline-block;
    cursor: pointer;
  }
  #search-icon {
    background-image: url('/img/search.svg');
    right: 74px;
  }
  #menu-icon {
    background-image: url('/img/hamburger.svg');
    right: 24px;
    width:29px;
  }
  #menu-icon.open {
    background-image: url('/img/close.svg');
    width: 23px;
    right: 27px;
  }
}
@media only screen and (min-width : 0) and (max-width : $tablet-max-width)  {
  .header {
    .side-menu {
      width:100vw;
      &.visible {
        left: 0%;
      }
    }
    #menu-icon {
      width:23px;
      top:11px;
      &.open {
        top:11px;
        width:19px;
      }
    }
    #search-icon {
      width:19px;
      top:11px;
      right:60px;
    }
  }
}
</style>
