<template>
  <div>
    <div class='map-graph'>
      <div class='tabs'>
        <div :class="{selected: maps, disabled: !currentSection.map}" class='cursor' @click='maps = true'>Map</div>
        <div :class="{selected: !maps, disabled: !currentSection.graph}" class='cursor' @click='maps = false'>Graphs</div>
      </div>
      <div class='clear'></div>
      <graphs v-if='currentSection.graph && !maps' :city='city' :section='currentSection'></graphs>
    </div>
    <mapbox :class='{maps: maps, graphs:!maps}'  :mapkeyON='maps' :city='city' :section='currentSection'></mapbox>
  </div>
</template>

<script>

  import Mapbox from './Mapbox'
  import Graphs from './Graphs'

  export default {

    name: 'MapGraphs',
    props: ['currentSection', 'city'],
    data () {
      return {
        maps: true
      }
    },
    watch: {
      currentSection () {
        this.decideMap()
      }
    },
    mounted () {
      this.decideMap()
    },
    methods: {
      decideMap () {
        // if current map graph choice is allowed, keep it, if not switch it
        // if map is true and current map is true map is true
        // if map is false and current graph is false map is true
        // if map is true and current map is false map is false
        // if map is false and current graph is true map is false
        this.maps = this.currentSection.map
        // (
        //   (this.maps && this.currentSection.map) || (!this.maps && !this.currentSection.graph)
        // ) || !(
        //   (this.maps && !this.currentSection.map) || (!this.maps && this.currentSection.graph)
        // )
      }
    },
    components: {
      Mapbox,
      Graphs
    }
  }
</script>

<style lang="scss" >
@import '../../../app/webroot/src/sass/vars';

@import '../assets/colors.scss';
#map.graphs {
  .leaflet-control-zoom {
    display: none;
  }
}
.tabs {
  z-index:1;
  position:relative;
  float:right;
  line-height:30px;
  margin-right:16px;
  margin-top:16px;
  text-align:right;
  border-bottom: 1px solid $line-grey-5;
  > div {
    display: inline-block;
    text-align: center;
    background-color: $light-grey-2;
    width: 95px;
    &.selected {
      background-color: white;
    }
    &.disabled {
      opacity: 0.3;
      pointer-events: none;
    }
    &:first-of-type{
      border-right: 1px solid $line-grey-3;
      margin-right:-4px;
    }
  }
}
@media only screen and (min-width : 0) and (max-width : $tablet-max-width)  {
  .tabs {
    float:none;
    width:100%;
    > div {
      width:50%;
    }
  }
}
</style>
