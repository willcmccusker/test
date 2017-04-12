<template>
  <div id='cityContainer' :style='backgroundStyle' :class='currentSection.section'>
    <div id='side-panel'>
      <div class='top-box'>
        <div id='dropdown-nav' class='cursor' :class='{open: dropdown}'>
          <div @click='dropdown = !dropdown' ref='dropdown' class='currentSection' >
            <div class='graph-icon'></div>
            <div class='dropdown-title' v-html="sectionKey === 0 ? 'select data set' : currentSection.title"></div>
            <div class='dropdown-arrow'>
              <img  :src="'/img/arrow-' + (sectionKey === 0 ? 'w' : 'b') + '.svg'">
            </div>
          </div>
          <div class='allSections' v-if='dropdown'>
            <div v-for='section, index in sections'>
              <div class='dropdown-title' @click='sectionKey = index; dropdown = false;' v-html='section.title'></div>
            </div>
          </div>
        </div>

        <section-summary :city='city' :section='currentSection'></section-summary>

      </div>
      <graphs v-if="currentSection.section != 'city-header'" :city='city' :section='currentSection'></graphs>
    </div>
    <mapbox :city='city' :section='currentSection'></mapbox>
  </div>
</template>

<script>
  /* -global city */
  var city = require('../assets/city.json')
  import Mapbox from './Mapbox'
  import SectionSummary from './SectionSummary'
  import Graphs from './Graphs'
  export default {

    name: 'City',

    data () {
      return {
        backgroundLoaded: false,
        city,
        dropdown: false,
        sectionKey: 0,
        sections: [
          {
            section: 'city-header',
            title: 'Summary'
          },
          {
            section: 'population',
            title: 'Population'
          },
          {
            section: 'urban-extent',
            title: 'Urban Extent'
          },
          {
            section: 'density',
            title: 'Density'
          },
          {
            section: 'composition-of-added-area',
            title: 'Composition of Added Area'
          },
          {
            section: 'roads',
            title: 'Roads'
          },
          {
            section: 'arterial-roads',
            title: 'Arterial Roads'
          },
          {
            section: 'blocks-and-plots',
            title: 'Blocks and Plots'
          }
        ]
      }
    },
    computed: {
      currentSection () {
        return this.sections[this.sectionKey]
      },
      backgroundStyle () {
        if (this.sectionKey !== 0) {
          return
        }
        var vm = this
        if (this.backgroundLoaded) {
          var image = '/file-manager/userfiles/photos/'
        } else {
          image = '/file-manager/userfiles/_med/photos/'
          this.loadImage('/file-manager/userfiles/photos/' + this.city.City.photo_path).then(function () {
            vm.backgroundLoaded = true
          })
        }
        return {
          'background-image': 'url("' + image + this.city.City.photo_path + '")'
        }
      }
    },
    methods: {
      loadImage (image) {
        return new Promise((resolve, reject) => {
          var img = new Image()
          img.onload = function () {
            resolve()
          }
          img.src = image
        })
      }
    },
    mounted () {
      var vm = this
      document.addEventListener('click', (e) => {
        if (this.$refs.dropdown && !this.$refs.dropdown.contains(e.target)) {
          vm.dropdown = false
        }
      }, false)
    },
    components: {
      Mapbox,
      SectionSummary,
      Graphs
    }
  }
</script>

<style lang="scss" scoped>
.cursor{
  cursor: pointer;
}
.titleCase {
  text-transform: capitalize;
}
#cityContainer{
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  background-color: #C5C5C5;
  background-blend-mode: multiply; /* no ie support */
  height: 100vh;
  padding-top:54px;
}
.population #side-panel{
  width:50%;
}
#side-panel{
  resize: horizontal;
  transition: width 500ms ease;
  width:316px;
  height:calc(100vh - 54px);
  position:absolute;
  left:0px;
  top:54px;
  background-color: white;
  box-shadow: 0px 2px 4px #C8C8C8;
  color: #5A5A5A;
  .top-box{
    padding:15px;
    background-color: #F3F3F3;
  }
  #dropdown-nav {
    font-size: 14px;
    line-height: 36px;
    position:relative;
    background-color: white;
    margin-top:43px;
    box-shadow: 0px 2px 4px #C8C8C8;
    &.open{
      .dropdown-arrow img{
        transform: rotate(180DEG);
      }
    }
    .dropdown-title {
      cursor: pointer;
      margin-left:16px;
    }
    .currentSection {
      padding:0 15px;
      >div {
        display: inline-block;
      }
      .graph-icon{
        background-image: url('/img/graph.svg');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
        width: 12px;
        height:36px;
      }
      .dropdown-arrow{
        float:right;
        img{
          width:15px;
          vertical-align:middle;
          cursor: pointer;
          transition: transform 500ms ease;
        }
      }
    }
    .allSections{
      box-shadow: 0px 2px 4px #C8C8C8;
      z-index:2;
      position:absolute;
      background-color: white;
      width: 100%;
      top: 36px;
      left:0px;
      border-top: 1px solid #E8E8E8;
      > div {
        padding:0 15px;
      }
      .dropdown-title{
        margin-left:33px;
      }
    }
  }
}
.city-header{
  #side-panel {
    background-color: transparent;
    box-shadow: none;
    color: white;
    .top-box{
      background-color: transparent;
    }
    #dropdown-nav {
      color: white;
      background-color: transparent;
      .currentSection {
        border:1px solid white;
        .dropdown-arrow{

        }
      }
      .allSections{
        background-color: transparent;
      }
    }
  }
}
</style>
