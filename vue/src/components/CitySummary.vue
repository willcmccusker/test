<template>
  <div id='city-summary' class='summary'>
    <div class='row'>
      <div class='flag'>
        <img :src='flag'>
      </div>
      <div class='country'>{{city.City.country}}</div>
    </div>
<!--     <div class='row'>
      <div class='label'>Region</div>
      <div class='region'>{{city.Region.name}}</div>
    </div> -->
    <div v-if='sectionKey != 0'>
        <div class='cursor' :class="{open: dropdown}" @click='dropdown = !dropdown' >
          <div class='more-title' >Datos Básicos de la Ciudad</div>
        </div>
        <div class='show-more' v-if='dropdown'>
          <div class='label'>{{year}} Población</div>
          <div class='amount' v-html='commas(city.City.population)'></div>
         
          <div class='label'>{{year}} Huella Urbana</div>
          <div class='amount' v-html="commas(city.City.extent) + ' personas/hectáreas'"></div>
          
          <div class='label'>{{year}} Densidad</div>
          <div class='amount' v-html="commas(city.City.density) + ' hectáreas'"></div>

        </div>
      </div>

    </div>
  </div>
</template>

<script>
  import {commas} from '../assets/utils.js'

  export default {

    name: 'CitySummary',
    props: ['city', 'sectionKey'],
    data () {
      return {
        dropdown: true
      }
    },
    computed: {
      flag () {
        return '/file-manager/userfiles/flags/' + this.city.City.flag_path
      },
      year () {
        return this.city.City.t3.substr(0, 4)
      }
    },
    methods: {
      commas (amount) {
        return commas(amount)
      }
    }
  }
</script>

<style lang="scss" scoped>

@import '../assets/colors.scss';
.city-header {
  #city-summary  {
    background-color: transparent;
    .row, .label, .amount, .country, .region {
      color: white;
    }
  }
}
#city-summary {
  background-color: white;
  padding:12px;
  vertical-align: top;
  .row {
    vertical-align:top;
    line-height:22px;
    & > div {
      vertical-align:top;
      display: inline-block;
      min-width:60px;
    }
  }
  .label, .amount, {
    font-size:12px;
    line-height: 14px;
    color: $light-grey;
  }
  .label {
    line-height: 20px;
  }
  .amount {
    color: $dark-grey;
  }
  .region, .country {
    color: $dark-grey;
    font-size:12px;
    line-height:20px;
  }
  .flag{
    img {
      vertical-align:top;
      max-width: 35px;
      // max-height: 17px;
    }
  }
}
</style>
