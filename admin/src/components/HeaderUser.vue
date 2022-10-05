<template>
    <div class="logo" on-scroll="handleScroll">
        <img :src="logo">
    </div>
</template>

<script>
export default {
    data() {
    return {
      logo: require("../assets/logo_bigscreen.png")
    }
  },
  methods:{
  },
  mounted(){
  }
}
</script>

<style>
    .logo {
        position: sticky;
        top: 0;
        z-index: 1000;
        padding: 1rem 0;
        margin: 0rem 0rem 2rem 0rem;
        background: rgb(12, 12, 84);
    }
    .logo > img{
        /* position: sticky;
        top: 0; */
        width: 30%;
    }
</style>