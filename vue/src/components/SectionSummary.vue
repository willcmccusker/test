<template>
  <div id='section-summary'>
<!--          POPULATION          -->
    <div v-if="section.section === 'population'">
      <div class='grid no-pad' v-html="t123('population')"></div>
      <div class='grid no-pad' v-html="changeT123('population_change')"></div>
    </div>
<!--          URBAN EXTENT          -->
    <div v-else-if="section.section === 'urban-extent'">
      <div class='grid no-pad' v-html="t123('urban_extent_actuals')"></div>
      <div class='grid no-pad' v-html="changeT123('urban_extent_change')"></div>
    </div>
<!--          DENSITY          -->
    <div v-else-if="section.section === 'density'">
      <div class='grid no-pad' v-html="title('Built-up Area Density (Person/Hectare)')"></div>
      <div class='grid no-pad' v-html="t123('density_built_up')"></div>
      <div class='grid no-pad' v-html="changeT123('density_built_up_change')"></div>
      <div class='grid no-pad' v-html="title('Urban Extent Density (Person/Hectare)')"></div>
      <div class='grid no-pad' v-html="t123('density_urban_extent')"></div>
      <div class='grid no-pad' v-html="changeT123('density_urban_extent_change')"></div>
    </div>
<!--          COMPOSITION OF ADDED AREA          -->
    <div v-else-if="section.section === 'composition-of-added-area'">
      <div class='grid no-pad' v-html="t12_23"></div>
      <div class='grid no-pad' v-html="changeT12_23('added_area_total')"></div>
    </div>
<!--          ROADS          -->
    <div v-else-if="section.section === 'roads'">
      <div class='grid no-pad' v-html="title('Average Road Width (m)')"></div>
      <div class='grid no-pad' v-html="t1_3"></div>
      <div class='grid no-pad' v-html="changeT1_13('roads_average_width')"></div>
      <div class='grid no-pad' v-html="title('Share of built up area occupied by roads')"></div>
      <div class='grid no-pad' v-html="changeT1_13('roads_in_built_up_area', true)"></div>
    </div>
<!--          ARTERIAL ROADS          -->
    <div v-else-if="section.section === 'arterial-roads'">
      <div class='grid no-pad' v-html="title('Density of Arterial Roads (km/km2)')"></div>
      <div class='grid no-pad' v-html="t1_3"></div>
      <div class='grid no-pad' v-html="changeT1_13('arterial_roads_density_all')"></div>
      <div class='grid no-pad' v-html="title('Share of built up area within walking distance of an arterial road')"></div>
      <div class='grid no-pad' v-html="changeT1_13('arterial_roads_walking_all', true)"></div>
    </div>
<!--          BLOCKS AND PLOTS          -->
    <div v-else-if="section.section === 'blocks-and-plots'">
      <div class='grid no-pad' v-html="title('Average Block Size (hectares)')"></div>
      <div class='grid no-pad' v-html="t1_3"></div>
      <div class='grid no-pad' v-html="changeT1_13('blocks_plots_average_block')"></div>
    </div>
  </div>
</template>

<script>
  export default {

    name: 'SectionSummary',
    props: ['section', 'city'],
    data () {
      return {

      }
    },
    computed: {
      t12_23 () {
        let divs = ''
        for (let i = 1; i < 3; i++) {
          divs += `<div class="col-1-2">
                      <div  class="summary-sub-title">` + this.city.City['t' + i].substr(0, 4) + `–` + this.city.City['t' + (i + 1)].substr(0, 4) + `</div>
                  </div>`
        }
        return divs
      },
      t1_3 () {
        let divs = ''
        divs += `<div class="col-1-2">
                    <div  class="summary-sub-title">Pre ` + this.city.City['t1'].substr(0, 4) + `</div>
                </div>`
        divs += `<div class="col-1-2">
                    <div  class="summary-sub-title">` + this.city.City['t1'].substr(0, 4) + '—' + this.city.City['t3'].substr(0, 4) + `</div>
                </div>`
        return divs
      }
    },
    methods: {
      title (title) {
        return `<div class='col-1-1'>
                  <div class="summary-sub-title">` + title + `</div>
                </div>`
      },
      t123 (key) {
        let divs = ''
        for (let i = 1; i < 4; i++) {
          divs += `<div class="col-1-3">
                      <div class="summary-sub-title">` + this.city.City['t' + i].substr(0, 4) + `</div>
                      <div>` + this.$parent.commas(this.city.DataSet[key + '_t' + i]) + `</div>
                  </div>`
        }
        return divs
      },
      changeT123 (key) {
        let divs = '<div class="col-1-3">% Change</div>'
        for (let i = 1; i < 3; i++) {
          divs += `<div class="col-1-3">
                      <div>` + this.$parent.percent(this.city.DataSet[key + '_t' + i + '_t' + (i + 1)]) + `</div>
                  </div>`
        }
        return divs
      },
      changeT12_23 (key) {
        let divs = ''
        for (let i = 1; i < 3; i++) {
          divs += `<div class="col-1-2">
                      <div>` + this.$parent.commas(this.city.DataSet[key + '_t' + i + '_t' + (i + 1)]) + `</div>
                  </div>`
        }
        return divs
      },
      changeT1_13 (key, percent = false) {
        let divs = ''
        for (let i = 1; i < 3; i++) {
          let dates = i === 1 ? '_pre_1990' : '_1990_2015'
          let value = this.city.DataSet[key + dates]
          value = percent ? this.$parent.percent(value) : value
          divs += `<div class="col-1-2">
                      <div>` + value + `</div>
                  </div>`
        }
        return divs
      }
    }
  }
</script>

<style lang="scss">
#section-summary {
  font-size:13.3px;
  line-height:17.75px;
  padding-top:20px;
  .summary-sub-title{
    color: #939393;
  }
}
</style>
