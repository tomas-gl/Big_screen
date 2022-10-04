<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>

export default {
  name: 'App',
    data(){
    return {
        storage : localStorage,
    }
  },
//   mounted() {
//     this.$store.commit('initialiseStore', "first");
// }, 

}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: white;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  scroll-behavior: smooth;
  overflow: auto;
}
</style>
