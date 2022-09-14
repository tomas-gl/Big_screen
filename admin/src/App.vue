<template>
  <div>
    <SurveyPage />
  </div>
</template>

<script>
import SurveyPage from "./views/user/SurveyPage.vue";

export default {
  name: 'App',
  components: {
    SurveyPage
}
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
  background-color: rgb(12, 12, 84);
}
</style>
