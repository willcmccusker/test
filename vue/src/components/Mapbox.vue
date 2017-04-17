<template>
  <div id='mapbox' :class='section.section'>
    <div>
      <div id='map'>
        
      </div>
    </div>
  </div>
</template>

<script>

  export default {

    name: 'Mapbox',
    props: ['city', 'section'],
    data () {
      return {

      }
    },
    methods: {
    }
  }
</script>

<style lang="scss" scoped>
*{
  color: white;
}
#mapbox{
  
  #map{

  }
}
</style>
