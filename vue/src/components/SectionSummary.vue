<template>
  <div id='section-summary' class='summary' :class="{open: dropdown}">
    <div class='cursor'  @click='dropdown = !dropdown' >
      <div class='more-title' >{{section.title}} Summary</div>
    </div>
<!--     <transition
    v-on:enter="enter"
    v-on:leave="leave"> -->
    <div class='show-more' v-show='dropdown'>
  <!--          POPULATION          -->
      <div v-if="section.section === 'population'">
        <div class='grid no-pad' v-html="t123Title"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('Population')"></div>
        <div class='grid no-pad' v-html="t123('population')"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('% Change')"></div>
        <div class='grid no-pad' v-html="changeT123('population_change')"></div>
      </div>
  <!--          URBAN EXTENT          -->
      <div v-else-if="section.section === 'urban-extent'">
        <div class='grid no-pad' v-html="t123Title"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('Urban Extent in Hectares')"></div>
        <div class='grid no-pad' v-html="t123('urban_extent_actuals')"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('% Change')"></div>
        <div class='grid no-pad' v-html="changeT123('urban_extent_change')"></div>
      </div>
  <!--          DENSITY          -->
      <div v-else-if="section.section === 'density'">
        <div class='grid no-pad' v-html="t123Title"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('Built-up Area Density (Person/Hectare)')"></div>
        <div class='grid no-pad' v-html="t123('density_built_up')"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('% Change')"></div>
        <div class='grid no-pad' v-html="changeT123('density_built_up_change')"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('Urban Extent Density (Person/Hectare)')"></div>
        <div class='grid no-pad' v-html="t123('density_urban_extent')"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('% Change')"></div>
        <div class='grid no-pad' v-html="changeT123('density_urban_extent_change')"></div>
      </div>
  <!--          COMPOSITION OF ADDED AREA          -->
      <div v-else-if="section.section === 'composition-of-added-area'">
        <div class='grid no-pad' v-html="t12_23Title"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('Added Built-up Area in hectares')"></div>
        <div class='grid no-pad' v-html="changeT12_23('added_area_total')"></div>
      </div>
  <!--          ROADS          -->
      <div v-else-if="section.section === 'roads'">
        <div class='grid no-pad' v-html="t1_3"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('Average Road Width (m)')"></div>
        <div class='grid no-pad' v-html="changeT1_13('roads_average_width')"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('Share of built up area occupied by roads')"></div>
        <div class='grid no-pad' v-html="changeT1_13('roads_in_built_up_area', true)"></div>
      </div>
  <!--          ARTERIAL ROADS          -->
      <div v-else-if="section.section === 'arterial-roads'">
        <div class='grid no-pad' v-html="t1_3"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('Density of Arterial Roads (km/km&sup2;)')"></div>
        <div class='grid no-pad' v-html="changeT1_13('arterial_roads_density_all')"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('Share of built up area within walking distance of an arterial road')"></div>
        <div class='grid no-pad' v-html="changeT1_13('arterial_roads_walking_all', true)"></div>
      </div>
  <!--          BLOCKS AND PLOTS          -->
      <div v-else-if="section.section === 'blocks-and-plots'">
        <div class='grid no-pad' v-html="t1_3"></div>
        <div class='grid no-pad no-pad-bottom' v-html="title('Average Block Size (hectares)')"></div>
        <div class='grid no-pad' v-html="changeT1_13('blocks_plots_average_block')"></div>
      </div>
    </div>
<!--     </transition> -->
  </div>
</template>

<script>
  import {percent, commas} from '../assets/utils.js'

  export default {

    name: 'SectionSummary',
    props: ['section', 'city'],
    data () {
      return {
        dropdown: true
      }
    },
    computed: {
      t123Title () {
        let divs = ''
        for (let i = 1; i < 4; i++) {
          divs += `<div class="col-1-3 no-pad">
                      <div class="summary-sub-title-num">` + this.city.City['t' + i].substr(0, 4) + `</div>
                  </div>`
        }
        return divs
      },
      t12_23Title () {
        let divs = ''
        for (let i = 1; i < 3; i++) {
          divs += `<div class="col-1-2 no-pad">
                      <div  class="summary-sub-title-num">` + this.city.City['t' + i].substr(0, 4) + `–` + this.city.City['t' + (i + 1)].substr(0, 4) + `</div>
                  </div>`
        }
        return divs
      },
      t1_3 () {
        let divs = ''
        divs += `<div class="col-1-2 no-pad">
                    <div  class="summary-sub-title-num">Pre ` + this.city.City['t1'].substr(0, 4) + `</div>
                </div>`
        divs += `<div class="col-1-2 no-pad">
                    <div  class="summary-sub-title-num">` + this.city.City['t1'].substr(0, 4) + '—' + this.city.City['t3'].substr(0, 4) + `</div>
                </div>`
        return divs
      }
    },
    methods: {
      enter (el, done) {
        // this.$velocity(el, 'slideDown', {duration: 500})
      },
      leave (el, done) {
        // this.$velocity(el, 'slideUp', {duration: 500})
      },
      title (title) {
        return `<div class='col-1-1'>
                  <div class="summary-sub-title">` + title + `</div>
                </div>`
      },
      t123 (key) {
        let divs = ''
        for (let i = 1; i < 4; i++) {
          divs += `<div class="col-1-3 no-pad">
                      <div class='value'>` + commas(this.city.DataSet[key + '_t' + i]) + `</div>
                  </div>`
        }
        return divs
      },
      changeT123 (key) {
        let divs = '<div class="col-1-3"></div>'
        for (let i = 1; i < 3; i++) {
          divs += `<div class="col-1-3 no-pad">
                      <div class='value'>` + percent(this.city.DataSet[key + '_t' + i + '_t' + (i + 1)]) + `</div>
                  </div>`
        }
        return divs
      },
      changeT12_23 (key) {
        let divs = ''
        for (let i = 1; i < 3; i++) {
          divs += `<div class="col-1-2  no-pad">
                      <div class='value'>` + commas(this.city.DataSet[key + '_t' + i + '_t' + (i + 1)]) + `</div>
                  </div>`
        }
        return divs
      },
      changeT1_13 (key, perc = false) {
        let divs = ''
        for (let i = 1; i < 3; i++) {
          let dates = i === 1 ? '_pre_1990' : '_1990_2015'
          let value = this.city.DataSet[key + dates]
          value = perc ? percent(value) : value
          divs += `<div class="col-1-2  no-pad">
                      <div class='value'>` + value + `</div>
                  </div>`
        }
        return divs
      }
    }
  }
</script>

<style lang="scss">

@import '../assets/colors.scss';


#section-summary {
  background-color: white;
  font-size:12px;
  line-height:12px;
  padding:12px;
  &.open {
    // padding-bottom:0px;
    // .margin-title {
    //   margin-bottom: 12px;
    // }
  }
  .grid {
    padding-bottom: 0px;
    margin-bottom:10px 
  }
  .more-title{
    margin-top:0px;
  }
  .col-1-2:first-of-type,
  .col-1-3:first-of-type{
    & > div {
      padding-left:0px;
    }
    .summary-sub-title-num{
      border-left: none;
    }
  }
  .col-1-2 > div,
  .col-1-3 > div {
    padding:0px 6px;
  }
  .summary-sub-title-num{
    color: $light-dark-grey;
    border-bottom: 1px solid $line-grey;
    border-left: 1px solid $line-grey;
    line-height:17px;
  }
  .summary-sub-title{
    color: $light-grey;
  }
  .value {
    color: $dark-grey;
    margin-bottom:12px;
  }
}
</style>
