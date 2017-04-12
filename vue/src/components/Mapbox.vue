<template>
  <div id='mapbox' :class='section.section'>
    <div v-if="section.section === 'city-header'">
      <div class='grid'>
        <div class='col-1-1'>
          <div class='city-title'>{{city.City.name}}, {{city.City.country}}</div>
        </div>
      </div>
      <div id='city-header-data' class='grid center'>
        <div class='col-1-3'>
          <div class='title'>
            {{city.City.t3.substr(0,4)}} Population
          </div>
          <div class='value' v-html='$parent.commas(city.City.population)'></div>
          <div class='unit'></div>
        </div>
        <div class='col-1-3'>
          <div class='title'>
            {{city.City.t3.substr(0,4)}} Density
          </div>
          <div class='value' v-html='$parent.commas(city.City.density)'>

          </div>
          <div class='unit'>
          persons/hectare
          </div>
        </div>
        <div class='col-1-3'>
          <div class='title'>
            {{city.City.t3.substr(0,4)}} Urban Extent
          </div>
          <div class='value' v-html='$parent.commas(city.City.extent)'>

          </div>
          <div class='unit'>
            hectares
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <div class='header-title'>{{city.City.name}}, {{city.City.country}}</div>
      <div id='map'>
        map
      </div>
    </div>
  </div>
</template>

<script>
  export default {

    name: 'Mapbox',
    props: ['city', 'section'],
    data () {
      return {

      }
    },
    methods: {
    }
  }
</script>

<style lang="scss" scoped>
*{
  color: white;
}
#mapbox{
  .city-title{
    font-size:48px;
    line-height:59px;
  }
  #city-header-data {
    text-align:center;
    margin-top: calc(50vh - 112px);
    .title{
      font-size:14px;
      line-height:17px;
    }
    .value{
      font-size:60px;
      line-height:72px;
    }
    .unit{
      font-size:12px;
      line-height:14px;
    }
  }
  &.city-header{
    padding-left:0px;
  }


  .header-title{
    background-color: black;
    font-size:20px;
    line-height:43px;
    position:relative;
    z-index:2;
    padding-left:20px;
  }
  #map{
    padding-left:336px;
  }
}
</style>
