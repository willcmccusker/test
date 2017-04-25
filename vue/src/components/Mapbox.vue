<template>
  <div id='map'>
    <mapkey 
    v-on:remove-all='removeAll'
    v-on:add-layer='addLayer' 
    v-on:remove-layer='removeLayer' 
    v-on:get-layers='getLayers'
    :city='city' 
    :map='map' 
    :layers='currentMap'
    :section='section'></mapkey>
    <div id='mapbox' class='city-map'></div>
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
        labelsMap: false,
        allLayers: {},
        layersLoading: [],
        host: 'atlasexpansionurbanacolombia.org',
        localhost: 'atlasexpansionurbanacolombia.org',
        maps: {
          'population': false,
          'urban-extent': [
            {
              on: true,
              display: 'Urban Built-Up',
              name: 'extent_??_urbanBuilt',
              url: '/urban_extent/urban_build_up_??/',
              color: '#978AD8'
            },
            {
              on: true,
              display: 'Suburban Built-Up',
              name: 'extent_??_suburbanBuilt',
              url: '/urban_extent/suburban_build_up_??/',
              color: '#DCB8CA'
            },
            {
              on: true,
              display: 'Rural Built-Up',
              name: 'extent_??_ruralBuilt',
              url: '/urban_extent/rural_build_up_??/',
              color: '#7C7C7C'
            },
            {
              on: true,
              display: 'Urbanized Open Area',
              name: 'extent_??_urbanOpen',
              url: '/urban_extent/open_space_??/',
              color: '#F6F5A4'
            },
            {
              on: true,
              display: 'Exurban Built-Up Area',
              name: 'extent_??_exurbanBuilt',
              url: '/urban_extent/exurban_built_up_??/',
              color: '#BCBCBC'
            },
            {
              on: true,
              display: 'Exurban Open Space',
              name: 'extent_??_exurbanOpen',
              url: '/urban_extent/exurban_open_??/',
              color: '#E1E1E1'
            }
          ],
          'density': false,
          'composition-of-added-area': [
            {on: true, display: 'Built-up Area', name: 'addedArea_??_builtUp', url: '/added_area/built_up_area_??/', color: 'rgba(52,22,186,0.5)'},
            {on: true, display: 'Infill', name: 'addedArea_??_infill', url: '/added_area/infill_??_!!/', color: 'rgba(255,1,196,0.5)'},
            {on: true, display: 'Extension', name: 'addedArea_??_extension', url: '/added_area/extension_??_!!/', color: 'rgba(255,255,16,0.5)'},
            {on: true, display: 'Leapfrog', name: 'addedArea_??_leapfrog', url: '/added_area/leapfrog_??_!!/', color: 'rgba(254,0,0,0.5)'},
            {on: true, display: 'Inclusion', name: 'addedArea_??_inclusion', url: '/added_area/inclusion_??_!!/', color: 'rgba(53,136,102,0.5)'}
          ],
          'arterial-roads': [
            {on: true, name: 'arterials', url: '/arterials/arterials/'}
          ],
          'roads': [
            {on: true, name: 'roads_??', url: '/roads/roads_??/'}
          ],
          'blocks-and-plots': [
            {on: true, name: 'blocks_land_use_??', url: '/blocks/land_use_??/'},
            {on: true, display: 'Atomistic Settlements', color: '#7fe900'},
            {on: true, display: 'Informal Subdivisions', color: '#9ce8ff'},
            {on: true, display: 'Formal Subdivisions', color: '#CA9179'},
            {on: true, display: 'Housing Projects', color: '#BF614D'},
            {on: true, display: 'Open Space', color: '#A4352B'},
            {on: true, display: 'Non Residential', color: '#7E0812'}
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
        reuseTiles: true,
        // scrollWheelZoom: false,
        zoom: 11,
        zoomControl: false
      })
      new L.Control.Zoom({ position: 'bottomright' }).addTo(this.map)
      L.mapbox.styleLayer('mapbox://styles/willcmccusker/cj1s0rv49000w2sqm46rsl141').addTo(this.map)
      // this.labelsMap = L.mapbox.styleLayer('mapbox://styles/willcmccusker/cj1s19z2u000l2snsh0t9i8gw').addTo(this.map)
      this.setLayers()
    },
    watch: {
      'section.section': function () {
        this.setLayers()
      }
    },
    methods: {
      setLayer (i, on) {
        var layer = this.currentMap[i]
        layer.on = on
        this.maps[this.section.section].splice(i, 1, layer)
      },
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
        if (this.allLayers[name]) {
          var layer = this.allLayers[name]
          if (this.map.hasLayer(layer)) {
            layer.bringToBack()
            this.map.removeLayer(layer)
          }
        }
      },
      getLayers () {
        var layers = []
        this.map.eachLayer((layer) => {
          if (layer.options.mine) {
            layers.push(layer)
          }
        })
        return layers
      },
      removeAll () {
        this.map.eachLayer((layer) => {
          if (layer.options.mine) {
            this.map.removeLayer(layer)
          }
        })
      },
      generateLayer (name, url, options) {
        return L.tileLayer(url, options)
        // .on('loading', () => {
        //   this.addLayerLoader(name)
        // })
        // .on('load', () => {
        //   this.removeLayerLoader(name)
        // })
      },
      addLayer (name) {
        if (this.allLayers[name]) {
          var layer = this.allLayers[name]
          if (!this.map.hasLayer(layer)) {
            this.map.addLayer(layer)
          }
          layer.bringToFront()
        }
      },
      addYearLayers (yearCount, options) {
        var inc = this.section.section === 'roads' || this.section.section === 'blocks-and-plots' ? 1 : 0
        for (var i = 1; i < (yearCount + 1); i++) {
          var j = i - inc
          this.maps[this.section.section].forEach((layerType, count) => {
            if ((this.section.section === 'roads' || this.section.section === 'blocks-and-plots') && count > 0) {
              return
            }
            var name = layerType.name.replaceAll('??', 't' + j).replace('!!', 't' + (j + 1))
            options.name = name
            var url = layerType.url.replaceAll('??', 't' + j).replace('!!', 't' + (j + 1))
            var u = 'http://' + this.host + '/tiles/show/' + this.city.City.slug + url + '{z}/{x}/{y}.png'
            var layer = this.generateLayer(name, u, options)
            if (!this.allLayers[name]) {
              this.allLayers[name] = layer
            }
          })
        }
      },
      setLayers () {
        var options = {
          tms: true,
          subdomains: 'abc',
          mine: true,
          maxZoom: 13
        }
        switch (this.section.section) {
          case ('population'):
            break
          case ('urban-extent'):
            for (var i = 0; i < 3; i++) {
              for (var j = 0; j < (i + 1); j++) {
                var bound = j === 0 ? 'inner' : (j === 1 ? 'middle' : 'outer')
                var name = 't' + (i + 1) + '_' + bound
                options.opacity = 0.7
                options.name = 'extent_' + name
                if (!this.allLayers['extent_' + name]) {
                  var u = 'http://' + this.localhost + '/tiles/show/' + this.city.City.slug + '/extent/' + name + '/{z}/{x}/{y}.png'
                  this.allLayers['extent_' + name] = this.generateLayer(name, u, options)
                }
              }
            }
            // falls through
          case ('composition-of-added-area'):
            var yearCount = this.section.section === 'urban-extent' ? 3 : 2
            options.opacity = 0.7
            this.addYearLayers(yearCount, options)
            this.map.setZoom(11)
            break
          case ('arterial-roads'):
            name = this.maps['arterial-roads'][0].name
            options.name = name
            options.opacity = 0.7
            options.maxZoom = 17
            if (!this.allLayers[name]) {
              var url = this.maps['arterial-roads'][0].url
              u = 'http://' + this.host + '/tiles/show/' + this.city.City.slug + url + '/{z}/{x}/{y}.png'
              this.allLayers[name] = this.generateLayer(name, u, options)
            }
            this.map.setZoom(12)
            break
          case ('blocks-and-plots'):
            // falls through
          case ('roads'):
            options.opacity = 0.7
            options.maxZoom = 17
            yearCount = 2
            this.addYearLayers(yearCount, options)
            this.map.setZoom(15)
            break
        }
        if (this.labelsMap) {
          this.labelsMap.bringToFront()
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
    // background-color: white !important;
    z-index:0;
    height:100vh;

  }
}
@import '../../../app/webroot/src/sass/vars';

@media only screen and (min-width : 0) and (max-width : $tablet-max-width)  {
  #map{
    position:static;
    height:auto;
    #mapbox {
      width: calc(100% - 40px);
      margin:auto;
      // height:300px;
    }
  }

}
</style>
