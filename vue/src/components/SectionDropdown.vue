<template>
  <div class='dropdown-nav cursor' :class='{open: dropdown}'>
    <div @click='dropdown = !dropdown' ref='sectiondropdown' class='currentSection' >
      <div class='graph-icon'></div>
      <div class='dropdown-title' v-html="sectionKey === 0 ? 'Seleccione una Base de Datos' : currentSection.title"></div>
      <div class='dropdown-arrow'>
        <img  :src="'/img/arrow-b.svg'">
      </div>
    </div>
    <div class='allSections' v-if='dropdown'>
      <div v-for='section, index in sections'>
        <div class='dropdown-title' @click='setKey(index)' v-html='section.title'></div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {

    name: 'SectionDropdown',
    props: ['sections', 'sectionKey', 'currentSection'],
    data () {
      return {
        dropdown: false
      }
    },
    computed: {
      currentSection () {
        return this.sections[this.sectionKey]
      }
    },
    mounted () {
      var vm = this
      document.addEventListener('click', (e) => {
        if (this.$refs.sectiondropdown && !this.$refs.sectiondropdown.contains(e.target)) {
          vm.dropdown = false
        }
      }, false)
    },
    methods: {
      setKey (index) {
        this.$emit('setKey', index)
        this.dropdown = false
      }
    }
  }
</script>

<style lang="css" scoped>
</style>
