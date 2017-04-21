<template>
  <div>
    <mapbox v-if='maps' :city='city' :section='currentSection'></mapbox>
    <div class='map-graph'>
      <div class='tabs'>
        <div :class="{selected: maps}" class='cursor' @click='maps = true'>Map</div>
        <div :class="{selected: !maps}" class='cursor' @click='maps = false'>Graphs</div>
      </div>
      <div class='clear'></div>
      <graphs v-if='!maps' :city='city' :section='currentSection'></graphs>
    </div>
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
        maps: false
      }
    },
    components: {
      Mapbox,
      Graphs
    }
  }
</script>

<style lang="scss" scoped>
@import '../assets/colors.scss';

.tabs {
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
    &:first-of-type{
      border-right: 1px solid $line-grey-3;
      margin-right:-4px;
    }
  }
}
</style>
