import Chart from 'chart.js'
import {percent, commas} from '../assets/utils.js'

const globalOptions = {
  deferred: {
    enabled: true
    // delay: 500
  },
  maintainAspectRatio: false,
  // responsiveAnimationDuration: 500,
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
  legendCallback: function (chart) {
    var legend = '<ul class="legend-ui">'
    for (var i = 0; i < chart.data.datasets.length; i++) {
      let data = chart.data.datasets[i]
      var color = chart.config.options.legend.labels.fontColor
      legend += '<li style="color:' + color + '">'

      legend += '<div class="legend-click" style="background-color:' + data.backgroundColor + '">'
      legend += '</div>'

      legend += chart.data.datasets[i].label

      legend += '</li>'
    }
    legend += '</ul>'
    return legend
  },
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
let charts = function (city) {
  return {
    'urban_extent_composition_stacked_bar': {
      labels: ['T1', 'T2', 'T3'],
      datasets: [
        {
          backgroundColor: 'rgba(52,22,186,0.5)',
          borderWidth: 0,
          label: ['Urban Built Up'],
          data: [city.DataSet.urban_extent_composition_urban_t1,
            city.DataSet.urban_extent_composition_urban_t2,
            city.DataSet.urban_extent_composition_urban_t3]
        },
        {
          backgroundColor: 'rgba(194,121,159,0.5)',
          borderWidth: 0,
          label: ['Suburban Built Up'],
          data: [city.DataSet.urban_extent_composition_suburban_t1,
            city.DataSet.urban_extent_composition_suburban_t2,
            city.DataSet.urban_extent_composition_suburban_t3]
        },
        {
          backgroundColor: 'rgba(0,0,0,0.5)',
          borderWidth: 0,
          label: ['Rural Built Up'],
          data: [city.DataSet.urban_extent_composition_rural_t1,
            city.DataSet.urban_extent_composition_rural_t2,
            city.DataSet.urban_extent_composition_rural_t3]
        },
        {
          backgroundColor: 'rgba(247,245,80,0.5)',
          borderWidth: 0,
          label: ['Urbanized Open Space'],
          data: [city.DataSet.urban_extent_composition_open_t1,
            city.DataSet.urban_extent_composition_open_t2,
            city.DataSet.urban_extent_composition_open_t3]
        }
      ]
    },
    'roads_width_stacked_bar': {
      labels: [city.City.t1.substr(0, 4) + '-' + city.City.t2.substr(0, 4), city.City.t2.substr(0, 4) + '-' + city.City.t3.substr(0, 4)],
      datasets: [
        {
          backgroundColor: '#889A9A',
          borderWidth: 0,
          label: '<4m',
          data: [city.DataSet.roads_width_under_4m_pre_1990 * 100,
            city.DataSet.roads_width_under_4m_1990_2015 * 100 ]
        },
        {
          backgroundColor: '#93AFA9',
          borderWidth: 0,
          label: '4-8m',
          data: [city.DataSet.roads_width_4_8m_pre_1990 * 100,
            city.DataSet.roads_width_4_8m_1990_2015 * 100 ]
        },
        {
          backgroundColor: '#9FC3B5',
          borderWidth: 0,
          label: '8-12m',
          data: [city.DataSet.roads_width_8_12m_pre_1990 * 100,
            city.DataSet.roads_width_8_12m_1990_2015 * 100 ]
        },
        {
          backgroundColor: '#AED7C0',
          borderWidth: 0,
          label: '12-16m',
          data: [city.DataSet.roads_width_12_16m_pre_1990 * 100,
            city.DataSet.roads_width_12_16m_1990_2015 * 100 ]
        },
        {
          backgroundColor: '#BFECCA',
          borderWidth: 0,
          label: '>16m',
          data: [city.DataSet.roads_width_over_16m_pre_1990 * 100,
            city.DataSet.roads_width_over_16m_1990_2015 * 100 ]
        }
      ]
    },
    'arterial_roads': {
      labels: ['City', 'Region', 'World'],
      datasets: [
        {
          label: 'Wide',
          suffix: '_wide_',
          backgroundColor: '#F1E0DE',
          borderWidth: 0
        },
        {
          label: 'Narrow',
          suffix: '_narrow_',
          backgroundColor: '#E1C6C4',
          borderWidth: 0
        },
        {
          label: 'All',
          suffix: '_all_',
          backgroundColor: '#CEADA9',
          borderWidth: 0
        }
      ]
    },
    'blocks_and_plots_composition_special_stacked': {
      labels: ['City', 'Region', 'World'],
      datasets: [
        {
          suffix: '_atomistic_',
          bgColor: 'rgba(202,145,121,0.5)',
          label: 'Atomistic Settlements'
        },
        {
          suffix: '_informal_',
          bgColor: 'rgba(197,97,77,0.5)',
          label: 'Informal Subdivisions'
        },
        {
          suffix: '_formal_',
          bgColor: 'rgba(164,53,43,0.5)',
          label: 'Formal Subdivisions'
        },
        {
          suffix: '_housing_',
          bgColor: 'rgba(126,8,18,0.5)',
          label: 'Housing Projects'
        }
      ]
    }
  }
}

export var returnSpecialStacked = function (prefix, city, laterYear = true) {
  var field = prefix.replace('_special_stacked', '')

  var data1990 = {
    labels: charts(city)[prefix].labels,
    datasets: []
  }
  var data2015 = {
    labels: charts(city)[prefix].labels,
    datasets: []
  }

  // $(charts[prefix].datasets).each(function(){
  charts(city)[prefix].datasets.forEach(function (dataset) {
    var data = {
      backgroundColor: dataset.bgColor,
      borderWidth: 0,
      label: dataset.label,
      data: [city.DataSet[field + dataset.suffix + 'pre_1990'], city.Region.DataSet[field + dataset.suffix + 'pre_1990'], city.World.DataSet[field + dataset.suffix + 'pre_1990']]
    }
    data1990.datasets.push(JSON.parse(JSON.stringify(data)))
    data.data = [city.DataSet[field + dataset.suffix + '1990_2015'], city.Region.DataSet[field + dataset.suffix + '1990_2015'], city.World.DataSet[field + dataset.suffix + '1990_2015']]
    data2015.datasets.push(JSON.parse(JSON.stringify(data)))
  })
  return laterYear ? data2015 : data1990
}

export var makeSpecialStacked = function (prefix, city, title = '', laterYear = true) {
  var ctx = document.getElementById(prefix)

  return new Chart(ctx, {
    type: 'horizontalBar',
    data: returnSpecialStacked(prefix, city, laterYear),
    options: {
      legend: {
        labels: {
          fontColor: '#4A4A4A',
          boxWidth: 10
        }
      },
      tooltips: {
        callbacks: {
          title: function () {
            return false
          },
          label: function (tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label
            var amount = tooltipItem.xLabel

            // var folded = fold(label, 20, true);
            return percentageTooltip(amount, label)
          }
        }
      },
      title: {
        text: title
      },
      scales: {
        yAxes: stackedYAxes(prefix),
        xAxes: stackedXAxes(prefix)
      }
    }
  })
}

export var makeBlockChart = function (prefix, city, title = '', unit = '', multiply = false) {
  var ctx = document.getElementById(prefix)
  var field = prefix.replace('_bar', '')

  var data = {
    labels: ['Informal', 'Formal'],
    datasets: [
      {
        label: city.City.t1.substr(0, 4) + '-' + city.City.t2.substr(0, 4),
        backgroundColor: 'rgba(229,223,227,1.0)',
        borderWidth: 0,
        data: [city.DataSet[field + '_informal_plot_pre_1990'], city.Region.DataSet[field + '_formal_plot_pre_1990']]
      },
      {
        label: city.City.t2.substr(0, 4) + '-' + city.City.t3.substr(0, 4),
        backgroundColor: 'rgba(176,171,174,1.0)',
        borderWidth: 0,
        data: [city.DataSet[field + '_informal_plot_1990_2015'], city.Region.DataSet[field + '_formal_plot_1990_2015']]
      }
    ]
  }
  var yAxes = [{
    ticks: {
      beginAtZero: true,
      callback: function (value, index, values) {
        return commas(value)
        // return (Math.floor(value * 100) / 100).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')
      }
    }
  }]
  var xAxes = [{
    ticks: {
      beginAtZero: true
    },
    gridLines: {
      display: false
    }
  }]
  return new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      legend: {
        labels: {
          fontColor: '#929292',
          boxWidth: 10
        }
      },
      tooltips: {
        callbacks: {
          label: function (tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label
            // var folded = fold(label, 20, true);
            return bigTooltip(tooltipItem.yLabel, label, unit)
          }
        }
      },
      title: {
        text: title
      },
      scales: {
        yAxes: yAxes,
        xAxes: xAxes
      }
    }
  })
}

export let returnRoadChartData = function (prefix, city, laterYear = true) {
  var field = prefix.replace('_bar', '')
  var data1990 = {
    labels: charts(city).arterial_roads.labels,
    datasets: []
  }
  var data2015 = {
    labels: charts(city).arterial_roads.labels,
    datasets: []
  }

  charts(city).arterial_roads.datasets.forEach(function (dataset) {
    var data = {
      backgroundColor: dataset.backgroundColor,
      borderWidth: 0,
      label: dataset.label,
      data: [city.DataSet[field + dataset.suffix + 'pre_1990'], city.Region.DataSet[field + dataset.suffix + 'pre_1990'], city.World.DataSet[field + dataset.suffix + 'pre_1990']]
    }
    data1990.datasets.push(JSON.parse(JSON.stringify(data)))

    data.data = [city.DataSet[field + dataset.suffix + '1990_2015'], city.Region.DataSet[field + dataset.suffix + '1990_2015'], city.World.DataSet[field + dataset.suffix + '1990_2015']]
    data2015.datasets.push(JSON.parse(JSON.stringify(data)))
  })
  return laterYear ? data2015 : data1990
}

export let makeRoadChart = function (prefix, city, title = '', unit = '', multiply = false, laterYear = true) {
  var ctx = document.getElementById(prefix)

  return new Chart(ctx, {
    type: 'horizontalBar',
    data: returnRoadChartData(prefix, city, laterYear),
    options: {
      legend: {
        labels: {
          fontColor: '#929292',
          boxWidth: 10
        }
      },
      gridLines: {
        display: false
      },
      tooltips: {
        callbacks: {
          title: function () {
            return false
          },
          label: function (tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label
            var number = tooltipItem.xLabel
            if (unit === '%') {
              return percentageTooltip(number, label, multiply)
            } else {
              return bigTooltip(number, label, unit)
            }
          }
        }
      },
      title: {
        text: title
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          },
          gridLines: {
            display: false
          }
        }],
        xAxes: [{
          ticks: {
            beginAtZero: true,
            // max : max,
            callback: function (value, index, values) {
              if (multiply) {
                value *= multiply
              }
              value = Math.floor(value * 100) / 100
              if (unit && (unit === '%' || unit === 'm')) {
                value += unit
              }
              return value
            }
          }
        }]
      }
    }
  })
}

export let makeStacked = function (prefix, city, title, unit = '', multiply = false, vert = false) {
  var ctx = document.getElementById(prefix)
  // var field = prefix.replace('_stacked_bar', '')

  var data = charts(city)[prefix]
  return new Chart(ctx, {
    type: vert ? 'bar' : 'horizontalBar',
    data: data,
    options: {
      legend: {
        labels: {
          fontColor: '#4A4A4A',
          boxWidth: 10
        }
      },
      tooltips: {
        callbacks: {
          title: function () {
            return false
          },
          label: function (tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label
            var number = vert ? tooltipItem.yLabel : tooltipItem.xLabel
            return percentageTooltip(number, label, multiply)
          }
        }
      },
      title: {
        text: title
      },
      scales: {
        yAxes: vert ? stackedXAxes(prefix, multiply) : stackedYAxes(prefix),
        xAxes: vert ? stackedYAxes(prefix) : stackedXAxes(prefix, multiply)
      }
    }
  })
}

export let makeChart = function (prefix, city, title, unit = '', multiply = false, side = false) {
  var ctx = document.getElementById(prefix)
  var field = prefix.replace('_bar', '')
  var suffix1 = side ? '_pre_1990' : '_t1_t2'
  var suffix2 = side ? '_1990_2015' : '_t2_t3'
  var data = {
    labels: [city.City.name, city.Region.name, 'World'],
    datasets: [{
      label: side ? city.City.t1.substr(0, 4) + '-' + city.City.t2.substr(0, 4) : city.City.t1.substr(0, 4) + '-' + city.City.t2.substr(0, 4), // 'T1-T2'
      backgroundColor: '#edc7b6',
      borderWidth: 0,
      data: [city.DataSet[field + suffix1], city.Region.DataSet[field + suffix1], city.World.DataSet[field + suffix1]]
    }, {
      label: side ? city.City.t2.substr(0, 4) + '-' + city.City.t3.substr(0, 4) : city.City.t2.substr(0, 4) + '-' + city.City.t3.substr(0, 4), // 'T2-T3'
      backgroundColor: '#b9a7ae',
      borderWidth: 0,
      data: [city.DataSet[field + suffix2], city.Region.DataSet[field + suffix2], city.World.DataSet[field + suffix2]]
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
          value = commas(value)
          // value = (Math.floor(value * 100) / 100).toString().replace(/\B(?=(\d{3}) + (?!\d))/g, ',')
          // value = newValue == 0 ? value: newValue
          if (unit === '%' || unit === 'm') {
            value += unit
          }
          return value
        } else {
          value = Math.floor(value * 100) / 100
          // value = newValue == 0 ? value: newValue
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
        // return value.split(' ')
      }
    },
    gridLines: {
      display: false
    }
  }]
  return new Chart(ctx, {
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
                return percentageTooltip(number, label, multiply)
              }
              return bigTooltip(number, label, unit)
            } else {
              let number = tooltipItem.yLabel
              return percentageTooltip(number, label, multiply)
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
}

export let makeLine = function (prefix, city, title, unit = '') {
  var ctx = document.getElementById(prefix)
  var field = prefix.replace('_line', '')
  var data = {
    labels: [city.City.t1, city.City.t2, city.City.t3],
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
      data: [city.DataSet[field + '_t1'], city.DataSet[field + '_t2'], city.DataSet[field + '_t3']]
    }]
  }
  var max = Math.max.apply(Math, data.datasets[0].data)
  var min = Math.min.apply(Math, data.datasets[0].data.filter(Boolean))
  var log = Math.floor(Math.log(max) / Math.log(10))
  log = Math.pow(10, log)
  var yMax = Math.ceil((max + min) / log) * log

  return new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
      maintainAspectRatio: false,
      tooltips: {
        callbacks: {
          label: function (tooltipItem, data) {
            var label = tooltipItem.xLabel.substr(0, 4)// + ' ' + data.datasets[tooltipItem.datasetIndex].label
            var number = tooltipItem.yLabel
            var tool = bigTooltip(number, label, unit)
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
              return commas(value)
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

var stackedXAxes = function (id, multiply) {
  return [{
    // stacked: id == 'blocks_and_plots_composition_special_stacked' ? true: true,
    stacked: true,
    ticks: {
      beginAtZero: true,
      max: 100,
      callback: function (value, index, values) {
        if (multiply) {
          value *= multiply
        }
        return value + '%'
      }
    },
    gridLines: {
      display: false
    }
  }]
}

var stackedYAxes = function (id) {
  return [{
    ticks: {
      beginAtZero: true
    },
    stacked: true,
    gridLines: {
      display: false
    },
    categoryPercentage: 0.6,
    barPercentage: 1
  }]
}

let percentageTooltip = function (amount, label, multiply) {
  return label + ': ' + percent(amount, (amount >= 1 ? 1 : 2), multiply)
}

let bigTooltip = function (amount, label, unit) {
  amount = commas(amount, (amount >= 1 ? 1 : 2))
  return label + ': ' + amount + unit
}

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

let fold = function (s, n, useSpaces, a) {
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
