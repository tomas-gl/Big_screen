<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
  // import axios from 'axios';

export default {
  name: 'App',
  methods:{
    
    async isLoggedIn(){
      // localStorage.clear();
          console.log(localStorage.getItem('loggedUser'));
          // let url = 'http://127.0.0.1:8000/api/isLoggedIn';
          // await axios.get(url).then(response =>{
          //     console.log(response.data);
          // }).catch(error =>{
          //     console.log(error.response);
          // });
        }
  },
  mounted() {
    this.isLoggedIn();
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
