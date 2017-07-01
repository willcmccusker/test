<template>
  <div id='cityContainer' :style='backgroundStyle' :class='currentSection.section'>
    
    <div id='side-panel'> 
      <div id='side-panel-1'>       
        <city-dropdown :sectionKey='sectionKey' :city='city'></city-dropdown>
        <city-summary :sectionKey='sectionKey' :city='city'></city-summary>  
      </div>
      <div id='side-panel-2'>
        <section-dropdown v-on:setKey='setKey' :sections='sections' :sectionKey='sectionKey'></section-dropdown>
        <section-summary  v-if='sectionKey != 0' :city='city' :section='currentSection' ></section-summary>
      </div>
    </div>
    <div id='city-header-data' class='grid center' v-if="currentSection.section === 'city-header'">
      <div class='col-1-3 mob-1-1'>
        <div class='title'>
          {{city.City.t3.substr(0,4)}} Population
        </div>
        <div class='value' v-html='commas(city.City.population)'></div>
        <div class='unit'></div>
      </div>
      <div class='col-1-3 mob-1-1'>
        <div class='title'>
          {{city.City.t3.substr(0,4)}} Density
        </div>
        <div class='value' v-html='commas(city.City.density)'>
        </div>
        <div class='unit'>
        persons/hectare
        </div>
      </div>
      <div class='col-1-3 mob-1-1'>
        <div class='title'>
          {{city.City.t3.substr(0,4)}} Urban Extent
        </div>
        <div class='value' v-html='commas(city.City.extent)'>
        </div>
        <div class='unit'>
          hectares
        </div>
      </div>
    </div>

    <template v-else>
      <map-graphs :city='city' :currentSection='currentSection'></map-graphs>
    </template>
    
  </div>
</template>

<script>

  import SectionDropdown from './SectionDropdown'
  import SectionSummary from './SectionSummary'
  import CityDropdown from './CityDropdown'
  import CitySummary from './CitySummary'
  import MapGraphs from './MapGraphs'
  import {commas} from '../assets/utils.js'
  export default {

    name: 'City',

    data () {
      return {
        backgroundLoaded: false,
        city: this.$city,
        sectionKey: 0,
        maps: false,
        sections: [
          {
            section: 'city-header',
            title: 'Summary'
          },
          {
            section: 'population',
            title: 'Population',
            graph: true,
            map: false
          },
          {
            section: 'urban-extent',
            title: 'Urban Extent',
            graph: true,
            map: true
          },
          {
            section: 'density',
            title: 'Density',
            graph: true,
            map: false
          },
          {
            section: 'composition-of-added-area',
            title: 'Composition of Added Area',
            graph: false,
            map: true
          },
          {
            section: 'roads',
            title: 'Roads',
            graph: true,
            map: true
          },
          {
            section: 'arterial-roads',
            title: 'Arterial Roads',
            graph: true,
            map: true
          },
          {
            section: 'blocks-and-plots',
            title: 'Blocks and Plots',
            graph: true,
            map: true
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
          'background-image': 'linear-gradient(-180deg, #C5C5C5 0%, #616161 98%), url("' + image + this.city.City.photo_path + '")'
        }
      }
    },
    mounted () {
      this.$parent.section = 'city-header'
    },
    methods: {
      commas () {
        return commas.apply(this, arguments)
      },
      loadImage (image) {
        return new Promise((resolve, reject) => {
          var img = new Image()
          img.onload = function () {
            resolve()
          }
          img.src = image
        })
      },
      setKey (index) {
        this.sectionKey = index
      }
    },
    watch: {
      currentSection () {
        this.$parent.section = this.currentSection.section
      }
    },
    components: {
      MapGraphs,
      SectionDropdown,
      SectionSummary,
      CityDropdown,
      CitySummary
    }
  }
</script>

<style lang="scss">
@import '../../../app/webroot/src/sass/vars';
@import '../assets/colors.scss';

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
  /* Rectangle 16: */
  min-height: 100vh;
  padding-top:54px;
  #city-header-data {
    color: white;
    text-align:center;
    margin-top: calc(50vh - 112px);
    .title{
      font-size:14px;
      line-height:17px;
    }
    .value{
      font-size:60px;
      line-height:72px;
    }
    .unit{
      font-size:12px;
      line-height:14px;
    }
  }
  &.city-header{
    padding-left:0px;
  }


  .header-title{
    background-color: black;
    font-size:20px;
    line-height:43px;
    position:relative;
    z-index:2;
    padding-left:20px;
  }
}
.population #side-panel{
  // width:50%;
}
#side-panel{
  z-index:2;
  position:absolute;
  left:0px;
  top:54px;
  color: #5A5A5A;
  padding:14px;
}
.summary, 
.dropdown-nav {
   width:274px; 
}
.dropdown-nav {
  color: #5A5A5A;
  font-size: 14px;
  line-height: 30px;
  position:relative;
  background-color: white;
  &.open{
    .dropdown-arrow img{
      transform: rotate(180DEG);
    }
  }
  .dropdown-title {
    cursor: pointer;
    font-weight:bold;
  }
  .currentSection {
    padding:0 12px;
    border-bottom:1px solid grey;
    >div {
      display: inline-block;
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
    z-index:4;
    background-color: white;
    width: 100%;
    top: 30px;
    left:0px;
    position: absolute;
    border-top: 1px solid #E8E8E8;
    > div {
      padding:0 15px;
    }
    .dropdown-title{
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
    .dropdown-nav {
      .currentSection {
        .dropdown-arrow{

        }
      }
      .allSections{
      }
    }
  }
}


  .open {
    .more-title{
      margin-bottom: 20px;
        &:after{
        background-image: url('/img/minus.svg');
      }
    }
  }
  .more-title {
    margin-top:17px;
    font-size:11px;
    line-height:13px;
    text-transform: uppercase;
    color: $light-grey;
    position:relative;
    &:after{
      display: block;
      content: '';
      position:absolute;
      right:0px;
      font-size:14px;
      bottom:0;
      height:100%;
      width: 8px;
      background-image: url('/img/plus.svg');
      background-position: center center;
      background-size: 8px;
      background-repeat: no-repeat;
    }
  }
  .show-more {
    .label, .amount {
      line-height: 18.5px;
    }
    .amount {
      padding-bottom: 1em;
      &:last-of-type{
        padding-bottom:0px;
      }
    }
  }
  @media only screen and (min-width : 0) and (max-width : $tablet-max-width)  {
    #side-panel {
      position:static;
      width:100%;
      .allSections {
        top:0px;
        position:static;
      }
      .summary, 
      .dropdown-nav {
        width:100%;
      }
    }
    #cityContainer {
      #city-header-data {
        margin-top:0px;
        > div {
          margin:20px 0px;
        }
        .value {
          font-size:48px;
          line-height:48px;
        }
      }
    }
  }
</style>
