<template>
  <div>
    <div v-if='sectionKey === 0' >
        <div class='city-title'>
          {{city.City.name}}
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
        <div @click='dropdown = false' class='close-search'></div>
        </div>
        <div class='cityGroup' v-for='citiesGroup, index in citiesGrouped'>
          <div v-for='city, indexx in citiesGroup'>
            <div class='dropdown-region' :class='{first: index === 0}' v-if='lastRegion(index, indexx, city)'>
              {{city.Region.name}}
            </div>
            <div class='dropdown-title'>
              <a :href="'/cities/view/' + city.City.slug">{{city.City.name}} - <span class='country-name'>{{city.City.country}}</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  export default {

    name: 'CityDropdown',
    props: ['city', 'sectionKey'],
    data () {
      return {
        cities: this.$cities,
        dropdown: false,
        cityFilter: ''
      }
    },
    computed: {
      citiesOrdered () {
        return this.cities.sort(function (a, b) {
          return a.City.country === b.City.country ? (a.City.name > b.City.name ? 1 : -1) : (a.City.country > b.City.country ? 1 : -1)
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
@import '../../../app/webroot/src/sass/vars';
@import '../assets/colors.scss';

  .city-title{
    font-size:64px;
    line-height:76px;
  }
  .allCities{

    background-color: white;
    color: $dark-grey;
    position:fixed;
    top:0px;
    left:0px;
    right:0px;
    bottom:0px;
    overflow: auto;
    z-index:9;
    > * {
      position: relative;
      z-index:9;
    }
    a,
    .dropdown-title,
    .dropdown-region {
      font-size: 14px;
      line-height:21px;
      font-weight: normal;
      .country-name {
        color: #cccccc;
      }
    }
    .dropdown-region {
      font-size: 12px;
      letter-spacing: .8px;
      text-transform: uppercase;
      padding: 25px 0 10px 0;
      &.first {
        padding-top:0px;
      }
    }
    .city-filter {
      padding:12px;
      border-bottom: 1px solid $line-grey-2;
      margin-bottom:20px;
      padding-right:100px;
      position: relative;
      .close-search {
        position:absolute;
        right:16px;
        top:16px;
        width:23px;
        height:23px;
        background-image: url('/img/close.svg');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
      }
      input {
        font-size:14px;
        font-family: 'SuisseBPIntl', helvetica;
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

  @media only screen and (min-width : 0) and (max-width : $tablet-max-width)  {
    .allCities{
      height: calc(100% - 60px);
      .cityGroup {
        width:100%;
      }
    }
  }
</style>
