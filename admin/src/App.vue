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
  background-color: rgb(12, 12, 84);
}
</style>
