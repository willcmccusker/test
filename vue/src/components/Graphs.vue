<template>
   <div id='section-graphs'>
<!--          POPULATION          -->
    <div v-if="section.section === 'population'">
      <div class='grid' v-html="canvas('population_line', 'city-graphic no-legend')"></div>
      <div class='grid' v-html="canvas('population_change_bar')"></div>
    </div>
<!--          URBAN EXTENT          -->
    <div v-else-if="section.section === 'urban-extent'">
      <div class='relative'><div class='hold-legend' v-html="legend('urban_extent_composition_stacked_bar')"></div></div>
      <div class='grid' v-html="canvas('urban_extent_composition_stacked_bar')"></div>
      <div class='relative'><div class='hold-legend' v-html="legend('urban_extent_change_bar')"></div></div>
      <div class='grid' v-html="canvas('urban_extent_change_bar')"></div>
    </div>
<!--          DENSITY          -->
    <div v-else-if="section.section === 'density'">
      <div class='grid' v-html="canvas('density_built_up_line')"></div>
      <div class='grid' v-html="canvas('density_built_up_change_bar')"></div>
      <div class='grid' v-html="canvas('density_urban_extent_line')"></div>
      <div class='relative'><div class='hold-legend' v-html="legend('density_urban_extent_change_bar')"></div></div>
      <div class='grid' v-html="canvas('density_urban_extent_change_bar')"></div>
    </div>
<!--          COMPOSITION OF ADDED AREA          -->
    <div v-else-if="section.section === 'composition-of-added-area'">
      {{section.title}}
    </div>
<!--          ROADS          -->
    <div v-else-if="section.section === 'roads'">
      {{section.title}}
    </div>
<!--          ARTERIAL ROADS          -->
    <div v-else-if="section.section === 'arterial-roads'">
      {{section.title}}
    </div>
<!--          BLOCKS AND PLOTS          -->
    <div v-else-if="section.section === 'blocks-and-plots'">
      {{section.title}}
    </div>
  </div>
</template>

<script>
  import {makeChart, makeLine, makeStacked} from '../assets/graphing.js'
  export default {

    name: 'Graphs',
    props: ['section', 'city'],
    data () {
      return {
        chartObjects: {}
      }
    },
    mounted () {
      this.launchGraphs()
    },
    watch: {
      section () {
        this.$nextTick(() => {
          this.launchGraphs()
        })
      }
    },
    methods: {
      canvas (id, classes = 'city-graphic', height = '350px') {
        return `<div class='col-1-1'>
          <canvas id='` + id + `' class='` + classes + `' height="` + height + `"></canvas>
        </div>`
      },
      legend (id) {
        return this.chartObjects[id] && this.chartObjects[id].generateLegend()
      },
      launchGraphs () {
        let chart = {}
        switch (this.section.section) {
          case ('population'):
            let id = 'population_line'
            chart[id] = makeLine(id, this.city, 'Population')
            id = 'population_change_bar'
            chart[id] = makeChart(id, this.city, 'Population Avg. Annual % Change', '%')
            break
          case ('urban-extent'):
            id = 'urban_extent_composition_stacked_bar'
            chart[id] = makeStacked(id, this.city, 'Urban Composition')
            id = 'urban_extent_change_bar'
            chart[id] = makeChart(id, this.city, 'Urban Extent Avg. Annual % Change')
            break
          case ('density'):
            id = 'density_built_up_line'
            chart[id] = makeLine(id, this.city, 'Built-up Area Density (Persons/Hectare)', ' Persons/Hectare')
            id = 'density_built_up_change_bar'
            chart[id] = makeChart(id, this.city, 'Built-up Area Avg. Annual % Change')
            id = 'density_urban_extent_line'
            chart[id] = makeLine(id, this.city, 'Urban Extent Density (Persons/Hectare)', ' Persons/Hectare')
            id = 'density_urban_extent_change_bar'
            chart[id] = makeChart(id, this.city, 'Urban Extent Avg. Annual % Change')
            break
          case ('composition-of-added-area'):

            break
          case ('roads'):
            break
          case ('arterial-roads'):
            break
          case ('blocks-and-plots'):
            break
        }
        this.chartObjects = Object.assign({}, this.chartObjects, chart)
      }
    }
  }

</script>

<style lang="scss">
#population_line, 
#population_change_bar,
#urban_extent_composition_stacked_bar,
#urban_extent_change_bar,
#density_urban_extent_line,
#density_urban_extent_change_bar{
    $height: (233 + 54 + (32 * 2)) / 2;
    max-height: calc(50vh - #{$height}px);
}
#density_built_up_change_bar,
#density_built_up_line,
#density_urban_extent_line,
#density_urban_extent_change_bar {
  $height: (482 + (32 * 2)) / 2;
  max-height: calc(50vh - #{$height}px);
}
.hold-legend{
  position:absolute;
  left:100%;
  top:0px;
}
</style>
