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
    // handleScroll: (event, el) => {
    //    if ( window.scrollY >= 100 ) {
    //       el.style.backgroundColor('red');
    //    } else {
    //       el.style.backgroundColor('blue');
    //    }
    // }
  },
  mounted(){
    // this.handleScroll();
  }
}
</script>

<style>
    .logo {
        position: sticky;
        top: 0;
        z-index: 1000;
        padding: 1rem 0;
        background: rgb(12, 12, 84);
    }
    .logo > img{
        /* position: sticky;
        top: 0; */
        width: 30%;
    }
</style>