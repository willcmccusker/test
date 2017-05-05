<template>
   <header class="header">
      <div id="site-title">
        <h1 id="site-title">
          <a href="/"><span class='hide-on-mobile'>Atlas de </span>Expansión Urbana Colombia</a>
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
          <input ref='input' @focus='poppedUp = true' v-model='searchFilter' class="search" id="search" placeholder="Escribe para buscar">
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
              url: '/ciudades',
              display: 'Ciudades'
            }
          ], [
            {
              url: '/sobre-el-proyecto',
              display: 'Sobre el Proyecto'
            },
            {
              url: '/autores',
              display: 'Autores'
            },
            {
              url: '/metodologia',
              display: 'Metodología'
            },
            {
              url: '/expresiones-de-gratitud',
              display: 'Expresiones de Gratitud'
            }
          ], [
            {
              url: '/datos',
              display: 'Datos'
            },
            {
              url: 'http://atlasofurbanexpansion.org',
              display: 'Atlas of Urban Expansion'
            }
          ], [
            {
              url: 'mailto:info@atlasofurbanexpansion.org',
              display: 'Contáctenos'
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
header.city-header {
  filter: invert(100%);
  img {
    filter: invert(100%);
  }
}
</style>
