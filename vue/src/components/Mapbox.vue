<template>
  <div id='map'>
    <div id='mapbox' class='city-map'></div>
    <div v-if='isMobile' class='mobile-map-cover'></div>
    <mapkey v-on:add-layer='addLayer' v-on:remove-layer='removeLayer' :city='city' :map='currentMap' :section='section'></mapkey>
  </div>
</template>

<script>
  // import L from 'leaflet'
  /* exported L */
  /* global L */
  import Mapkey from './Mapkey'

  export default {

    name: 'Mapbox',
    props: ['city', 'section'],
    components: {
      Mapkey
    },
    data () {
      return {
        isMobile: false,
        map: false,
        allLayers: {},
        layersLoading: [],
        // host: 'atlasofurbanexpansion.org',
        host: 'atlas.dev',
        maps: {
          'urban-extent': [
            {name: 'extent_??_urbanBuilt', url: '/urban_extent/urban_build_up_??/'},
            {name: 'extent_??_suburbanBuilt', url: '/urban_extent/suburban_build_up_??/'},
            {name: 'extent_??_ruralBuilt', url: '/urban_extent/rural_build_up_??/'},
            {name: 'extent_??_urbanOpen', url: '/urban_extent/open_space_??/'},
            {name: 'extent_??_exurbanBuilt', url: '/urban_extent/exurban_built_up_??/'},
            {name: 'extent_??_exurbanOpen', url: '/urban_extent/exurban_open_??/'}
          ]
        },
        timePeriods: ['t1', 't2', 't3']
      }
    },
    computed: {
      currentMap () {
        return this.maps[this.section.section]
      },
      stillLoading () {
        return this.layersLoading.length > 0
      }
    },
    mounted () {
      L.mapbox.accessToken = 'pk.eyJ1Ijoid2lsbGNtY2N1c2tlciIsImEiOiJjaXF0c2hseGswMDZtZnhuaHlwdmdiOXM1In0._0qo-NTp7TGotAhL6sa4Og'
      this.map = L.mapbox.map('mapbox', null, {
        center: [this.city.City.latitude, this.city.City.longitude],
        zoom: 11,
        maxZoom: 13,
        reuseTiles: true,
        // scrollWheelZoom: false,
        zoomControl: false
      })
      new L.Control.Zoom({ position: 'bottomright' }).addTo(this.map)
      this.baseMap = L.mapbox.styleLayer('mapbox://styles/willcmccusker/cj1s0rv49000w2sqm46rsl141').addTo(this.map)
      // this.labelsMap = L.mapbox.styleLayer('mapbox://styles/willcmccusker/cj1s19z2u000l2snsh0t9i8gw').addTo(this.map)
      // this.labelsMap.bringToFront()
      this.setLayers()
    },
    watch: {
      'section.section': function () {
        this.setLayers()
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
      removeLayer (name) {
        console.log('remove layer')
        if (this.allLayers[name]) {
          var layer = this.allLayers[name]
          if (this.map.hasLayer(layer)) {
            layer.bringToBack()
            this.map.removeLayer(layer)
          }
        }
      },
      addLayer (name) {
        console.log('add layer')
        if (this.allLayers[name]) {
          var layer = this.allLayers[name]
          if (!this.map.hasLayer(layer)) {
            this.map.addLayer(layer)
          }
          layer.bringToFront()
        }
      },
      setLayers () {
        switch (this.section.section) {
          case ('population'):
            break
          case ('urban-extent'):
            var subdomainOptions = {tms: true, subdomains: 'abc'}
            for (var i = 1; i < 4; i++) {
              var layers = []
              this.maps[this.section.section].forEach((layerType) => {
                var name = layerType.name.replaceAll('??', 't' + i)
                var url = layerType.url.replaceAll('??', 't' + i)
                var layer = L.tileLayer('http://{s}.' + this.host + '/tiles/show/' + this.city.City.slug + url + '{z}/{x}/{y}.png', subdomainOptions)
                .on('loading', () => {
                  this.addLayerLoader(name)
                })
                .on('load', () => {
                  this.removeLayerLoader(name)
                })
                this.allLayers[name] = layer
                layers.push(layer)
              })
              this.allLayers['extent_t' + i + '_group'] = L.layerGroup(layers)
            }
            for (i = 0; i < 3; i++) {
              for (var j = 0; j < (i + 1); j++) {
                var bound = j === 0 ? 'inner' : (j === 1 ? 'middle' : 'outer')
                var name = 't' + (i + 1) + '_' + bound
                subdomainOptions.opacity = 0.7
                this.allLayers['extent_' + name] = L.tileLayer('http://{s}.' + this.host + '/tiles/show/' + this.city.City.slug + '/extent/' + name + '/{z}/{x}/{y}.png', subdomainOptions)
                .on('loading', () => {
                  this.addLayerLoader(name)
                })
                .on('load', () => {
                  this.removeLayerLoader(name)
                })
              }
            }
            // this.allLayers['extent_t1_inner'].addTo(this.map, 'water')
            // this.allLayers['extent_t3_middle'].addTo(this.map)
            // this.allLayers['extent_t3_outer'].addTo(this.map)
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
