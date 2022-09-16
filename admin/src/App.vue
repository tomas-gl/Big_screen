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
body{
  margin: 0;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  background-color: rgb(12, 12, 84);
}
</style>
