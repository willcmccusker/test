<template>
  <div>
    <div v-if='sectionKey === 0' >
        <div class='city-title'>
          {{city.City.name}}, {{city.City.country}}
        </div>
    </div>
    <div v-else class='dropdown-nav cursor' :class='{open: dropdown}' ref='citydropdown'>
     <div @click='dropdown = !dropdown'  class='currentSection' >
        <div class='dropdown-title' >{{city.City.name}}</div>
        <div class='dropdown-arrow'>
          <img  :src="'/img/arrow-b.svg'">
        </div>
      </div>
      <div class='allCities' v-if='dropdown'>
        <div class='city-filter'>
        <input v-model='cityFilter' placeholder='Select a city or type to search'>
        </div>
        <div class='cityGroup' v-for='citiesGroup, index in citiesGrouped'>
          <div v-for='city, indexx in citiesGroup'>
            <div class='dropdown-region' v-if='lastRegion(index, indexx, city)'>
              {{city.Region.name}}
            </div>
            <div class='dropdown-title'>
              <a :href="'/cities/view/' + city.City.slug">{{city.City.name}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  /* global cities */

  // if (process.env.NODE_ENV === 'development') {
  //   var cities = require('../assets/cities.json')
  // }
  export default {

    name: 'CityDropdown',
    props: ['city', 'sectionKey'],
    data () {
      return {
        cities,
        dropdown: false,
        cityFilter: ''
      }
    },
    computed: {
      citiesOrdered () {
        return this.cities.sort(function (a, b) {
          return a.Region.name === b.Region.name ? (a.City.name > b.City.name ? 1 : -1) : (a.Region.name > b.Region.name ? 1 : -1)
        })
      },
      citiesGrouped () {
        return this.citiesFiltered.chunk(Math.ceil(this.cities.length / 4))
      },
      citiesFiltered () {
        return this.citiesOrdered.filter((c) => this.cityFilter === '' || c.City.name.toLowerCase().includes(this.cityFilter.toLowerCase()) || c.Region.name.toLowerCase().includes(this.cityFilter.toLowerCase()))
      }
    },
    methods: {
      swapCity (city) {
        console.log(city)
      },
      lastRegion (index, indexx, city) {
        if (index === 0 && indexx === 0) {
          return true
        } else {
          var comboIndex = (index * Math.ceil(this.cities.length / 4)) + indexx - 1
          var lastCity = this.citiesFiltered[comboIndex]
          return lastCity.Region.name !== city.Region.name
        }
      }
    },
    mounted () {
      var vm = this
      document.addEventListener('click', (e) => {
        if (this.$refs.citydropdown && !this.$refs.citydropdown.contains(e.target)) {
          vm.dropdown = false
        }
      }, false)
    }
  }
</script>

<style lang="scss" scoped>
@import '../assets/colors.scss';

  .city-title{
    font-size:48px;
    line-height:59px;
  }
.allCities{
  a,
  .dropdown-title,
  .dropdown-region {
    font-size: 14px;
    line-height:21px;
    font-weight: normal;
  }
  .dropdown-region {
    font-weight: bold;
  }
  background-color: white;
  color: $dark-grey;
  position:fixed;
  top:55px;
  left:16px;
  right:16px;
  bottom:16px;
  overflow: auto;
  z-index:4;
  .city-filter {
    padding:12px;
    border-bottom: 1px solid $line-grey-2;
    margin-bottom:20px;
    input {
      font-size:14px;
      font-family: helvetica;
      width:100%;
      height: 30px;
      line-height:30px;
      border:none;
      -webkit-appearance:none;
      padding: 0px;
      outline: none;
    }

  }
  .cityGroup{
    padding:12px;
    background-color: white;
    position: relative;
    width:25%;
    float:left;
  }
}

</style>
