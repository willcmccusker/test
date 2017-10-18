<template>
  <div id='popup' v-if="firstVisit && !popped" @click.self="close()">
    <div id="popup-text">
      <div class="">Bienvenido al Atlas de Expansión Urbana Colombia, para complementar su experiencia de navegación lo invitamos a que se dirija a la sección de Datos  y revise la subsección de Documentos de Soporte. Esto le permitirá tener un pleno entendimiento de las metricas y los resultados que esta herramienta presenta</div>
      <div id="close" @click="close()"></div>
    </div>
  </div>
</template>

<script>
  export default {

    name: 'Popup',

    data () {
      return {
        popped: false
      }
    },
    computed: {
      firstVisit () {
        return this.$firstVisit
      }
    },
    methods: {
      close () {
        this.popped = true
      }
    }
  }
</script>

<style lang="scss" scoped>
#popup {
  position:fixed;
  top:0px;
  left:0px;
  right:0px;
  bottom:0px;
  background-color: rgba(0,0,0,0.5);
  z-index:3;
  #popup-text {
    width:480px;
    max-width: calc(100% - 20px);
    background-color: white;
    padding:3em;
    margin: 6em auto 0 auto;
    position:relative;
    #close {
      position:absolute;
      top:1em;
      right:1em;
      cursor: pointer;
      width:30px;
      height:30px;
      text-align:center;
      line-height:30px;
      background-image: url('/img/close-black.svg');
      background-position: center center;
      background-repeat: no-repeat;
      background-size: 60%;
    }
  }
}
</style>
