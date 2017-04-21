<template>
  <div id='map-key'>
    <div v-if='timePeriodsVisible' class='map-key-years'>
      <div class='map-key-year' v-for='i, index in years' :class='{current: i.checked}' @click='checkYear(index)'>
        <div class='map-key-checkbox'></div>
        <div class='map-key-period' v-html='period(index)'></div>
      </div>
    </div>
    <div v-if='extraLayersVisible' class='map-key-layers'>
      <div class='map-key-layer' v-for='layer in map'>

      </div>
    </div>
  </div>
</template>

<script>

  export default {

    name: 'Mapkey',
    props: ['city', 'map', 'section'],
    data () {
      return {
        yearIndex: 1,
        extraLayersVisible: false,
        years: [
          {checked: true},
          {checked: false},
          {checked: false}
        ]
      }
    },
    computed: {
      timePeriodsVisible () {
        switch (this.section.section) {
          case ('urban-extent'):
            return true
          default:
            return false
        }
      }
    },
    methods: {
      checkYear (i) {
        this.years.splice(i, 1, {checked: !this.years[i].checked})
      },
      period (i) {
        return this.city.City['t' + (i + 1)].substr(0, 4)
      }
    },
    watch: {
      years () {
        console.log('changed')
        if (this.extraLayersVisible) {
          console.log('hier')
        } else {
          console.log('na hier')
          if (this.years[2].checked) {
            this.$emit('add-layer', 'extent_t3_outer')
            if (this.years[1].checked) {
              this.$emit('remove-layer', 'extent_t3_middle')
              this.$emit('add-layer', 'extent_t2_middle')
              if (this.years[0].checked) {
                this.$emit('remove-layer', 'extent_t3_inner')
                this.$emit('remove-layer', 'extent_t2_inner')
                this.$emit('add-layer', 'extent_t1_inner')
              } else {
                this.$emit('remove-layer', 'extent_t1_inner')
                this.$emit('remove-layer', 'extent_t3_inner')
                this.$emit('add-layer', 'extent_t2_inner')
              }
            } else {
              this.$emit('add-layer', 'extent_t3_middle')
              this.$emit('remove-layer', 'extent_t2_middle')
              if (this.years[0].checked) {
                this.$emit('add-layer', 'extent_t1_inner')
                this.$emit('remove-layer', 'extent_t2_inner')
                this.$emit('remove-layer', 'extent_t3_inner')
              } else {
                this.$emit('add-layer', 'extent_t3_inner')
                this.$emit('remove-layer', 'extent_t1_inner')
                this.$emit('remove-layer', 'extent_t2_inner')
              }
            }
          } else {
            this.$emit('remove-layer', 'extent_t3_outer')
          }
        }
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
        &.current {
          .map-key-checkbox {
            background-color: #DA8B40;
          }
        }
      }
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
}
</style>
