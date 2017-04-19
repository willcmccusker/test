<template>
  <div id='map'>
    <div id='mapbox' class='city-map'></div>
    <div v-if='isMobile' class='mobile-map-cover'></div>
  </div>
</template>

<script>
  // import L from 'leaflet'
  /* exported L */
  /* global L */

  export default {

    name: 'Mapbox',
    props: ['city', 'section'],
    data () {
      return {
        isMobile: false,
        map: false,
        allLayers: [],
        layersLoading: [],
        host: 'atlasofurbanexpansion.org',
        maps: {
          'urban-extent': [{name: 'extent_??_outline', url: '/urban_extent/urban_edge_??/'},
            {name: 'extent_??_urbanBuilt', url: '/urban_extent/urban_build_up_??/'},
            {name: 'extent_??_suburbanBuilt', url: '/urban_extent/suburban_build_up_??/'},
            {name: 'extent_??_ruralBuilt', url: '/urban_extent/rural_build_up_??/'},
            {name: 'extent_??_urbanOpen', url: '/urban_extent/open_space_??/'},
            {name: 'extent_??_exurbanBuilt', url: '/urban_extent/exurban_built_up_??/'},
            {name: 'extent_??_exurbanOpen', url: '/urban_extent/exurban_open_??/'},
            {name: 'extent_??_exurbanRural', url: '/urban_extent/exurban_rural_??/'},
            {name: 'extent_??_water', url: '/urban_extent/water_??/'}]
        },
        timePeriods: ['t1', 't2', 't3']
      }
    },
    computed: {
      stillLoading () {
        return this.layersLoading.length > 0
      }
    },
    mounted () {
      L.mapbox.accessToken = 'pk.eyJ1Ijoid2lsbGNtY2N1c2tlciIsImEiOiJjaXF0c2hseGswMDZtZnhuaHlwdmdiOXM1In0._0qo-NTp7TGotAhL6sa4Og'
      this.launchMap()
    },
    watch: {
      'section.section': function () {
        this.launchMap()
      }
    },
    methods: {
      addLayerLoader (layerId) {
        this.layersLoading.push(layerId)
      },
      removeLayerLoader (layerId) {
        var i = this.layersLoading.indexOf(layerId)
        if (i !== -1) {
          this.layersLoading.splice(i, 1)
        }
      },
      launchMap () {
        // if (this.map) {
        //   this.map.remove()
        // }
        switch (this.section.section) {
          case ('population'):
            break
          case ('urban-extent'):
            var mapbg = 'mapbox.light'
            this.map = L.mapbox.map('mapbox', mapbg, {
              center: [this.city.City.latitude, this.city.City.longitude],
              zoom: 11,
              maxZoom: 13,
              reuseTiles: true,
              scrollWheelZoom: false
            })

            // var layerOptions = {tms: true, subdomains: 'abc'}
            for (var i = 1; i < 4; i++) {
              var layers = []
              this.maps[this.section.section].forEach((layerType) => {
                var name = layerType.name.replaceAll('??', 't' + i)
                var url = layerType.url.replaceAll('??', 't' + i)
                var layer = L.tileLayer('http://{s}.' + this.host + '/tiles/show/' + this.city.City.slug + url + '{z}/{x}/{y}.png', {tms: true, subdomains: 'abc'})
                .on('loading', () => {
                  this.addLayerLoader(name)
                })
                .on('load', () => {
                  this.removeLayerLoader(name)
                })
                layers.push(layer)
              })
              this.allLayers.push({
                layerGroup: L.layerGroup(layers),
                layers
              })
            }
            this.allLayers[this.allLayers.length - 1].layerGroup.addTo(this.map)

            break
        }
      }
    }
  }
</script>

<style lang="scss" scoped>
*{
  color: white;
}
  #map{
  position:fixed;
  top:0px;
  left:0px;
  width:100vw;
  height:100vh;
  #mapbox{
    z-index:0;
    height:100vh;

  }
  }
</style>
