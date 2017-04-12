<template>
   <div id='section-graphs'>
<!--          POPULATION          -->
    <div v-if="section.section === 'population'">
      <div class='grid'>
        <div class='col-1-1'>
          <canvas id='population_line' class='city-graphic no-legend' height="350px"></canvas>
        </div>
      </div>
      <div class='grid'>
        <div class='col-1-1'>
          <canvas id='population_change_bar' class='city-graphic' height="350px"></canvas>
        </div>
      </div>
    </div>
<!--          URBAN EXTENT          -->
    <div v-else-if="section.section === 'urban-extent'">
      {{section.title}}
    </div>
<!--          DENSITY          -->
    <div v-else-if="section.section === 'density'">
      {{section.title}}
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
  import Chart from 'chart.js'

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
      launchGraphs () {
        switch (this.section.section) {
          case ('population'):
            // switchGraph('population_line')
            this.makeLine('population_line', 'Population')
            this.makeChart('population_change_bar', 'Population Avg. Annual % Change', '%')
            // switchGraph('population_change_bar')
            break
        }
      },
      percentageTooltip (amount, label, multiply) {
        return label + ': ' + this.$parent.percent(amount, (amount >= 1 ? 1 : 2), multiply)
      },
      bigTooltip (amount, label, unit) {
        amount = this.$parent.commas(amount, (amount >= 1 ? 1 : 2))
        return label + ': ' + amount + unit
      },
      makeChart (prefix, title, unit = '', multiply = false, side = false) {
        var vm = this
        var ctx = document.getElementById(prefix)
        var field = prefix.replace('_bar', '')
        var suffix1 = side ? '_pre_1990' : '_t1_t2'
        var suffix2 = side ? '_1990_2015' : '_t2_t3'
        var data = {
          labels: [this.city.City.name, this.city.Region.name, 'World'],
          datasets: [{
            label: side ? this.city.City.t1.substr(0, 4) + '-' + this.city.City.t2.substr(0, 4) : this.city.City.t1.substr(0, 4) + '-' + this.city.City.t2.substr(0, 4), // 'T1-T2'
            backgroundColor: '#edc7b6',
            borderWidth: 0,
            data: [this.city.DataSet[field + suffix1], this.city.Region.DataSet[field + suffix1], this.city.World.DataSet[field + suffix1]]
          }, {
            label: side ? this.city.City.t2.substr(0, 4) + '-' + this.city.City.t3.substr(0, 4) : this.city.City.t2.substr(0, 4) + '-' + this.city.City.t3.substr(0, 4), // 'T2-T3'
            backgroundColor: '#b9a7ae',
            borderWidth: 0,
            data: [this.city.DataSet[field + suffix2], this.city.Region.DataSet[field + suffix2], this.city.World.DataSet[field + suffix2]]
          }
          ]
        }

        var yAxes = [{
          ticks: {
            beginAtZero: true,
            callback: function (value, index, values) {
              if (side) {
                if (multiply) {
                  value *= multiply
                }
                value = (Math.floor(value * 100) / 100).toString().replace(/\B(?=(\d{3}) + (?!\d))/g, ',')
                // value = newValue == 0 ? value : newValue
                if (unit === '%' || unit === 'm') {
                  value += unit
                }
                return value
              } else {
                value = Math.floor(value * 100) / 100
                // value = newValue == 0 ? value : newValue
                return value + '%'
              }
            }
          }
        }]
        var xAxes = [{
          ticks: {
            beginAtZero: true,
            callback: function (value, index, values) {
              return fold(value, 15, true)
              // return value.split(" ")
            }
          },
          gridLines: {
            display: false
          }
        }]
        this.chartObjects[prefix] = new Chart(ctx, {
          type: side ? 'horizontalBar' : 'bar',
          data: data,
          options: {
            legend: {
              labels: {
                fontColor: '#929292',
                boxWidth: 10
              }
            },
            responsive: true,
            gridLines: {
              display: false
            },
            tooltips: {
              callbacks: {
                title: function () {
                  return false
                },
                label: function (tooltipItem, data) {
                  let label = data.datasets[tooltipItem.datasetIndex].label
                  if (side) {
                    let number = tooltipItem.xLabel
                    if (unit === '%') {
                      return vm.percentageTooltip(number, label, multiply)
                    }
                    return vm.bigTooltip(number, label, unit)
                  } else {
                    let number = tooltipItem.yLabel
                    return vm.percentageTooltip(number, label, multiply)
                  }
                }
              }
            },
            title: {
              text: title
            },
            scales: {
              yAxes: side ? xAxes : yAxes,
              xAxes: side ? yAxes : xAxes
            }
          }
        })
      },
      makeLine (prefix, title, unit = '') {
        let vm = this
        var ctx = document.getElementById(prefix)
        var field = prefix.replace('_line', '')
        var data = {
          labels: [this.city.City.t1, this.city.City.t2, this.city.City.t3],
          datasets: [{
            pointRadius: 5,
            borderJoinStyle: 'miter',
            lineTension: 0,
            borderWidth: 1,
            borderColor: '#7b7b7b',
            pointBorderColor: '#7b7b7b',
            pointBorderWidth: 1,
            fill: false,
            label: title,
            data: [this.city.DataSet[field + '_t1'], this.city.DataSet[field + '_t2'], this.city.DataSet[field + '_t3']]
          }]
        }
        var max = Math.max.apply(Math, data.datasets[0].data)
        var min = Math.min.apply(Math, data.datasets[0].data.filter(Boolean))
        var log = Math.floor(Math.log(max) / Math.log(10))
        log = Math.pow(10, log)
        var yMax = Math.ceil((max + min) / log) * log

        this.chartObjects[prefix] = new Chart(ctx, {
          type: 'line',
          data: data,
          options: {
            maintainAspectRatio: false,
            tooltips: {
              callbacks: {
                label: function (tooltipItem, data) {
                  var label = tooltipItem.xLabel.substr(0, 4)// + " " + data.datasets[tooltipItem.datasetIndex].label
                  var number = tooltipItem.yLabel
                  var tool = vm.bigTooltip(number, label, unit)
                  return tool
                }
              }
            },
            title: {
              text: title
            },
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                ticks: {
                  min: 0,
                  max: yMax,
                  callback: function (value, index, values) {
                    return vm.$parent.commas(value)
                  }
                }
              }],
              xAxes: [{
                type: 'time',
                time: {
                  displayFormats: {
                    quarter: 'MMM YYYY'
                  },
                  min: new Date('1988-01-01'),
                  max: new Date('2016-01-01'),
                  unitStepSize: 5
                }
              }]
            }
          }
        })
      }

    }
  }

  const globalOptions = {
    deferred: {
      enabled: true
      // delay : 500
    },
    maintainAspectRatio: false,
    // responsiveAnimationDuration : 500,
    title: {
      display: true
    },
    tooltips: {
      display: true,
      displayColors: false,
      callbacks: {
        title: function () {
          return ''
        }
      }
    },
    animation: {
      onComplete: function () {
        // drawComplete = true
      }
    },
    legend: {
      display: false,
      position: 'right'
    },
    // legendCallback: function (chart) {
      // var legend = $("<ul>").addClass("legend-ul")
      // for(var i=0;i<chart.data.datasets.length; i +  + ) {
      //   data = chart.data.datasets[i]
      //   var color = chart.config.options.legend.labels.fontColor

      //   $(legend).append(
      //     $("<li>").attr("style" , "color:" + color)
      //     .append(
      //       $("<div>").addClass("legend-click")
      //       .attr("style", "background-color:" + data.backgroundColor)
      //     ).append(chart.data.datasets[i].label)
      //   )
      // }
      // return $(legend).outerHTML()
    // },
    responsive: true,
    defaultFontFamily: 'Helvetica',
    yAxes: {
      display: true
    },
    xAxes: {
      display: true
    }
  }
  Chart.defaults.global = MergeRecursive(Chart.defaults.global, globalOptions)

  /*
  * Recursively merge properties of two objects
  */
  function MergeRecursive (obj1, obj2) {
    for (var p in obj2) {
      try {
        // Property in destination object set; update its value.
        if (obj2[p].constructor === Object) {
          obj1[p] = MergeRecursive(obj1[p], obj2[p])
        } else {
          obj1[p] = obj2[p]
        }
      } catch (e) {
        // Property in destination object not set; create it and set its value.
        obj1[p] = obj2[p]
      }
    }
    return obj1
  }

  //
  // Folds a string at a specified length, optionally attempting
  // to insert newlines after whitespace characters.
  //
  // s          -  input string
  // n          -  number of chars at which to separate lines
  // useSpaces  -  if true, attempt to insert newlines at whitespace
  // a          -  array used to build result
  //
  // Returns an array of strings that are no longer than n
  // characters long.  If a is specified as an array, the lines
  // found in s will be pushed onto the end of a.
  //
  // If s is huge and n is very small, this metho will have
  // problems... StackOverflow.
  //

  function fold (s, n, useSpaces, a) {
    a = a || []
    if (s.length <= n) {
      a.push(s)
      return a
    }
    var line = s.substring(0, n)
    if (!useSpaces) { // insert newlines anywhere
      a.push(line)
      return fold(s.substring(n), n, useSpaces, a)
    } else { // attempt to insert newlines after whitespace
      var lastSpaceRgx = /\s(?!.*\s)/
      var idx = line.search(lastSpaceRgx)
      var nextIdx = n
      if (idx > 0) {
        line = line.substring(0, idx)
        nextIdx = idx
      }
      a.push(line)
      return fold(s.substring(nextIdx), n, useSpaces, a)
    }
  }
</script>

<style lang="css" scoped>
#population_line, #population_change_bar{
    max-height: calc(50vh - 178px);
}
</style>
