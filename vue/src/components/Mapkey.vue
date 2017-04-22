<template>
  <div id='map-key'>
    <div class='map-key-years'>
      <div class='map-key-year' v-for='i, index in periodLoop' :class='{current: i.checked, always: alwaysChecked}' @click='checkYear(index)'>
        <div class='map-key-checkbox'></div>
        <div class='map-key-period' v-html='i.display'></div>
      </div>
    </div>
    <div v-if='section.section === "urban-extent"' class='cursor showLayers' @click='extraLayersVisible = !extraLayersVisible'>{{extraLayersVisible ? 'Hide': 'Show'}} Urban Composition</div>
    <div v-if='extraLayersVisible' class='map-key-layers '>
      <div @click='checkLayer(index, layer)' :class="{'no-click' : section.section === 'blocks-and-plots'}" class='layer-action cursor' v-for='layer, index in layersFiltered'>
        <div class='layer-checkbox' :style="layerStyle(layer)"></div>
        <div class='layer-title' v-html='layer.display'></div>
      </div>
    </div>
  </div>
</template>

<script>

  export default {

    name: 'Mapkey',
    props: ['city', 'map', 'section', 'layers'],
    data () {
      return {
        yearIndex: 1,
        extraLayersVisible: false,
        years: [
          {checked: true},
          {checked: true},
          {checked: true}
        ],
        spanKey: 1
      }
    },
    computed: {
      layersFiltered () {
        return this.layers.filter(l => l.color)
      },
      alwaysChecked () {
        switch (this.section.section) {
          case ('arterial-roads'):
            return true
          default:
            return false
        }
      },
      periodLoop () {
        switch (this.section.section) {
          case ('urban-extent'):
            return this.yearsComputed
          case ('composition-of-added-area'):
            // fall through
          case ('roads'):
            // fall through
          case ('blocks-and-plots'):
            // fall through
          case ('arterial-roads'):
            return this.spansComputed
          default:
            return []
        }
      },
      spansComputed () {
        return [
          {
            display: this.city.City.t1.substr(0, 4) + '–' + this.city.City.t2.substr(0, 4),
            checked: this.spanKey === 0
          },
          {
            display: this.city.City.t2.substr(0, 4) + '–' + this.city.City.t3.substr(0, 4),
            checked: this.spanKey === 1
          }
        ]
      },
      yearsComputed () {
        return [
          {
            display: this.city.City.t1.substr(0, 4),
            checked: this.years[0].checked
          },
          {
            display: this.city.City.t2.substr(0, 4),
            checked: this.years[1].checked
          },
          {
            display: this.city.City.t3.substr(0, 4),
            checked: this.years[2].checked
          }
        ]
      }
    },
    mounted () {
      this.checkLayerPanel()
      if (this.map) {
        this.evaluateChecks()
      }
    },
    methods: {
      layerStyle (layer) {
        return layer.on && {
          'background-color': layer.color
        }
      },
      checkLayerPanel () {
        switch (this.section.section) {
          case ('urban-extend'):
            // fall through
          case ('roads'):
            // fall through
          case ('arterial-roads'):
            this.extraLayersVisible = false
            break
          default:
            this.extraLayersVisible = true
        }
      },
      checkLayer (i, layer) {
        this.$parent.setLayer(i, !layer.on)
        this.evaluateChecks()
      },
      checkYear (i) {
        switch (this.section.section) {
          case ('urban-extent'):
            if (this.extraLayersVisible) {
              this.years.forEach((year, ii) => {
                this.years[ii].checked = i === ii
              })
            } else {
              this.years.splice(i, 1, {checked: !this.years[i].checked})
            }
            break
          case ('composition-of-added-area'):
            // fall through
          case ('roads'):
            // fall through
          case ('blocks-and-plots'):
            this.spanKey = i
            break
        }

        this.evaluateChecks()
      },
      period (i) {
        return this.city.City['t' + (i + 1)].substr(0, 4)
      },
      evaluateChecks () {
        switch (this.section.section) {
          case ('urban-extent'):
            // fall through
          case ('composition-of-added-area'):
            if (this.extraLayersVisible) {
              var timePeriod = 't' + (this.periodLoop.findIndex(y => y.checked) + 1)
              var timePeriod_ = 't' + (this.periodLoop.findIndex(y => y.checked) + 2)
              var layersToAdd = []
              this.layers.forEach((layer) => {
                if (layer.on) {
                  layersToAdd.push(layer.name.replace('??', timePeriod).replace('!!', timePeriod_))
                }
              })
            } else {
              var sequence = ''
              this.years.forEach((y) => {
                sequence += y.checked ? '1' : '0'
              })
              layersToAdd = []
              switch (sequence) {
                case ('000'):
                  break
                case ('100'):
                  layersToAdd.push('extent_t1_inner')
                  break
                case ('110'):
                  layersToAdd.push('extent_t1_inner')
                  layersToAdd.push('extent_t2_middle')
                  break
                case ('101'):
                  layersToAdd.push('extent_t1_inner')
                  layersToAdd.push('extent_t3_middle')
                  layersToAdd.push('extent_t3_outer')
                  break
                case ('111'):
                  layersToAdd.push('extent_t1_inner')
                  layersToAdd.push('extent_t2_middle')
                  layersToAdd.push('extent_t3_outer')
                  break
                case ('010'):
                  layersToAdd.push('extent_t2_inner')
                  layersToAdd.push('extent_t2_middle')
                  break
                case ('011'):
                  layersToAdd.push('extent_t2_inner')
                  layersToAdd.push('extent_t2_middle')
                  layersToAdd.push('extent_t3_outer')
                  break
                case ('001'):
                  layersToAdd.push('extent_t3_inner')
                  layersToAdd.push('extent_t3_middle')
                  layersToAdd.push('extent_t3_outer')
                  break
              }
            }
            var layersToRemove = this.$parent.getLayers()
            layersToRemove.forEach((layerToRemove) => {
              var layerToAddKey = layersToAdd.findIndex(l => l === layerToRemove.options.name)
              if (layerToAddKey > -1) {
                layersToAdd.splice(layerToAddKey, 1)
              } else {
                this.$emit('remove-layer', layerToRemove.options.name)
              }
            })
            layersToAdd.forEach(layer => this.$emit('add-layer', layer))
            break
          case ('arterial-roads'):
            this.$parent.removeAll()
            this.$emit('add-layer', this.layers[0].name)
            break
          case ('blocks-and-plots'):
            // fall through
          case ('roads'):
            this.$parent.removeAll()
            timePeriod = 't' + (this.periodLoop.findIndex(y => y.checked))
            console.log(timePeriod)
            console.log(this.layers[0].name.replace('??', timePeriod))
            this.$emit('add-layer', this.layers[0].name.replace('??', timePeriod))
            break
          default:
            this.$parent.removeAll()
        }
      }
    },
    watch: {
      'section.section': function () {
        this.checkLayerPanel()
        this.evaluateChecks()
      },
      map () {
        this.evaluateChecks()
      },
      extraLayersVisible () {
        if (this.extraLayersVisible) {
          this.years[0].checked = false
          this.years[1].checked = false
          this.years[2].checked = true
        }
        this.evaluateChecks()
      }
    }
  }
</script>

<style lang="scss" scoped>
@import '../assets/colors.scss';

#map-key {
  position:fixed;
  top:101px;
  right:16px;
  width:190px;
  background-color: white;
  color: $dark-grey-2;
  font-size: 12px;
  line-height:16px;

  .map-key-years {
    padding: 14px;
    border-bottom: 1px solid $line-grey-5;
    .map-key-year {
      margin:14px 0px;
      cursor: pointer;
      &:first-of-type{
        .map-key-checkbox {
          border: 1px solid #8747DF;
        }
        &.always,
        &.current {
          .map-key-checkbox {
            border: 0px solid #8747DF;
            background-color: #2E2E76;
          }
        }
      }
      &:nth-of-type(2) {
        .map-key-checkbox {
          border: 1px solid #AC2341;
        }
        &.always,
        &.current {
          .map-key-checkbox {
            background-color: #AC2341;
          }
        }
      }
      &:nth-of-type(3) {
        .map-key-checkbox {
          border: 1px solid #DA8B40;
        } 
        &.always,
        &.current {
          .map-key-checkbox {
            background-color: #DA8B40;
          }
        }
      }

      &.always{
        cursor: normal;
        pointer-events: none;
      }
      &.always,
      &.current {
        .map-key-checkbox {
          position:relative;
          &:after {
            content: '';
            background-image: url('/img/check.svg');
            position:absolute;
            left:0px;
            top:0px;
            width:100%;
            height:100%;
            background-size: 12px 10px;
            background-position: center center;
            display:block;
            background-repeat: no-repeat;
          }
        }
      }
      .map-key-period {
        display: inline-block;
      }
      .map-key-checkbox {
        margin-right: 8px;
        display: inline-block;
        width: 16px;
        height:16px;
        background: #FFFFFF;
        box-shadow: inset 0 1px 3px 0 rgba(0,0,0,0.50);
        border-radius: 2px;
      }
    }
  }
  .showLayers {
    padding:16px;
    font-weight:bold;
  }
  .map-key-layers{
    padding: 16px;
    .layer-action {
      margin:16px 0px;
      &.no-click {
        pointer-events: none;
        cursor: default;
      }
      &:first-of-type{
        margin-top:0px;
      }
      &:last-of-type{
        margin-bottom:0px;
      }
      .layer-checkbox {
        width:16px;
        height:16px;
        border-radius: 999px;
        display:block;
        float: left;
        border: 1px solid $line-grey-3;
        background-color: white;
      }
      .layer-title {
        margin-left: 32px;
        line-height:16px;
      }
      &:nth-of-type(1) .layer-checkbox.checked{
        background-color: #978AD8;
      }
      &:nth-of-type(2) .layer-checkbox.checked{
        background-color: #DCB8CA;
      }
      &:nth-of-type(3) .layer-checkbox.checked{
        background-color: #7C7C7C;
      }
      &:nth-of-type(4) .layer-checkbox.checked{
        background-color: #F6F5A4;
      }
      &:nth-of-type(5) .layer-checkbox.checked{
        background-color: #BCBCBC;
      }
      &:nth-of-type(6) .layer-checkbox.checked{
        background-color: #E1E1E1;
      }
    }
  }
}
</style>
