<template>
  <div>
    <!--<SurveyPage />-->
    <HomeAdmin />
  </div>
</template>

<script>
import HomeAdmin from "./views/admin/HomeAdmin.vue";
import SurveyPage from "./views/user/SurveyPage.vue";

export default {
  name: 'App',
  components: {
    SurveyPage,
    HomeAdmin
}
}
</script>

<style>
body{
  margin: 0;
  background-color: rgb(12, 12, 84);
}
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
